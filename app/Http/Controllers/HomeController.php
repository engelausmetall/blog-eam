<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Repositories\CategoryRPY;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Como no tengo metodo creo la funcion en Category Controller
        //Instancio CategoryRPY con use
        $categoryRPY=new CategoryRPY();
        $categories=$categoryRPY->forAll();

        //Extraer los usuario y coleccion de libros
        $user=Auth::user();
        $user->load('books.category');
        $books=$user->books;
        //Auth::user()->books
        //$books=Auth::user()->books();
                
        //dd para ver lo de books como un echo
        //dd($books);
        return view('home',compact('categories','books'));
    }
}
