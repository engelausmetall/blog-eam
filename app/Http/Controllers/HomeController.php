<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Repositories\CategoryRPY;

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
        return view('home',compact('categories'));
    }
}
