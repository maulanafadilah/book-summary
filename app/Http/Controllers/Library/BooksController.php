<?php

namespace App\Http\Controllers\Library;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Page Information
        $page_title = 'Home';
        $page_description = "Home Library";

        // Elements
        $header = false;
        $bottom = true;

        // Query
        $name = auth()->user()->name;
        $user_id = auth()->user()->id;
        $books = Book::where('user_id', $user_id)->get();
        $recent_book = DB::table('books')->where('user_id', $user_id)->latest()->first();
        
        // return $recent_book;

        return view('library/books/index', compact('page_title', 'page_description', 'header', 'bottom', 'books', 'recent_book', 'name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Page Information
        $page_title = 'Add Book';
        $page_description = "Add Book to Library";

        // Elements
        $header = true;
        $bottom = false;

        return view('library/books/create', compact('page_title', 'page_description', 'header', 'bottom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'publisher' => 'required|max:255',
            'writer' => 'required|max:255',
            'category' => 'required',
            'year_published' => 'required|max:4',
            'cover' => 'image|file|max:1024',
            'description' => 'required',
        ]);
        
        $validatedData['cover'] = $request->file('cover')->store('books-cover');
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['user_id'] = 1;

        Book::create($validatedData);
        
        return redirect('/')->with('success', 'New book added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Page Information
        $page_title = 'Book Detail';
        $page_description = "Book Detail Information";

        // Elements
        $header = true;
        $bottom = false;
        
        // Query
        $book = Book::select('*')->where('id', $id)->first();
        $chapters = Chapter::where('book_id', $id)->get();

        // return $chapters;

        return view('library/books/show', compact('page_title', 'page_description', 'header', 'bottom', 'book', 'chapters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Page Information
        $page_title = 'Edit Book';
        $page_description = "Edit Book Details";

        // Elements
        $header = true;
        $bottom = false;

        // Query
        $book = Book::where('id', $id)->first();

        return view('library/books/edit', compact('page_title', 'page_description', 'header', 'bottom', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'publisher' => 'required|max:255',
            'writer' => 'required|max:255',
            'category' => 'required',
            'year_published' => 'required|max:4',
            'description' => 'required',
        ]);

        Book::where('id', $id)->update($validatedData);
        return redirect('/book/'.$id)->with('success', 'Book Details Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Book::where('id', $id)->select('id', 'cover')->get();

        // return $images;

        foreach ($images as $key => $image) {
            Storage::delete($image->cover);
            Book::destroy($image->id);
        }

        Book::destroy($id);
        return redirect('/')->with('success', 'Book Successfully Deleted!');
    }
}
