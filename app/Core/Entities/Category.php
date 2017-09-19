<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;
//Activar borrados logico
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    //Realizar borrados logicos
    use SoftDeletes;
    protected $table='categories';
    //En el caso que trabajamos con mas de una base de datos, aplicar lo siguiente
    //protected $connection='mysql';
    //Realizar matching entre la vista y form
    protected $fillable=['name','description'];
    
    //Para que los queries se realicen en cascada de padre a hijos (Muchos a Menos)
    public function books(){
        return $this->hasMany(Book::class,'category_id');
    }
}
