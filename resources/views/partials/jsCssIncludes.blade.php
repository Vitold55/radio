<link href="<?=asset('/assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
<link href="<?=asset('/assets/css/style.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?=asset('/assets/js/libs/jquery.cookie.js')?>"></script>
<script type="text/javascript" src="<?=asset('/assets/bootstrap/js/bootstrap.min.js')?>"></script>
<?php if (env('APP_DEBUG') == true) : ?>
<script type="text/javascript" src="<?=asset('/assets/js/script.js')?>"></script>
<?php else : ?>
<script type="text/javascript" src="<?=asset('/assets/js/scriptCompressed.js')?>"></script>
<?php endif; ?>

<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Marck+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>