<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\BooksRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books =  Book::all();
        return view('admin.books.index' , compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        //

        $input = $request->all();
        $input['stock'] = $request->total;
        Book::create($input);
        $request->session()->flash('book_created', 'Book added successfully.');
        return redirect('/books');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::findOrFail($id);
        return view('admin.books.edit' , compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, $id)
    {
        //
        $input = $request->all();
        $book = Book::findOrFail($id);
        $book->update([
            'total'=>$input['total'] + $book->total,
            'stock'=>$book->stock + $input['total'],
        ]);
        $request->session()->flash('book_updated', 'Book updated successfully');
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Book::findOrFail($id)->delete();
        session()->flash('book_deleted', 'The book has been deleted successfully');
        return redirect()->back();

    }
}
