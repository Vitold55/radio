// Initialization player function
function initPlayer(source, id) {
    $("#jquery_jplayer_" + id).jPlayer({
        ready: function () {
            $("#jquery_jplayer_" + id).change(source);
        }
    });
    $("#jquery_jplayer_" + id).jPlayerId("play", "player_play_" + id);
    $("#jquery_jplayer_" + id).jPlayerId("pause", "player_pause_" + id);
    $("#jquery_jplayer_" + id).jPlayerId("stop", "player_stop_" + id);
    $("#jquery_jplayer_" + id).jPlayerId("volumeMin", "player_volume_min_" + id);
    $("#jquery_jplayer_" + id).jPlayerId("volumeMax", "player_volume_max_" + id);
    $("#jquery_jplayer_" + id).jPlayerId("volumeBar", "player_volume_bar_" + id);
    $("#jquery_jplayer_" + id).jPlayerId("volumeBarValue", "player_volume_bar_value_" + id);

    $("#jquery_jplayer").onSoundComplete(function () {
        $("#jquery_jplayer").play();
    });
}