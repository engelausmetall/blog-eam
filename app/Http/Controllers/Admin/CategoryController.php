<?php

//Es el espacio de trabajo de las clases
namespace App\Http\Controllers\Admin;

//Es igual que usar require o require_once (include)
use App\Core\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Repositories\CategoryRPY;
Use Messages;

class CategoryController extends Controller
{

    //Defino una variables interna de esta clase
    private $objCategoryRPY;

    //declaro un constructor
    function __construct(CategoryRPY $objCategoryRPY){
        $this->objCategoryRPY=$objCategoryRPY;
        //$this->objCategoryRPY=new CategoryRPY;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Imprimo un resultado
        //return "data";
        //realizo un select * from
        //$result= \App\Core\Entities\Category::all()
        //return $result
               
        //1 forma de Visualizar la vista que se creo en resources/catalagos/categories
        //return viewe('catalogos.categories.index',compact('table'));
        //2 forma de visualizar la vista que se creo
        $table =$this->objCategoryRPY->forTables($request);
        return view('catalogos.categories.index')->with([
            //'table'=>$table
            'table'=>$table,'filter'=>$request->filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalogos.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar data y validacion de los campos name y description
        $this->validate($request,
        //Añado "required|unique:categories,name" para que no me deje insertar un nombre repetido
        ['name'=>'required|unique:categories,name','description'=>'required'],
        ['name.required'=>'El nombre es obligatorio',
        'description.required'=>'La descripcion es obligatorio']);

        //Inicio el guardado de objecto
        $this->objCategoryRPY->forSave($request);
        Messages::infoRegisterCustom('Dato Guardado Correctamente');
        return redirect()->route('catalogos.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Entities\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('catalogos.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Entities\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('catalogos.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Entities\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Actualizar data
        $this->validate($request,
        ['name'=>'required','description'=>'required'],
        ['name.required'=>'El nombre es obligatorio',
        'description.required'=>'La descripcion es obligatorio']);

        //Inicio del update
        $this->objCategoryRPY->forUpdate($request,$category);
        Messages::infoRegisterCustom('Dato Actualizado Correctamente');
        return redirect()->route('catalogos.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Entities\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //Agrego para eliminar registros
        $category->delete();
        Messages::infoRegisterCustom('Registro Eliminado Correctamente');
        return redirect()->route('catalogos.categories.index');
    }
}
