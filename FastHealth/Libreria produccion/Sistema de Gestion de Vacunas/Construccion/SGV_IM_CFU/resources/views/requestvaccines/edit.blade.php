@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($requestvaccines, ['route' => ['requestvaccines.update', $requestvaccines->id], 'method' => 'patch']) !!}

        @include('requestvaccines.fields')

    {!! Form::close() !!}
</div>
@endsection
