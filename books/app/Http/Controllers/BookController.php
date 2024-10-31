<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // $books = Book::all();
         $books = Book::paginate(2);

         return view('pages.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_name' => 'required|max:255',
            'book_author' => 'required|string',
            'book_describe' => 'required|string|max:255',
            'book_price' => 'required|numeric',
            'publication_date' => [
                'required',
                'date',
                'before_or_equal:' . now()->format('Y-m-d'), // Kiểm tra ngày không vượt quá ngày hiện tại
            ],
        ]);
        $book = Book::create($validatedData);
        return redirect('/books')->with('success', 'Luu thanh cong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('pages.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'book_name' => 'required|max:255',
            'book_author' => 'required|string',
            'book_describe' => 'required|string|max:255',
            'book_price' => 'required|numeric',
            'publication_date' => [
                'required',
                'date',
                'before_or_equal:' . now()->format('Y-m-d'), // Kiểm tra ngày không vượt quá ngày hiện tại
            ],
        ]);
        Book::whereId($id)->update($validatedData);
        return redirect('/books')->with('success', 'Cap nhat thanh cong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books')->with('success', 'Xoa thanh cong!');
    }
}
