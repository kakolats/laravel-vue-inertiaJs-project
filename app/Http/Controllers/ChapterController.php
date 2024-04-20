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
        $chapters = Chapter::where('book_id', $id)->paginate(4);
        //Reduce the description to 50 characters
        foreach($chapters as $chapter){
            $chapter->description = substr($chapter->description, 0, 60)."...";
        }
        //Pagination
        //dd($chapters);
        return inertia('Chapters/Index', compact('chapters', 'book'));
    }

    public function create($id){
        $book = Book::findOrFail($id);
        return inertia('Chapters/Create', compact('book'));
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
        return redirect()->route('chapters.bookChapters', $id);
    }

    public function update(ChapterRequest $request, Chapter $chapter){
        $title = $request->input('title');
        $description = $request->input('description');
        $published = $request->input('published')=="on"?true:false;
        $chapter->update([
            'title' => $title,
            'description' => $description,
            'published' => $published
        ]);
        return redirect()->route('chapters.bookChapters', $chapter->book->id);
    }

    public function edit($id){
        $chapter = Chapter::findOrFail($id);
        return inertia('Chapters/Update', compact('chapter'));
    }

    public function show($id){
        $chapter = Chapter::findOrFail($id);
        return view('chapters.show', compact('chapter'));
    }

    public function delete($id){
        $chapter = Chapter::findOrFail($id);
        $book = $chapter->book;
        $chapter->delete();
        return redirect()->route('chapters.bookChapters', $book->id);
    }

}
