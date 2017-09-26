<?php
//Añado en routes\web.php la include "require __DIR__ . '/modules/blogs.php';"
//Agrego rutas de grupos para catalogos

Route::group(['prefix' => 'catalogos', 'as'=>'catalogos.' ], function (){
    Route::group(['middleware'=>'auth' ],function(){
        //Defino un namespace para definir una ruta
        Route::namespace('Admin')->group(function () {
            //El resource se encarga enlacar mi controller
            //En el url seria blog.dev/catalogos/categories/create
            Route::resource('categories','CategoryController');
            Route::get('categories-select','CategoryController@listSelect');
            Route::resource('books','BookController');
        });
    });
});
