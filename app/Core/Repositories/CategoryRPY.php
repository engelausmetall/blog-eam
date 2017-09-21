<?php
//Es el espacio de trabajo de las clases
namespace App\Core\Repositories;

//Es igual que usar require o require_once (include)
use Illuminate\Http\Request;
use App\Core\Entities\Category;

class CategoryRPY{

    //Aqui creo mi funcion a usar en el controller de category
    //Para visualizar
    public function forTables(Request $request){

        if($request->ajax()){

            //para datatable
        }else{
            //Traer data por ordern de nombre
            $result=Category::orderBY('name', 'ASC')->paginate(2);
            return $result;
        }

    }
    //Para guardar
    public function forSave(Request $request){
        $objCategory=new Category();
        $objCategory->fill($request->all());
        //Tambien se puede hacer de manera tradicional
        //$objCategory->name=$request->name;
        $objCategory->save();
    }
    
    //Para actualizar
    public function forUpdate(Request $request, Category $objCategory){
        $objCategory->fill($request->all());
        //Tambien se puede hacer de manera tradicional
        //$objCategory->name=$request->name;
        $objCategory->save();
    }

}