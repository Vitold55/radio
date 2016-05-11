<!DOCTYPE html>
<html>
    <head>
        <title>Radio</title>

        <link href="<?=asset('/assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
        <link href="<?=asset('/assets/css/style.css')?>" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.cookie.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/js/script.js')?>"></script>
    </head>
    <body>
        <header>
            <h1>Онлайн радіо</h1>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
