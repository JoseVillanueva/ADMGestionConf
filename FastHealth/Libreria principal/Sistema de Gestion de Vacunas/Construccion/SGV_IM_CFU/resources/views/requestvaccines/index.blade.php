@extends('app')

@section('content')



    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Adquisición de vacunas</h1>

            


            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="#">Generar orden de compra</a>
            <a class="btn btn-primary pull-right" style="margin-top: 25px;margin-right: 25px;" href="{!! route('requestvaccines.create') !!}">Agregar</a>

            <div class="form-group col-sm-6 col-lg-4" style="margin-top: 23px;
    margin-bottom: -41px;
    margin-left: 401px;">
                
                Año: <select class="" name="vaccine_id">
                    <option value="1">2016</option>
                    <option value="2">2015</option>
                    <option value="3">2014</option>
                    <option value="4">2013</option>
                    <option value="5">2012</option>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;
                Periodo:<select class="" name="vaccine_id">
                    <option value="1">Primer trimestre</option>
                    <option value="2">Segundo trimestre</option>
                    <option value="3">Tercer trimestre</option>
                    <option value="4">Cuarto trimestre</option>
                </select>   
            </div>       
        </div>
        <h3 class="pull-left">Solicitudes</h3>
        <div class="row">
            @if($requestvaccines->isEmpty())
                <div class="well text-center">No se encontraron registros</div>
            @else
                <table class="table">
                    <thead>
                    <th>Solicitante</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Cantidad</th>
            <th>Vacuna</th>
			
            <th>Via de administración</th>
            <th>Observaciones</th>
                    <th width="50px"></th>
                    </thead>
                    <tbody>
                     
                    @foreach($requestvaccines as $requestvaccines)
                        <tr>
                            <td>{!! $requestvaccines->name !!}</td>
					<td>{!! $requestvaccines->city !!}</td>
					<td>{!! $requestvaccines->country !!}</td>
					<td>{!! $requestvaccines->telephone !!}</td>
					

                    <td>{!! $vaccines[$requestvaccines->vaccine_id] !!}</td>
                    <td>{!! $supplier[$requestvaccines->supplier_id] !!}</td>
                    <td>{!! $requestvaccines->observation !!}</td>
                    
                            <td>
                                <a href="{!! route('requestvaccines.edit', [$requestvaccines->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('requestvaccines.delete', [$requestvaccines->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar este registro?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>


@endsection