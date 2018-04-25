<template>
    <ul :id="o.id" class="dropdown-content" v-for="o in config.menusDropDown">
        <li v-for="item in o.items" :class="menuItemClass(item)">
            <a :href="item.url">{{item.name}}</a>
        </li>
    </ul>
    <!--<div class="navbar-fixed">-->
    <ul id="dropdown-logout" class="dropdown-content">
        <li>
            <a :href="config.urlLogout" @click.prevent="goToLogout()">Sair</a>
            <form id="logout-form" :action="config.urlLogout" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="config.csrfToken"/>
            </form>
        </li>
    </ul>
    <div class="row">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#" class="left brand-logo">Financeiro Admin <i class="material-icons">local_grocery_store</i></a>
                    <a href="#" data-activates="nav-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li v-for="menu in config.menus" :class="menuItemClass(menu)">
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
    </div>
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
                        urlLogout: ''
                    }
                }
            }
        },
        ready(){
            $(".button-collapse").sideNav();
            $('.dropdown-button').dropdown();
        },
        methods:{
            goToLogout(){
                $('#logout-form').submit();
            },
            menuItemClass(menu){//ativar menus e submenus
                let menuClass = ['active'];
                if (menu.active){
                    return menuClass;
                }
                
                if (menu.dropDownID !== undefined){
                    let dropdown = this.config.menusDropDown.find((element)=>{
                        return element.id == menu.dropDownID;
                    });
                    if (dropdown){
                        for (let o of  dropdown.items){
                            if (o.active){
                                return menuClass;
                            }
                        } 
                    } 
                }
            }
        }
    };
</script>

<style type="text/css" scoped>

</style>
