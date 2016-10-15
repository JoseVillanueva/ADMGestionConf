@extends('app')

@section('content')

<div class="container">
<div class="container">
	<h1 class="pull-left">Solicitud</h1>
</div>
    @include('common.errors')

    {!! Form::open(['route' => 'requestvaccines.store']) !!}

        @include('requestvaccines.fields')

    {!! Form::close() !!}
</div>
@endsection
