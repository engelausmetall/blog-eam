@extends('layouts.app')
@section('content')
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Creacion de Categorias
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'catalogos.categories.store']) !!}
                        {!! Field::text('name',null,['label'=>'Nombre:']) !!}
                        {!! Field::textarea('description',null,['label'=>'Descripcion:','row'=>'3','style'=>'resize:none']) !!}

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger" href="{{route('catalogos.categories.index')}}">Regresar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


@endsection
