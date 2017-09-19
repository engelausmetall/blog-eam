<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;
//Activar borrados logico
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    //Realizar borrados logicos
    use SoftDeletes;
    protected $table='books';
    //En el caso que trabajamos con mas de una base de datos, aplicar lo siguiente
    //protected $connection='mysql';
    //Realizar matching entre la vista y form
    protected $fillable=['title','description','picture','category_id'];

    //Para que los queries se realicen en cascada de hijo a padre (Menos a Muchos)
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
