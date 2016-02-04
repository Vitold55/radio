@extends('app')

@section('content')


    <div style="margin: 10px 0 30px;">
        <div>
            <input id="play" type="button" value="Play" />
            <input id="pause" type="button" value="Pause" />
            <span id="duration"> </span>
        </div>
        <div>
            Громкость:
            <input id="volume" type="range" min="0" max="100" value="30" />
        </div>
    </div>

    <script type="text/javascript">
        // Создаем новый объект Audio
        var audio = new Audio('http://s2.radioheart.ru:8006/listen');

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

        // Добавить обработчик события timeupdate для вывода времени воспроизведения
        audio.addEventListener("timeupdate", function() {
            var duration = document.getElementById('duration');
            var s = parseInt(audio.currentTime % 60);
            var m = parseInt((audio.currentTime / 60) % 60);
            duration.innerHTML = m + '.' + s + 'sec';
        }, false);
    </script>

    <?php foreach ($stations as $station) : ?>
        <div class="station-block" id="station<?=$station['id']?>">
            <script type="text/javascript">
                $(document).ready(function() {
                    initPlayer('<?=$station['source']?>', '<?=$station['id']?>');
                })
            </script>

            <div id="jquery_jplayer_<?=$station['id']?>"></div>

            <div id="player_container">
                <ul id="player_controls">
                    <li id="player_play_<?=$station['id']?>" class="player_play"><a href="#" onClick="$('#jquery_jplayer_<?=$station['id']?>').play(); return false;" title="play"><span>play</span></a></li>
                    <li id="player_pause_<?=$station['id']?>" class="player_pause"><a href="#" onClick="$('#jquery_jplayer_<?=$station['id']?>').pause(); return false;" title="pause"><span>pause</span></a></li>
                    <li id="player_stop_<?=$station['id']?>" class="player_stop"><a href="#" onClick="$('#jquery_jplayer').stop(); return false;" title="stop"><span>stop</span></a></li>
                    <li id="player_volume_min_<?=$station['id']?>" class="player_volume_min"><a href="#" onClick="$('#jquery_jplayer').volume(0); return false;" title="min volume"><span>min volume</span></a></li>
                    <li id="player_volume_max_<?=$station['id']?>" class="player_volume_max"><a href="#" onClick="$('#jquery_jplayer').volume(100); return false;" title="max volume"><span>max volume</span></a></li>
                </ul>

                <div id="player_volume_bar_<?=$station['id']?>" class="player_volume_bar">
                    <div id="player_volume_bar_value_<?=$station['id']?>" class="player_volume_bar_value"></div>
                </div>

                <div id="player_playlist_message">
                    <div id="song_title"><?=$station['name']?></div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
@stop