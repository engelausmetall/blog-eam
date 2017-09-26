<?php

namespace App\Http\Controllers\Admin;

use App\Core\Entities\Category;
use App\Core\Entities\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request,['title'=>'required','description'=>'required',
        'categoria'=>'require', 'picture'=>'require']);

        $category=Category::findOnFail($request->categoria);
        $objBook=new Book();
        $objBook->fill($request->all());
        $objBook->user_id=Auth::user()->id;
        //Storage::disk('public')->put();
        $request->file('picture')->storage('public');
        $objBook->books()->save($objBook);
        //return response()->json($request->all(),200);
        return response()->json('Guardado Correctamente',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Entities\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Entities\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Entities\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Entities\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
