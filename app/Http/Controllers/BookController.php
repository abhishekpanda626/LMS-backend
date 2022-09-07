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
    function delete($id){
        $result= Book::where('id',$id)->delete();
        if($result)
        {
            return ['result'=>"Book has been Deleted."];
        }
        else
        {
            return['result'=>"Operation Failed"];
        }
    }
    function getBook($id)
    {
        return Book::find($id);
    }
    function update($id, Request $req)
    {
        $book= Book::find($id);
        if($req->input('title'))
        {
            $book->title=$req->input('title');
        }
        if($req->input('author'))
        {
            $book->author=$req->input('author');
        }
        if($req->input('genre'))
        {
            $book->genre=$req->input('genre');
        }
        if($req->input('published_date'))
        {
            $book->published_date=$req->input('published_date');
        }
       
        if($req->file('image'))
        {
            $book->file_path=$req->file('image')->store('book');
        }
       
        $book->save();
        return $book;
    }
}
