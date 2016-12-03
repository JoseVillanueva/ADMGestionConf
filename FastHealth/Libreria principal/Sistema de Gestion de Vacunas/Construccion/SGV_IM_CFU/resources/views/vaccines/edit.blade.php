@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($vaccine, ['route' => ['vaccines.update', $vaccine->id], 'method' => 'patch']) !!}

        @include('vaccines.fields')

    {!! Form::close() !!}
</div>
@endsection
