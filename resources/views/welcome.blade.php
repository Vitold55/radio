<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            header{
                text-align: center;
                font-size: 30px;
                font-weight: bold;
                padding: 30px 0;
                margin-bottom: 100px;
            }
            .container {
                text-align: center;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <?php
            echo __DIR__;
        ?>
        <header>
            Hello! This is my radio
        </header>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
