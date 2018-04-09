@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h4>Listagem de Bancos</h4>
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
                                Ações
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