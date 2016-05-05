@extends('app')

@section('content')

    <div class="player">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <span class="sourceName">Best FM:</span>
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
        var audio = new Audio('http://radio.bestfm.fm:8080/bestfm_mp3');

        // Добавляем к кнопке с идентификатором "play" обработчик события onclick, внутри которого вызывается метод play
        var play = document.getElementById('play');
        play.addEventListener('click', function(){
            audio.play();
        }, false);

        // Находим кнопку и прикрепляем метод на событие onclick
        var pause = document.getElementById('pause');
        pause.addEventListener('click', function(){
            audio.pause();
        }, false);

        // Найти HTML5-элемент input типа range и добавить обработчик события onchange для настройки звука
        var volume = document.getElementById('volume');
        volume.addEventListener('mousemove', function(){
            audio.volume = parseFloat(this.value / 100);
        }, false);

    </script>

    <div class="stationsList">
        <ul>
            <?php foreach ($stations as $station) : ?>
                <li><a class="station-source" href="javascript:void(0);" data-source="<?=$station['source']?>" data-name="<?=$station['name']?>"><?=$station['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

@stop