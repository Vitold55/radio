<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="<?=asset('/assets/css/style.css')?>" rel="stylesheet" type="text/css">
        <link href="<?php //HTML::style( asset('/css/style.css')); ?>">
    </head>
    <body>
        <header>
            Best FM - <audio src="http://radio.bestfm.fm:8080/bestfm_mp3" preload="auto" controls></audio><br />
            Hit FM - <audio src="http://online-hitfm.tavrmedia.ua/HitFM" preload="auto" controls></audio><br />
            Perets FM - <audio src="http://radio.stilnoe.fm:8080/radio-stilnoe" preload="auto" controls></audio><br />
        </header>
        <div class="container">
            <div class="content">

                @yield('content')

            </div>
        </div>
    </body>
</html>
