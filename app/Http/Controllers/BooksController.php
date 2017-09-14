<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Http\File;
use Session;
use Redirect;
use Storage;
use Input;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate( 50 );
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $book = new Book;
      
        if ($request->hasFile('cover'))
        {
            
            $image          = $request->cover;
            $full_name      = $image->getClientOriginalName();
            $extension      = $image->getClientOriginalExtension();
            $image_name     = explode('.'.$extension, $full_name);
            Storage::putFileAs('covers', new File($image), $full_name);
            
            $book->cover    = $full_name;
        } 
   
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->category_id = 1;
        $messages = 'Books is added';
        $book->save();
    
        return redirect()->route('books.index', $book->id)->with('success', $messages);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail( $id );
    
        return view('books.edit', [ 'book' => $book ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find( $id );
        if ($request->hasFile('cover'))
        {
            
            $image          = $request->cover;
            $full_name      = $image->getClientOriginalName();
            $extension      = $image->getClientOriginalExtension();
            $image_name     = explode('.'.$extension, $full_name);
            Storage::putFileAs('covers', new File($image), $full_name);
            
            $book->cover    = $full_name;
        } 
        
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->category_id = 1;
        $messages = 'Books is edited';
        $book->save();
        
        return redirect()->route('books.index', $book->id)->with('success', $messages);
        
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
