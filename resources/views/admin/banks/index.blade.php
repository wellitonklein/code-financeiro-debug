@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Listagem de Bancos</h4>
                <div class="card-panel z-depth-5">
                    <table class="bordered striped highlight">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="center">Nome</th>
                            <th class="center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($banks as $bank)
                            <tr>
                                <td>
                                    <div class="row valign-wrapper">
                                        <div class="col s12">{{$bank->id}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row valing-wrapper">
                                        <div class="col s2">
                                            <img src="{{asset("storage/banks/images/{$bank->logo}")}}"
                                                 class="circle bank-logo">
                                        </div>
                                        <div class="col s10">
                                            <span class="left">{{$bank->name}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="center">
                                    <div class="row valign-wrapper">
                                        <div class="col s12">
                                            <a href="{{route('admin.banks.edit',['bank'=>$bank->id])}}" class="btn waves-effect btn-floating orange">
                                                <i class="material-icons">mode_edit</i>
                                            </a>
                                            <delete-action action="{{route('admin.banks.destroy',['bank'=>$bank->id])}}"
                                                           action-element="link-delete-{{$bank->id}}"
                                                           csrf-token="{{csrf_token()}}">
                                                <?php $modalId = "modal-delete-$bank->id"?>
                                                <a id="link-modal-{{$bank->id}}" href="#{{$modalId}}" class="btn waves-effect btn-floating red">
                                                    <i class="material-icons">delete</i>
                                                </a>
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
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="center-align">
                    <div class="fixed-action-btn">
                        <a href="{{route('admin.banks.create')}}" class="btn waves-effect btn-floating btn-large purple darken-1">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </div>
                {!! $banks->links() !!}
            </div>
        </div>
    </div>
@endsection