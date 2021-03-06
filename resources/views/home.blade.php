@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
            <img src="img/book.png" style="width: 150px; height: 120px;">
            @php /* creo un id al boton publica*/ @endphp
            <button id="btnPost" class="btn btn-primary btn-block">
                <i class="fa fa-book"></i>Publicar</button>
                <hr/>
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a href="#" class="list-group-item">{{$category->name}}</a>
                        @endforeach
                        @php /* otra forma de crear las categorias
                        <a href="#" class="list-group-item active">Categorias</a>
                        <a href="#" class="list-group-item">Seguridad Informatica</a>
                        <a href="#" class="list-group-item">Culturales</a>
                        <a href="#" class="list-group-item">Tecnologia</a>
                        <a href="#" class="list-group-item">Ciencia Ficcion</a> */ @endphp
                    </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Mis Libros</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php /* Añado para el menu de libros */@endphp
                    <div class="row">
                        @php /* Creo lo siguiente para invocar en HomeController */ @endphp
                        @foreach($books as $book)
                        <div class="col-lg-4">
                            <div class="thumbnail">
                            <img style="width:192px;" src="{{route('blog.imagenes',$book->picture)}}" alt="Imagen No Encontrada">
                            <div class="caption">
                            <h3>{{$book->title}}</h3>
                            <p>{{$book->category->name}}</p>
                            <p>{{$book->description}}</p>
                                <p><a href="{{route('blog.comentarios',$book->slug)}}" class="btn btn-primary" role="button">Comentar</a>
                                @php /* Uso la libreria carbon diifForHuman */@endphp
                                <i class="fa fa-clock-o fa-spin"></i>{{$book->created_at->diffForHumans()}}</p>
                            </div>
                            </div>
                        </div>
                        @endforeach
                        </div>

                    @php /* Esta En Linea!!! */ @endphp
                    
                </div>
            </div>
        </div>
    </div>
</div>
@php /* invoco el tag (riot) que cree */ @endphp
<create-book></create-book>
{!!csrf_field()!!}
@endsection
@section('masterJS')
        <script src="{{asset('components/create_book.tag')}}" type="riot/tag"></script>

        <script>
            $("#btnPost").on('click',function(){
                    riot.mount('create-book',{id:0,title:'Crear Libro',token:$("input[name='_token']").val()
            });
        });
        </script>
@endsection
