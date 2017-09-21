<?php
//Van a estar mis consultas, se creo esta ruta y archivo routes\modules\eloquents.php
//Añado en routes\web.php la include "require __DIR__ . '/modules/eloquents.php';"

//Deberia cargar http://blog.dev/admin/ruta_name
//Agrego mis rutas en un grupo llamado admin
Route::group(['prefix' => 'admin', 'as'=>'admin' ],function (){
    //Agrego un nivel de seguridad para que solo si he iniciado sesion pueda consultar mis rutas
    Route::group(['middleware'=>'auth' ],function(){
        //Aqui agrego mis rutas, debo estar login para consultar
        Route::get('categories-all',function(){
            return App\Core\Entities\Category::all();
        });
        
        //Ruta para generar usuario y categorias en la tabla de manera aleatoria
        Route::get('load-data',function(){
            var_dump("Cargando Usuarios");
            factory(App\User::class, 50)->create();
            var_dump("Cargando Categorias");
            factory(App\Core\Entities\Category::class, 50)->create();
            var_dump("Finalizacion Exitosa");
            
        });
        
        
        //Buscar valores, puedo aplicar findorfail, lo busca o falla
        Route::get('categories-{id}',function($id){
            return App\Core\Entities\Category::find($id);
            //return App\Core\Entities\Category::findOrFail($id);
        
        });

    });

});