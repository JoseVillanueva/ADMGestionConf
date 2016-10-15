@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Proveedores</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('suppliers.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($suppliers->isEmpty())
                <div class="well text-center">Ningun proveedor Encontrado.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Dirección</th>
			<th>Ciudad</th>
			<th>Pais</th>
			<th>Telefono</th>
			<th>Email</th>
			<th>Url</th>
                    <th width="50px"></th>
                    </thead>
                    <tbody>
                     
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{!! $supplier->name !!}</td>
					<td>{!! $supplier->address !!}</td>
					<td>{!! $supplier->city !!}</td>
					<td>{!! $supplier->country !!}</td>
					<td>{!! $supplier->telephone !!}</td>
					<td>{!! $supplier->email !!}</td>
					<td>{!! $supplier->url !!}</td>
                            <td>
                                <a href="{!! route('suppliers.edit', [$supplier->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('suppliers.delete', [$supplier->id]) !!}" onclick="return confirm('Estas seguro que deseas borrar este proveedor?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection