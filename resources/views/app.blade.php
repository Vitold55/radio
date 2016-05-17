<!DOCTYPE html>
<html>
    <head>
        <title>FMka - онлайн радіо без меж</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="<?=asset('/assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
        <link href="<?=asset('/assets/css/style.css')?>" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.cookie.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/bootstrap/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?=asset('/assets/js/script.js')?>"></script>

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Marck+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div class="container">
            <header>
                <div class="header-wrap">
                    <div class="logo">
                        <a href="/">
                            <img src="<?=asset('/assets/images/verstka/fmka-logo.png')?>" alt="Fmka логотип" class="fmka-logo">
                        </a>
                    </div>
                    <h1>
                        <a href="/">
                            <span>FMka.in.ua</span><span>онлайн радіо без меж</span>
                        </a>
                    </h1>
                    <div class="menu_btn">
                        <i></i>
                        <i class="menu_first"></i>
                        <i class="menu_second"></i>
                        <i></i>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>

            <div class="row">
                <div class="col-md-12">
                    <div class="content">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

        <div class="overlayBox">
            <div class="m__menu_holder">
                <ul class="m__menu">
                    <li class="home menu-item current-menu-item page_item"><a href="/">Головна</a></li>
                    <li class="menu-item"><a href="/">Про радіо</a></li>
                    <li class="menu-item"><a href="/">Про автора</a></li>
                    <li class="menu-item"><a href="/">Співпраця</a></li>
                    <li class="menu-item"><a href="/">Контакти</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
