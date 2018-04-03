<template>
    <div id="app">
        <header>

        </header>

        <main>

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
    export default {
        data(){
            return{
                year: new Date().getFullYear()
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
