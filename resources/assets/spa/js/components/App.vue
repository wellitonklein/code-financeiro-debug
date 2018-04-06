<template>
    <div id="app">
        <header v-if="showMenu">
            <menu></menu>
        </header>

        <main>
            <router-view></router-view>
        </main>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    <div class="right">
                        @ {{ year }} <a href="http://0.0.0.0:9000/home" class="grey-text text-lighten-4">Code Financeiro</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script type="text/javascript">
    import MenuComponent from './Menu.vue';
    import Auth from '../services/auth';
    export default {
        components:{
            'menu': MenuComponent
        },
        data(){
            return{
                year: new Date().getFullYear(),
                user: Auth.user
            }
        },
        computed:{
            showMenu(){
                return this.user.check && this.$route.name !== 'auth.login';
            }
        }
    };
</script>

<style type="text/css" scoped>
    #app{
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main{
        flex: 1 0 auto;
    }
</style>
