<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Book;
class ChapterController extends Controller
{
    public function index($id){
        $book = Book::findOrFail($id);
        //Query to find all chapters of a book
        $chapters = Chapter::where('book_id', $id)->get();
        //dd($chapters);
        return view('chapters.index', compact('chapters', 'book'));
    }

    public function create($id){
        $book = Book::findOrFail($id);
        return view('chapters.create', compact('book'));
    }

    public function store(ChapterRequest $request, $id){
        $title = $request->input('title');
        $description = $request->input('description');
        $published = $request->input('published')=="on"?true:false;
        $book = Book::findOrFail($id);
        $book->chapters()->create([
            'title' => $title,
            'description' => $description,
            'published' => $published
        ]);
        return redirect()->route('books.show', $id);
    }

    public function edit($id){
        $chapter = Chapter::findOrFail($id);
        $book = $chapter->book;
        dd($book);
        return view('chapters.edit', compact('chapter'));
    }

    public function show($id){
        $chapter = Chapter::findOrFail($id);
        return view('chapters.show', compact('chapter'));
    }
}
