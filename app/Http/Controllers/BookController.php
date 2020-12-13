<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::sortable()->paginate(10);
        return view('books.index', ['books' => $books]);
        // return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $this->validate($request,[
    		'author' => 'required',
    		'title' => 'required',
    		'category' => 'required',
    		'publisher' => 'required',
    		'year_released' => 'required',
        ]);
        
        
        Book::create([
    		'author' => $request->author,
    		'title' => $request->title,
    		'category' => $request->category,
    		'publisher' => $request->publisher,
    		'year_released' => $request->year_released,
    	]);
        
        
    	return redirect('books')->with('success', ' Berhasil Input Data !');

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
    public function edit($data)
    {
        //
        $id = Crypt::decryptString($data);
        $book=Book::find($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data)
    {
        //
        $this->validate($request,[
    		'author' => 'required',
    		'title' => 'required',
    		'category' => 'required',
    		'publisher' => 'required',
    		'year_released' => 'required',
        ]);
        
        $id = Crypt::decryptString($data);
        $book=Book::find($id);
        $book->author = $request->author;
        $book->title = $request->title;
        $book->category = $request->category;
        $book->publisher = $request->publisher;
        $book->year_released = $request->year_released;
        $book->save();

        return redirect('books')->with('success', ' Berhasil Update Data !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data)
    {
        //
        $id = Crypt::decryptString($data);
        $book = Book::find($id);
        $book->delete();
        
        return redirect('/books')->with('success', ' Berhasil Hapus Data !');

    }
}
