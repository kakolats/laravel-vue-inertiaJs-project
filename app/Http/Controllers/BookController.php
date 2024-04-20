<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function home(){
        return redirect()->route('books.index');
    }

    public function index(){
        $books = Book::paginate(2);
        $page = 'Books/Index';
        $url = url()->current();
        if(strpos($url,'front')!==false){
            $page = 'Books/ClientIndex';
            //books that are published
            $books = Book::where('published', true)->paginate(9);
        }
        //Limit the size of the description
        foreach($books as $book){
            $book->description = substr($book->description, 0, 100);
        }
        return inertia($page, compact('books'));
    }

    public function create(){
        return inertia('Books/Create');
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

    public function update(BookRequest $request, Book $book){
        $title = $request->input('title');
        $description = $request->input('description');
        $published = $request->input('published')=="on"?true:false;
        $image = $request->file('file');
        $imageName = $book->imageLink;
        if($image!=null) {
            $imageName=$image->storePublicly('/bookPicture', 'public');
            //delete the old image
            $oldImage = $book->imageLink;
            if($oldImage!=null){
                unlink(public_path('storage/'.$oldImage));
            }
            //dd($imageName);
        }
        $book->update([
            'title' => $title,
            'description' => $description,
            'published' => $published,
            'imageLink' => $imageName
        ]);
        return redirect()->route('books.index');
    }

    public function show($id){
        $book = Book::findOrFail($id);
        //Query to find all chapters of a book that are published
        $chapters = Chapter::where('book_id', $id)->where('published', true)->get();
        return view('books.show',compact('book','chapters'));
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }

    public function trash(){
        $books = Book::onlyTrashed()->paginate(4);
        return inertia('Books/Bin/Trash', compact('books'));
    }

    public function restore($id){
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('books.index');
    }

    public function forceDeleteAll(){
        Book::onlyTrashed()->forceDelete();
        return redirect()->route('books.index');
    }

    public function forceDelete($id){
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();
        return redirect()->route('books.index');
    }



    public function edit($id){
        $book = Book::findOrFail($id);
        return inertia('Books/Update', compact('book'));
    }
}
