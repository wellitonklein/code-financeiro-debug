<template>
    <ul :id="o.id" class="dropdown-content" v-for="o in config.menusDropDown">
        <li v-for="item in o.items">
            <a :href="item.url">{{item.name}}</a>
        </li>
    </ul>
    <!--<div class="navbar-fixed">-->
    <ul id="dropdown-logout">
        <li>
            <a :href="config.urlLogout" @click.prevent="goToLogout()">
                Sair
            </a>

            <form id="logout-form" :action="config.urlLogout" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="config.csrfToken">
            </form>
        </li>
    </ul>
    <nav class="deep-purple darken-1s">
        <div class="nav-wrapper">
            <div class="cols s12">
                <a href="#" class="left brand-logo">Code Financeiro Admin <i class="material-icons">local_grocery_store</i></a>
                <a href="#" data-activates="nav-mobile" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li v-for="menu in config.menus">
                        <a v-if="menu.dropDownID" class="dropdown-button" href="!#" :data-activates="menu.dropDownID">
                            {{menu.name}} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <a v-else :href="menu.url">{{menu.name}}</a>
                    </li>
                    <li>
                        <a class="dropdown-button" href="!#" data-activates="dropdown-logout">
                            {{config.name}} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul id="nav-mobile" class="side-nav">
                <li v-for="menu in config.menus">
                    <a :href="menu.url">{{menu.name}}</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--</div>-->
    <!--<router-view></router-view>-->
</template>

<script type="text/javascript">
    export default {
        props: {
            config:{
                type: Object,
                default(){
                    return {
                        name: '',
                        menus: [],
                        menusDropDown: [],
                        urlLogout: '/admin/logout'
                    }
                }
            }
        },
        ready(){
            $(".button-collapse").sideNav();
            $('.dropdown-button').dropdown();
        },
        /*data() {
            return{
                menus: [
                    {name:"Dashboard", routeName: 'dashboard-bills'},
                    {name:"Contas a Pagar", routeName: 'bill-pay.list', dropDownID: 'bill-pay'},
                    {name:"Contas a Receber", routeName: 'bill-receive.list', dropDownID: 'bill-receive'}
                ],
                menusDropDown:[
                    {
                        id: 'bill-pay', items: [
                            {id: 0,name:"Listar Contas", routeName: 'bill-pay.list'},
                            {id: 1,name:"Criar Conta", routeName: 'bill-pay.create'}
                        ]
                    },
                    {
                        id: 'bill-receive', items: [
                            {id: 0,name:"Listar Contas", routeName: 'bill-receive.list'},
                            {id: 1,name:"Criar Conta", routeName: 'bill-receive.create'}
                        ]
                    }
                ],
            };
        }*/
        methods:{
            goToLogout(){
                $('logout-form').submit();
            }
        }
    };
</script>

<style type="text/css" scoped>

</style>
