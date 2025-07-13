@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please correct the errors below:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $book->quantity) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="Available" {{ old('status', $book->status) == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Borrowed" {{ old('status', $book->status) == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection


@section('head')
<style>
    /* Reset styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body styling */
    body {
        font-family: 'Poppins', 'Roboto', sans-serif;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    /* Container */
    .container {
        background: rgba(255, 255, 255, 0.05);
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        width: 100%;
        max-width: 2000px !important;
        animation: fadeIn 1s ease-in-out;
    }

    /* Heading */
    h1 {
        font-size: 2.2rem;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 700;
        letter-spacing: 1px;
        color: #ffffff;
        text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
    }

    /* Error alert */
    .alert {
        background-color: #ff4d4d;
        color: #fff;
        padding: 12px 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-size: 0.95rem;
    }

    /* Labels */
    .form-label {
        margin-bottom: 6px;
        font-weight: 600;
        color: #ffffff;
        font-size: 1rem;
    }

    /* Inputs and Select */
    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 12px 15px;
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control::placeholder {
        color: #ccc;
    }

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #00b5e2;
        box-shadow: 0 0 8px #00b5e2;
        outline: none;
    }

    /* Buttons */
    .btn {
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        font-size: 1rem;
        letter-spacing: 1px;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Animations */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
