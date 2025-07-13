@php $book = $book ?? null; @endphp

@section('head')
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Glass form container */
        .container {
            width: 100%;
            max-width: 2000px !important;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            animation: fadeIn 1s ease;
        }

        /* Heading */
        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
            letter-spacing: 2px;
            color: #ffffff;
        }

        /* Form inputs and selects */
        .form-control, .form-select {
            width: 100%;
            padding: 14px 18px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: #00ffe7;
            box-shadow: 0 0 12px #00ffe7;
            transform: scale(1.02);
            outline: none;
        }

        .form-label {
            font-weight: 500;
            font-size: 1rem;
            color: #e0e0e0;
        }

        /* Error alert */
        .alert {
            background-color: rgba(255, 0, 0, 0.7);
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 1rem;
            color: white;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn-success {
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: #fff;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #00cec9, #00b894);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 206, 201, 0.6);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #636e72, #2d3436);
            color: #fff;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #2d3436, #636e72);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(99, 110, 114, 0.6);
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
@endsection

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
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $book->quantity ?? 1) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="Available" {{ old('status', $book->status ?? '') == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Borrowed" {{ old('status', $book->status ?? '') == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
