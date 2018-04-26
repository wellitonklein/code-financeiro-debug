<template>
    <ul :id="o.id" class="dropdown-content" v-for="o in menusDropDown">
        <li v-for="item in o.items">
            <a v-link="{name: item.routeName}">{{item.name}}</a>
        </li>
    </ul>
    <ul id="dropdown-logout" class="dropdown-content">
        <li>
            <a v-link="{name: 'auth.logout'}">Sair</a>
        </li>
    </ul>
    <div>
        <div class="navbar">
            <nav>
                <div class="nav-wrapper container">
                    <div class="col s12">
                        <a href="#" class="left brand-logo">Contas <i class="material-icons">local_grocery_store</i></a>
                        <a href="#" data-activates="nav-mobile" class="button-collapse right">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li v-for="menu in menus">
                                <a v-if="menu.dropDownID" class="dropdown-button" href="!#" :data-activates="menu.dropDownID">
                                    {{menu.name}} <i class="material-icons right">arrow_drop_down</i>
                                </a>
                                <a v-else v-link="{name: menu.url}">{{menu.name}}</a>
                            </li>
                            <li>
                                <a href="!#" class="dropdown-button" data-activates="dropdown-logout">
                                    {{ name }} <i class="material-icons right">arrow_drop_down</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul id="nav-mobile" class="side-nav">
                        <li v-for="menu in menus">
                            <a v-link="{name: menu.url}">{{menu.name}}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Auth from '../services/auth';
    export default {
        data() {
            return{
                menus: [
                    {name:"Contas a Pagar", dropDownID: 'teste'},
                    {name:"Contas a Receber", routeName: 'auth.login'}
                ],
                menusDropDown:[
                    {
                        id: 'teste',
                        items: [
                            {name:"Listar Contas", routeName: 'auth.login'},
                            {name:"Criar Conta", routeName: 'auth.login'}
                        ]
                    }
                ],
                user: Auth.user
            }
        },
        computed:{
            name(){
                return this.user.data ? this.user.data.name : '';
            }
        },
        ready(){
            $('.button-collapse').sideNav();
            $('.dropdown-button').dropdown();
        }
    };
</script>

<style type="text/css" scoped>

</style>