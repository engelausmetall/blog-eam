<?php

namespace App\Http\Controllers\Admin;

//Añadimos la clases
use App\Http\Requests\BookRequest;
use App\Core\Entities\Category;
use App\Core\Entities\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Storage;
use File;

class BookController extends Controller
{
 
    //Otra manera de hacer la funcion pero con Request, la otra generamos un request como BookRequest
    //public function store(Request $request)
    public function store(BookRequest $request)
    {
        //Otra forma mas segura pero llamamos de la clases request App/Http/Request
        //Otra forma mas segura
        //$request->validate(['title'=>'required','description'=>'required','categoria'=>'required', 'picture'=>'required'];)
        //Otra forma pero insegura
        //$this->validate($request,['title'=>'required','description'=>'required','categoria'=>'required', 'picture'=>'required']);

        $category=Category::findOrFail($request->categoria);
        $objBook=new Book();
        //$objBook->fill($request->all());
        $objBook->fill($request->validated());
        /*$objBook->user_id=Auth::user()->id;*/ //Este comento
        //$objBook->user_id=auth()->id;
        //metodos de Guardado
        //Storage::disk('public')->put();
        //Storage::disk('public')->pubfile($objBook->picture, $request->file('picture'));
        //$request->file('picture')->store('public');
        //Guardo la imagen en "\storage\app\public"
        Storage::disk('public')->put($objBook->picture, File::get($request->picture));
        $category->books()->save($objBook);
        //return response()->json($request->all(),200);
        return response()->json('Guardado Correctamente',200);
    }


    public function show($path)
    {
        //
        $objBook = Book::findBySlugOrFail($path);
        //dd($objBook);
        return view('blog.book_details',compact('objBook'));
    }


}
