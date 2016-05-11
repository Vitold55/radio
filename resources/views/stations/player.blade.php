@extends('app')

@section('content')

    <div class="player">
        <div class="row">
            <div class="col-md-5">
                <span class="sourceName"><?=$stations[0]['name']?>:</span>
            </div>
            <div class="col-md-2">
                <input id="play" type="button" value="Play" />
                <input id="pause" type="button" value="Pause" />
            </div>
            <div class="col-md-4 volume-block">
                <input id="volume" type="range" min="0" max="100" value="30" />
            </div>
        </div>
    </div>

    <script type="text/javascript">
            // Создаем новый объект Audio
            var audio = new Audio();
            audio.preload = "auto";
            var volumeEl = document.getElementById('volume');

            // Добавляем к кнопке с идентификатором "play" обработчик события onclick, внутри которого вызывается метод play
            var play = document.getElementById('play');
            play.addEventListener('click', function () {
                if (audio.src == '') {
                    audio = new Audio('<?=$stations[0]['source']?>');
                }
                audio.volume = parseFloat(volumeEl.value / 100);
                audio.play();
            }, false);

            // Находим кнопку и прикрепляем метод на событие onclick
            var pause = document.getElementById('pause');
            pause.addEventListener('click', function () {
                audio.pause();
            }, false);

            // Найти HTML5-элемент input типа range и добавить обработчик события onchange для настройки звука
            volume.addEventListener('mousemove', function () {
                var volumeValue = parseFloat(volumeEl.value / 100);
                audio.volume = volumeValue;
                setTimeout($.cookie("volume", volumeValue * 100), 2000);
            }, false);
    </script>

    <div class="stationsList">
        <ul>
            <?php foreach ($stations as $station) : ?>
                <li class="col-md-4 col-sm-6 col-xs-12"><a class="station-source" href="javascript:void(0);" data-source="<?=$station['source']?>" data-name="<?=$station['name']?>">
                        <div class="logo-bl col-md-6">
                            <img class="logo-img" src="/assets/images/logos/<?php echo $station['logo'] != null ? $station['logo'] : 'noimg' ?>.jpg" alt="<?=$station['name']?>">
                        </div>
                        <div class="station-name-bl col-md-5  col-md-offset-1">
                            <?=$station['name']?>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

@stop