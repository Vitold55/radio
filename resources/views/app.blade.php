<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="<?=asset('/assets/css/style.css')?>" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.jplayer.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/js/script.js')?>"></script>
    </head>
    <body>
        <header>
            <h1>Радіо онлайн</h1>
            <?=link_to('/stations', 'Каталог радіостанцій', ['class' => 'station-link'])?>
        </header>
        <div class="container">
            <div class="content">

                @yield('content')

            </div>
        </div>
    </body>
</html>
