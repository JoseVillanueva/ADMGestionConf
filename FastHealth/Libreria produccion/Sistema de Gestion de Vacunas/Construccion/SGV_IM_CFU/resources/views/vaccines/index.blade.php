@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Vacunas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('vaccines.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($vaccines->isEmpty())
                <div class="well text-center">No hay vacunas registradas.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Descripción</th>
                    <th width="50px"></th>
                    </thead>
                    <tbody>
                     
                    @foreach($vaccines as $vaccine)
                        <tr>
                            <td>{!! $vaccine->name !!}</td>
					<td>{!! $vaccine->description !!}</td>
                            <td>
                                <a href="{!! route('vaccines.edit', [$vaccine->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('vaccines.delete', [$vaccine->id]) !!}" onclick="return confirm('Are you sure wants to delete this Vaccine?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection