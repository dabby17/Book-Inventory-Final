<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookController extends Controller
{
    public function index(Request $request)
    
    {
        $query = Book::query();

        if ($request->search) {
            $query->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('author', 'like', '%'.$request->search.'%');
        }

        $books = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    
        Book::create($request->all());
    
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }
    

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function generatePDF()
{
    $books = Book::all();
    $generatedBy = Auth::check() ? Auth::user()->name : 'Guest';

    $pdf = Pdf::loadView('pdf.books', [
        'books' => $books,
        'generatedBy' => $generatedBy,
    ]);

    return $pdf->download('book_inventory_report.pdf');
}

}
