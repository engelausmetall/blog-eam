<?php
//Añado en routes\web.php la include "require __DIR__ . '/modules/blogs.php';"
//Agrego rutas de grupos para catalogos

Route::group(['prefix' => 'catalogos', 'as'=>'catalogos.' ], function (){
    //Comento middleware no es necesario por ahora
    //Route::group(['middleware'=>'auth' ],function(){
        //Defino un namespace para definir una ruta
        Route::namespace('Admin')->group(function () {
            //El resource se encarga enlacar mi controller
            //En el url seria blog.dev/catalogos/categories/create
            Route::resource('categories','CategoryController');
            Route::get('categories-select','CategoryController@listSelect');
            //Route::resource('books','BookController');
            Route::post('books','BookController@store');
        });
    //});
});

//Nuevo Grupo de Rutas donde esta la imagen, no necesito
Route::group(['prefix' => 'blog', 'as'=>'blog.' ], function (){
    ///Route::group(['middleware'=>'auth' ],function(){
            Route::get('image-{file}',function($file){
                $url = storage_path() . "/app/public/{$file}";
                if (file_exists($url)) {
                    return Response::download($url);
                }
            })->name('imagenes');

            Route::get('comentarios-{path}','Admin\BookController@show')->name('comentarios');
    });
//});

Route::get('mail',function(){
    /*Sin rederizacion*/
    //Mail::send(new \App\Mail\BookMail($order));
    //Mail::send(new \App\Mail\BookMail('uno','dos','tres'));
    //Con rederizacion de e-mail
    return new App\Mail\BookMail('uno','dos','tres');
});
