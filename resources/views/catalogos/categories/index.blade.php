@extends('layouts.app')
@section('content')
        <div class="col-lg-12 col-lg-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Listado de Categorias
                </div>
                <center><div class="panel-body">
                    <div class="col-lg-4 col-lg-offset-0 text-center">
                        <a class="btn btn-primary btn-block"
                            href="{{route('catalogos.categories.create')}}">
                            <i class="fa fa-plus"></i>
                            Agregar Registro</a>
                    </div>
									                    
                    {!! Form::open(['route'=>'catalogos.categories.index','method'=>'GET']) !!}
                        <div class="input-group">
                        <input type="text" name="filter" class="form-control"
                        placeholder="Insertar Datos de Busqueda" value="{{$filter}}"> </input>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submmit">Buscar</button>
                            </span>
					{!! Form::close() !!}
					 </div>
					</center>
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
                                <td>{{$item->description}}</td>
								<td><a class="btn btn-primary btn-xs" href="{{route('catalogos.categories.edit',$item->id)}}">Editar</a>
                                <a class="btn btn-success btn-xs" href="{{route('catalogos.categories.show',$item->id)}}">Ver</a>
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