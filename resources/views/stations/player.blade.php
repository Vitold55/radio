@extends('app')

@section('content')

    <div class="player" id="player">
        <div class="row">
            <div class="col-md-5" id="playerLogoBlock">
                <img src="/assets/images/logos/<?=$stations[0]['logo']?>.jpg" alt="<?=$stations[0]['name']?>" class="logoInPlayer">
                <span class="sourceName"><?=$stations[0]['name']?></span>
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
            togglePlayButton();
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
                togglePlayButton();
            }, false);

            // Находим кнопку и прикрепляем метод на событие onclick
            var pause = document.getElementById('pause');
            pause.addEventListener('click', function () {
                audio.pause();
                togglePlayButton();
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
                <li class="col-lg-2 col-md-3 col-sm-3 col-xs-6 station-source" data-toggle="tooltip" data-placement="top" title="<?=$station['name']?>" data-source="<?=$station['source']?>" data-name="<?=$station['name']?>" data-logo="<?=$station['logo']?>">
                        <div class="logo-bl">
                            <img class="logo-img" src="/assets/images/logos/<?php echo $station['logo'] != null ? $station['logo'] : 'noimg' ?>.jpg" alt="<?=$station['name']?>">
                        </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>

@stop