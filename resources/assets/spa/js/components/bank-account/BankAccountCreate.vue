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
                title: 'Nova Conta Bancária',
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
            this.getBanks()
        },
        methods: {
            submit(){
                BankAccount.save({},this.bankAccount).then(() => {
                    Materialize.toast('Conta Bancária Criada com Sucesso!',400)
                    this.$router.go({name: 'bank-account.list'})
                })
            },
            getBanks() {
                Bank.query().then((response) => {
                    this.banks = response.data.data
                })
            }
        }
    }
</script>

<style scoped>

</style>