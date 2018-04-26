@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Editando Banco</h4>
            {!! Form::model($bank,[
                'route' => ['admin.banks.update','bank'=> $bank->id],
                'method'=> 'PUT',
                'files' => true
            ]) !!}

            @include('admin.banks._form')

            <div class="row">
                {!! Form::submit('Salvar',['class'=>'btn waves-effect green white-text right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection