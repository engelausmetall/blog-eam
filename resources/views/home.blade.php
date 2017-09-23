@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="img/book.jpg" style="width: 150px">
            <button class="btn btn-primary btn-block">
                <i class="fa fa-book"></i>Publicar</button>
                <hr/>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Categorias</a>
                        <a href="#" class="list-group-item">Seguridad Informatica</a>
                        <a href="#" class="list-group-item">Culturales</a>
                        <a href="#" class="list-group-item">Tecnologia</a>
                        <a href="#" class="list-group-item">Ciencia Ficcion</a>
                    </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Mis Libros</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Esta En Linea!!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
