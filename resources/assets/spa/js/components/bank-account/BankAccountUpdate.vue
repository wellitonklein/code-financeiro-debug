<template src="./_form.html">

</template>

<script type="text/javascript">
    export default {
        components: {

        },
        data(){
            return{
                title: 'Nova conta bancária',
                bankAccount: {
                    name: '',
                    agency: '',
                    account: '',
                    bank_id: '',
                    'default': false
                },
                bank: {
                    name: ''
                }
            }
        },
        computed: {

        },
        created(){

        },
        methods: {

        }
    }
</script>

<style scoped>

</style>