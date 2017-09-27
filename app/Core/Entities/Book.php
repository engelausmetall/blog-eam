<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;
//Activar borrados logico
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Book extends Model
{
    //
    //Realizar borrados logicos
    use SoftDeletes, Sluggable,SluggableScopeHelpers;
    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table='books';
    //En el caso que trabajamos con mas de una base de datos, aplicar lo siguiente
    //protected $connection='mysql';
    //Realizar matching entre la vista y form
    protected $fillable=['title','description','picture','category_id'];

    //Para que los queries se realicen en cascada de hijo a padre (Menos a Muchos)
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function setPictureAttribute($value)
    {
        $this->attributes['picture'] = 'img-'.uniqid().uniqid().'.jpg';
    }
}
