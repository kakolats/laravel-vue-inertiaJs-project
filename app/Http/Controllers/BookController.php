<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(9);
        $page = 'books.index';
        $url = url()->current();
        if(strpos($url,'front')!==false){
            $page = 'clients.index';
        }
        return view($page, compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(BookRequest $request){
        $title = $request->input('title');
        $description = $request->input('description');
        $published = $request->input('published')=="on"?true:false;
        $image = $request->file('file');
        $imageName = null;
        if($image!=null) {
            $imageName=$image->storePublicly('/bookPicture', 'public');
            //dd($imageName);
        }
        Book::create([
            'title' => $title,
            'description' => $description,
            'published' => $published,
            'imageLink' => $imageName
        ]);
        return redirect()->route('books.index');
    }

    public function show($id){
        $book = Book::findOrFail($id);
        $chapters = Chapter::where('book_id', $id)->get();
        return view('books.show',compact('book','chapters'));
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }

    public function trash(){
        $books = Book::onlyTrashed()->get();
        return view('books.trash', compact('books'));
    }

    public function restore($id){
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('books.index');
    }

    public function forceDelete($id){
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();
        return redirect()->route('books.index');
    }

    public function forceDeleteAll(){
        Book::onlyTrashed()->forceDelete();
        return redirect()->route('books.index');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.edit',compact('book'));
    }
}
