<template>
    <div>{{ pages }}</div>
</template>

<script>
    export default {
        props: {
            currentPage: {
                type: Number,
                'default': 0
            },
            perPage: {
                type: Number,
                require: true
            },
            totalRecords: {
                type: Number,
                require:true
            }
        },
        computed: {
            pages(){
                let pages = Math.ceil(this.totalRecords / this.perPage);
                return Math.max(pages,1);
            }
        }
    }
</script>

<style scoped>

</style>