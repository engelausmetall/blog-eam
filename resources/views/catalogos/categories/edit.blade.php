@extends('layouts.app')
@section('content')
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Editar Categorias
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=>['catalogos.categories.update',$category->id],'method'=>'PUT']) !!}
                        {!! Field::text('name',$category->name,['label'=>'Nombre:']) !!}
                        {!! Field::textarea('description',$category->description,['label'=>'Descripcion:','row'=>'3','style'=>'resize:none']) !!}

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger" href="{{route('catalogos.categories.index')}}">Regresar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


@endsection
