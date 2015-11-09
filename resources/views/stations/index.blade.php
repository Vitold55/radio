@extends('app')

@section('content')

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