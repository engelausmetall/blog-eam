<?php


Route::group(['prefix' => 'basics', 'as'=>'basics.' ], function (){
    Route::group(['middleware'=>'auth' ],function(){
        //Aqui agrego mis rutas, se creo esta ruta y archivo routes\modules\basics.php
        //Añado en routes\web.php la include "require __DIR__ . '/modules/basics.php';"
        //Añado la siguiente ruta
        Route::get('/sumar',function(){
        //var_dump me imprime todo el contenido de un objecto
        var_dump('hola');
        //va ser lo mismo que var_dump pero con un exit, osea me ignora lo que haya abajo
        dd('sumar');
        });

        //Returna solo el mensaje de prueba view
        Route::get('/saludar',function(){
        return "prueba de view";
        });

        //Puedo separar los paremetros por "/", "-", "_" y el link cambia al enviar la suma
        //Con parametros obligatorios
        Route::get('/suma/{operador1}/{operador2}',function($operador1,$operador2){
        //Lo mando en el link http://blog.dev/suma/8/2
        return $operador1 + $operador2;
        });

        //Ruta con parametro no obligatorio
        Route::get('/suma-opcional/{operador1}/{operador2?}',function($operador1,$operador2=0){
        //Lo mando en el link http://blog.dev/suma-opcional/8
        return $operador1 + $operador2;
        });

        //Ruta con arreglo
        Route::get('/array/{numero}',function($numero){
        //Llenamos el array
        $array=[];
        for($i=0;$i<$numero;$i++){
        $array[]=uniqid();
        }
            return response()->json($array);
            })->where(['numero'=>'[0-9]+']); //expresion regular [0-9]+
    }); 
});