@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'method' => 'patch']) !!}

        @include('suppliers.fields')

    {!! Form::close() !!}
</div>
@endsection
