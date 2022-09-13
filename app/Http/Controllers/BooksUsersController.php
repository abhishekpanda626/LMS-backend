<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books_users;
class BooksUsersController extends Controller
{
    function assign(Request $req)
   {
         $assign=new books_users;
        $assign->book_id=$req->input('book_id');
        $assign->user_id=$req->input('user_id');
        $assign->save();
        return $assign->all();
   }
}
