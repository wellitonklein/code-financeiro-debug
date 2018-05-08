<template src="./_form.html">

</template>

<script type="text/javascript">
    import {BankAccount, Bank} from '../../services/resources';
    import PageTitleComponent from '../PageTitle.vue';
    export default {
        components: {
            'page-title' : PageTitleComponent
        },
        data(){
            return{
                title: 'Editando Conta Bancária',
                bankAccount: {
                    name: '',
                    agency: '',
                    account: '',
                    bank_id: '',
                    'default': false
                },
                banks: []
            }
        },
        created(){
            this.getBanks();
            this.getBankAccount(this.$route.params.id);
        },
        methods: {
            submit(){
                let id = this.$route.params.id
                BankAccount.update({id: id},this.bankAccount).then(() => {
                    Materialize.toast('Conta Bancária atualizada com Sucesso!',500)
                    this.$router.go({name: 'bank-account.list'})
                })
            },
            getBanks() {
                Bank.query().then((response) => {
                    this.banks = response.data.data
                })
            },
            getBankAccount(id){
                BankAccount.get({id: id}).then((response) => {
                    this.bankAccount = response.data.data
                    // this.bank = response.data.data.bank.data
                })
            }
        }
    }
</script>

<style scoped>

</style>