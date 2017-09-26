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
            $filter=$request->filter;
            //Traer data por ordern de nombre
            $result=Category::orderBY('name', 'ASC')
            ->where('name','LIKE',"%$filter%")
            ->orwhere('description','LIKE',"%$filter%")
            ->paginate(5)->appends('filter',$filter);
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

    public function forAll(){
        return Category::all();
    }

}