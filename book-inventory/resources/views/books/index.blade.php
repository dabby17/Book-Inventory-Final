@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="page-title">📚 Book Inventory</h2>

    

    <form method="GET" action="{{ route('books.index') }}" class="mb-4">
        <div class="input-group shadow-sm">
            <input type="text" name="search" class="form-control" placeholder="Search by title or author..." value="{{ request('search') }}">
            <button class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="d-flex gap-2 mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-success">➕ Add New Book</a>
        <a href="{{ route('books.report.pdf') }}" class="btn btn-info">📄 Download PDF Report</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-borderless shadow rounded-3 overflow-hidden">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @forelse($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td><span class="badge {{ $book->status == 'Available' ? 'bg-success' : 'bg-danger' }}">{{ $book->status }}</span></td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No books found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $books->withQueryString()->links() }}
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        min-height: 100vh;
        padding-top: 50px;
    }

    .container {
        max-width: 2000px !important;
        width: 100%;
        margin: auto;
    }

    .page-title {
        font-size: 2.8rem;
        font-weight: 700;
        text-align: center;
        color: white;
        margin-bottom: 40px;
        letter-spacing: 1px;
    }

    .input-group input {
        border-radius: 8px 0 0 8px;
        border: 1px solid #ced4da;
        padding: 12px;
    }

    .input-group button {
        border-radius: 0 8px 8px 0;
        background: #007bff;
        border: none;
        padding: 12px 20px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s;
    }

    .input-group button:hover {
        background: #0056b3;
    }

    .btn-success, .btn-info, .btn-warning, .btn-danger {
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .table {
        width: 100% !important;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        text-align: center;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
        font-size: 1rem;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 12px;
        border-radius: 8px;
        margin-top: 10px;
    }

    .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
        border-radius: 20px;
    }

    /* Pagination */
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #007bff;
        border-radius: 8px;
        margin: 0 5px;
        transition: 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: white;
    }

    /* Hover row */
    tbody tr:hover {
        background-color: #e9ecef;
    }
</style>
@endsection
