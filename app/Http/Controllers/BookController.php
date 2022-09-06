<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    function addBook(Request $req)
    {
        $book=new Book;
        $book->title=$req->input('title');
        $book->author=$req->input('author');
        $book->genre=$req->input('genre');
        $book->published_date=$req->input('published_date');
        $book->file_path=$req->file('image')->store('book');
        $book->save();
        return $book;
      //return $req->input();
    }
    function display(Request $req)
    {
        $book= new Book;
        return $book->all();
    }
}
