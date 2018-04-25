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
                                {{--{!! Form::open(['route' => ['admin.banks.destroy', $bank->id], 'method' => 'delete']) !!}--}}
                                {{--<div class='btn-group'>--}}
                                    {{--<a href="{!! route('admin.banks.edit', [$bank->id]) !!}" class="waves-effect waves-teal btn-flat">--}}
                                        {{--<i class="material-icons">mode_edit</i>--}}
                                    {{--</a>--}}
                                    {{--{!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit','class'=>'waves-effect waves-teal btn-flat']) !!}--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                                <a href="{{route('admin.banks.edit',['bank'=>$bank->id])}}">Editar</a> |
                                <delete-action action="{{route('admin.banks.destroy',['bank'=>$bank->id])}}"
                                               action-element="link-delete-{{$bank->id}}"
                                               csrf-token="{{csrf_token()}}">
                                    <?php $modalId = "modal-delete-$bank->id"?>
                                    <a id="link-modal-{{$bank->id}}"
                                       href="#{{$modalId}}">Excluir</a>
                                    <modal :modal="{{json_encode(['id' => $modalId])}}" style="display: none">
                                        <div slot="content">
                                            <h5>Mensagem de Confirmação</h5>
                                            <p><strong>Deseja excluir este banco?</strong></p>
                                            <div class="divider"></div>
                                            <p>Nome: <strong>{{$bank->name}}</strong></p>
                                            <div class="divider"></div>
                                        </div>
                                        <div slot="footer">
                                            <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action"
                                                    id="link-delete-{{$bank->id}}">Ok</button>
                                            <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
                                        </div>
                                    </modal>
                                </delete-action>
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