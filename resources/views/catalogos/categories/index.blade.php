@extends('layouts.app')
@section('content')
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Listado de Categorias
                </div>
                <div class="panel-body">
                    <div class="col-lg-4 col-lg-offset-4 text-center">
                        <a class="btn btn-primary btn-block"
                            href="{{route('catalogos.categories.create')}}">
                            <i class="glyphicon glyphicon-plus"></i>
                            Agregar</a>
                    </div>
                <table class="table">
                    <thead>
                        <th>Nombres</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @forelse($table as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->descripticion}}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr><td colspan="3">Sin Registros</td></tr>
                        @endforelse
                    </tbody>
                </table>
                {!! $table->render() !!}
                </div>
            </div>
        </div>
@endsection