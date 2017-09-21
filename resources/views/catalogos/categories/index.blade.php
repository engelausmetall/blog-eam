@extends('layouts.app')
@section('content')
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Listado de Categorias
                </div>
                <div class="panel-body">

                <table>
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