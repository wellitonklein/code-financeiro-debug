@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Novo Banco</h4>
            {!! Form::open(['route' => 'admin.banks.store','files' => true]) !!}

            @include('admin.banks._form')

            <div class="row">
                {!! Form::submit('Salvar',['class'=>'btn waves-effect green white-text right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection