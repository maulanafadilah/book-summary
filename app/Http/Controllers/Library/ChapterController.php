<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Page Information
        $page_title = 'Add Chapter';
        $page_description = "Add Chapter to a Book";

        // Elements
        $header = true;
        $bottom = false;

        // Book_id
        $book_id = $id;

        return view('library/chapters/create', compact('page_title', 'page_description', 'header', 'bottom', 'book_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'book_id' => 'required',
        ]);

        Chapter::create($validatedData);

        return redirect('/book/'.$validatedData['book_id'])->with('success', 'New chapter added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Page Information
        $page_title = 'Read Chapter';
        $page_description = "Read a Chapter";

        // Elements
        $header = true;
        $bottom = false;

        // Query
        $chapter = Chapter::where('id', $id)->first();
        return view('library/chapters/show', compact('page_title', 'page_description', 'header', 'bottom', 'chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Page Information
        $page_title = 'Add Chapter';
        $page_description = "Add Chapter to a Book";

        // Elements
        $header = true;
        $bottom = false;

        // Query
        $chapter = Chapter::where('id', $id)->first();

        return view('library/chapters/edit', compact('page_title', 'page_description', 'header', 'bottom', 'chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Chapter::where('id', $id)->update($validatedData);

        return redirect('/chapter/'.$id)->with('success', 'Chapter Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_id = Chapter::select('book_id')->where('id', $id)->get()[0];
        $book_id = $book_id->book_id;
        
        Chapter::destroy($id);
        return redirect('/book/'.$book_id)->with('success', 'Book Successfully Deleted!');
    }
}
