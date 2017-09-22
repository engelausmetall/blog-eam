@extends('layouts.app')
@section('content')
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Ver Categorias
                </div>
                <div class="panel-body">
                        {!! Field::text('name',$category->name,['label'=>'Nombre:','readonly']) !!}
                        {!! Field::textarea('description',$category->description,['label'=>'Descripcion:','row'=>'3','style'=>'resize:none','readonly']) !!}
                    <a class="btn btn-danger" href="{{route('catalogos.categories.index')}}">Regresar</a>
                </div>
            </div>
        </div>
@endsection
