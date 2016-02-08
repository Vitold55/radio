@extends('app')

@section('content')

    <div class="station-block" id="station<?=$stations[0]['id']?>">

        <div id="jplayer"></div>

        <div id="player_container">
            <ul id="player_controls">
                <li id="player_play" class="player_play"><a href="#" onClick="$('#jplayer').play(); return false;" title="play"><span>play</span></a></li>
                <li id="player_pause" class="player_pause"><a href="#" onClick="$('#jplayer').pause(); return false;" title="pause"><span>pause</span></a></li>
                <li id="player_stop" class="player_stop"><a href="#" onClick="$('#jplayer').stop(); return false;" title="stop"><span>stop</span></a></li>
                <li id="player_volume_min" class="player_volume_min"><a href="#" onClick="$('#jplayer').volume(0); return false;" title="min volume"><span>min volume</span></a></li>
                <li id="player_volume_max" class="player_volume_max"><a href="#" onClick="$('#jplayer').volume(100); return false;" title="max volume"><span>max volume</span></a></li>
            </ul>

            <div id="player_volume_bar" class="player_volume_bar">
                <div id="player_volume_bar_value" class="player_volume_bar_value"></div>
            </div>

            <div id="player_playlist_message">
                <div id="song_title"><?=$stations[0]['name']?></div>
            </div>
        </div>
    </div>

    <?php foreach ($stations as $station) : ?>
        <li id="radioSource"><a style="cursor: pointer;" data-source="<?=$station['source']?>" data-name="<?=$station['name']?>"><?=$station['name']?></a></li>
    <?php endforeach; ?>

@stop