<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <header>
            @if (Auth::check())
                <?php $menuConfig = [
                        'name' => Auth::user()->name,
                        'menus' => [
                            ['name'=>'Dashboard','url'=>'/dashboard'],
                            ['name'=>'Contas a Pagar','url'=>'/teste1','dropDownID'=>'teste1'],
                            ['name'=>'Contas a Receber','url'=>'/teste2','dropDownID'=>'teste2']
                        ],
                        'menusDropDown' => [
                            [
                                'id'=>'teste1',
                                'items'=>[
                                    ['name'=>"Listar Contas", 'url'=> 'listar'],
                                    ['name'=>"Criar Conta", 'url'=> 'criar'],
                                ]
                            ],
                            [
                                'id'=>'teste2',
                                'items'=>[
                                    ['name'=>"Listar Contas", 'url'=> 'listar'],
                                    ['name'=>"Criar Conta", 'url'=> 'criar'],
                                ],
                            ]
                        ],
                        'urlLogout'=>env('URL_ADMIN_LOGOUT'),
                        'csrfToken'=> csrf_token()
                    ]
                ?>
                <admin-menu :config="{{ json_encode($menuConfig) }}"></admin-menu>
            @endif
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    <div class="right">
                        @ {{ date('Y') }} <a href="http://0.0.0.0:9000/home" class="grey-text text-lighten-4">Code Financeiro</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('build/admin.bundle.js') }}"></script>
</body>
</html>
