<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::orderBy('id', 'desc')->paginate(7);

        return \View::make('books.index')->with('books', $books);
    }

    public function add(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|unique:books,name',
            'author' => 'required',
            'price' => 'required|integer',
            'number_of_copies' => 'required|integer|',
        ));

        $book = new Books();
        $book->create($request->all());

        return \Redirect::to(route('books'));
    }

    public function editBookView($id)
    {
        $book_info = Books::where('id', $id)->first();

        return \View::make('books.edit')
      ->with('book_info', $book_info);
    }
    public function editBook(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|unique:books,name',
            'name' => 'required',
            'price' => 'required|integer',
            'number_of_copies' => 'required|integer|',
            'id' => 'required',
        ));

        Books::where('id', $request->id)->update(array(
            'name' => $request->name,
            'author' => $request->author,
            'price' => $request->price,
            'number_of_copies' => $request->number_of_copies,
        ));

        return \Redirect::to(url('/book/'.$request->id));
    }

    public function view($id)
    {
        $book = Books::where('id', $id)->first();
        if($book){

        $borrows = \App\Borrows::where('book_id', $book->id)->paginate(5);

        return \View::make('books.view')
      ->with('book', $book)
      ->with('borrows', $borrows);
  }else{
      return \Redirect::to('/');

  }
    }

    public function deleteBook($id)
    {
        return \View::make('books.delete')->with('id', $id);
    }
}
