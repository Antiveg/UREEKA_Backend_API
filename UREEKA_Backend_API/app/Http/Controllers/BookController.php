<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\createBookRequest;
use App\Http\Requests\updateBookRequest;

class BookController extends Controller
{

    public function view($isbn=null) {
        // return 'view';
        if ($isbn) {
            $book = Book::find($isbn);
            if ($book) {
                return $book;
            } else {
                return response()->json(['message' => 'Book not found'], 404);
            }
        } else {
            return Book::all();
        }
    }

    public function create(createBookRequest $request){
        $book = new Book;
        $book->judul = $request->judul;
        $book->isbn = $request->isbn;
        $book->penulis = $request->penulis;
        $book->tahun_terbit = $request->tahun_terbit;
        if($book->save()) return ["message" => "Book successfully created!"];
        else return ["message" => "Create operation failed!"];
    }

    public function update($url_isbn, updateBookRequest $request){
        if($request->isbn != $url_isbn) return ["message" => "isbn url & isbn in json differs!"];
        $book = Book::find($request->isbn);
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun_terbit = $request->tahun_terbit;
        if($book->save()) return ["message" => "Book successfully updated!"];
        else return ["message" => "Update operation failed!"];
    }

    public function delete($isbn_to_delete){
        $book = Book::find($isbn_to_delete);
        return ($book->delete()) ? ["message" => "Book successfully deleted!"] : ["message" => "delete operation failed!"];
    }
}
