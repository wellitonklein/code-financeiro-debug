<template>
    <div class="container">
        <div class="row">
            <div class="card-panel green lighten-3">
                <span class="green-text text-darken-2">
                    <h5>Minhas contas Bancárias</h5>
                </span>
            </div>
            <div class="card-panel z-depth-5 ">
                <table class="bordered striped highlight">
                    <thead>
                    <tr>
                        <th v-for="(key, o) in table.headers" :width="o.width">
                            <a href="#" @click.prevent="sortBy(key)">
                                {{o.label}}
                                <i class="material-icons left" v-if="order.key == key">
                                    {{ order.sort == 'asc' ? 'arrow_drop_up' : 'arrow_drop_down' }}
                                </i>
                            </a>
                        </th>

                        <th class="center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(index,o) in bankAccounts">
                        <td>{{index+1}}</td>
                        <td>{{ o.name }}</td>
                        <td>{{ o.agency }}</td>
                        <td>{{ o.account }}</td>
                        <td class="center">
                            <a v-link="{ name: 'bank-account.update', params:{id: o.id} }" class="btn waves-effect btn-floating orange">
                                <i class="material-icons">mode_edit</i>
                            </a>
                            <a href="#" @click.prevent="openModalDelete(o)" class="btn waves-effect btn-floating red">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination :current-page.sync="pagination.current_page"
                            :per-page="pagination.per_page"
                            :total-records="pagination.total">
                </pagination>
            </div>

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large" v-link="{name: 'bank-account.create'}">
                    <i class="large material-icons">add</i>
                </a>
            </div>

        </div>
    </div>

    <modal :modal="modal">
        <div slot="content" v-if="bankAccountToDelete">
            <h4>Mensagem de Confirmação</h4>
            <p><strong>Deseja excluir esta conta bancária?</strong></p>
            <div class="divider"></div>
            <p>Nome: <strong>{{bankAccountToDelete.name}}</strong></p>
            <p>Agência: <strong>{{bankAccountToDelete.agency}}</strong></p>
            <p>C/C: <strong>{{bankAccountToDelete.account}}</strong></p>
            <div class="divider"></div>
        </div>
        <div slot="footer">
            <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action" @click="destroy()">
                Ok
            </button>
            <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
        </div>
    </modal>

</template>

<script type="text/javascript">
    import {BankAccount} from "../../services/resources";
    import ModalComponent from "../../../../_default/components/Modal.vue";
    import PaginationComponent from "../../../../_default/components/Pagination.vue";

    export default {
        components: {
            'modal': ModalComponent,
            'pagination' : PaginationComponent
        },
        data(){
            return{
                bankAccounts: [],
                bankAccountToDelete: null,
                modal: {
                    id: 'modal-delete'
                },
                pagination: {
                    current_page: 0,
                    per_page: 0,
                    total: 0
                },
                order:{
                    key: 'name',
                    sort: 'asc'
                },
                table: {
                    headers: {
                        id: {
                            label: '#',
                            width: '10%'
                        },
                        name: {
                            label: 'Nome',
                            width: '30%'
                        },
                        agency: {
                            label: 'Agência',
                            width: '15%'
                        },
                        account: {
                            label: 'C/C',
                            width: '25%'
                        },
                    }
                }
            };
        },
        created() {
            this.getBankAccounts()
        },
        methods: {
            destroy() {
                BankAccount.delete({id: this.bankAccountToDelete.id}).then((response) => {
                    this.bankAccounts.$remove(this.bankAccountToDelete);
                    this.bankAccountToDelete = null;
                    Materialize.toast('Conta bancária excluída com sucesso!',5000);
                });
            },
            openModalDelete(bankAccount){
                this.bankAccountToDelete = bankAccount;
                $('#modal-delete').modal('open');
            },
            getBankAccounts(){
                BankAccount.query({
                    page: this.pagination.current_page+1,
                    orderBy: this.order.key,
                    sortedBy: this.order.sort
                }).then((response) => {
                    this.bankAccounts = response.data.data
                    let pagination = response.data.meta.pagination
                    pagination.current_page--
                    this.pagination = pagination
                })
            },
            sortBy(key){
                this.order.key = key
                this.order.sort = this.order.sort == 'desc' ? 'asc' : 'desc'
                this.getBankAccounts()
            }
        },
        events: {
            'pagination::changed'(page) {
                this.getBankAccounts()
            }
        }
    }
</script>

<style scoped>

</style>