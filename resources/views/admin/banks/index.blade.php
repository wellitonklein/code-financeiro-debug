@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h4>Listagem de Bancos</h4>
                <div class="row col s12">
                    <a href="{{route('admin.banks.create')}}" class="btn waves-effect">Novo</a>
                </div>
                <table class="striped responsive-table z-depth-5 table-style">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($banks as $bank)
                        <tr>
                            <td>{{$bank->id}}</td>
                            <td>{{$bank->name}}</td>
                            <td>
                                {!! Form::open(['route' => ['admin.banks.destroy', $bank->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('admin.banks.edit', [$bank->id]) !!}" class="waves-effect waves-teal btn-flat">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit','class'=>'waves-effect waves-teal btn-flat']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $banks->links() !!}
            </div>
        </div>
    </div>
@endsection