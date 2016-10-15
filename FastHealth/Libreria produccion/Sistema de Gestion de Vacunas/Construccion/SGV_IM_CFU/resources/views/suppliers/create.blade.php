@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'suppliers.store']) !!}

        @include('suppliers.fields')

    {!! Form::close() !!}
</div>
@endsection
