@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'vaccines.store']) !!}

        @include('vaccines.fields')

    {!! Form::close() !!}
</div>
@endsection
