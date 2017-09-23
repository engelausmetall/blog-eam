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
                            Crear Registro</a>
                    </div>
									                    
                    {!! Form::open(['route'=>'catalogos.categories.index','method'=>'GET']) !!}
                        <div class="input-group">
                        <input type="text" name="filter" class="form-control"
                        placeholder="Insertar Datos de Busqueda" value="{{$filter}}"> </input>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submmit">
                            <i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
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
								<td><a class="btn btn-primary btn-xs" href="{{route('catalogos.categories.edit',$item->id)}}">
                                <i class="fa fa-pencil-square-o"></i>Editar</a>
                                <a class="btn btn-success btn-xs" href="{{route('catalogos.categories.show',$item->id)}}">
                                <i class="fa fa-hand-pointer-o"></i>Ver</a>

                                <a href="#" action="delete" class="btn btn-danger btn-xs"
                                    url="{{route('catalogos.categories.destroy',$item->id)}}">
                                    <i class="fa fa-trash"></i>Eliminar</a>
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
        {!! Form::open(['method'=>'DELETE','id'=>'frmDelete']) !!}

        {!! Form::close() !!}
@endsection
@php /* aqui declaro mis JS hijo y capturamos el elemento */ @endphp
@section('masterJS')
    <script>
        $("a[action=delete]").on('click',function(){
            //alert($(this).attr('url'));
            var _url=$(this).attr('url');
            swal({
                title: "",
                text: "Est\u00E1s seguro que deseas eliminar el registro",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",

                confirmButtonText: "SI",
                cancelButtonText: "NO",
                closeOnConfirm: true,
                closeOnCancel: true
                },
            function (isConfirm) {
                if (isConfirm) {
                    $("#frmDelete").attr('action',_url);
                    $("#frmDelete").submit();
            }
            });
        });
    </script>
@endsection