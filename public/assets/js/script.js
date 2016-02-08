// Initialization player function
function initPlayer(source) {
    $("#jplayer").jPlayer({
        ready: function () {
            $("#jplayer").change(source);
        },
        swfPath: 'libs/Jplayer',
        solution: 'html, flash'
    });
    $("#jplayer").jPlayerId("play", "player_play");
    $("#jplayer").jPlayerId("pause", "player_pause");
    $("#jplayer").jPlayerId("stop", "player_stop");
    $("#jplayer").jPlayerId("volumeMin", "player_volume_min");
    $("#jplayer").jPlayerId("volumeMax", "player_volume_max");
    $("#jplayer").jPlayerId("volumeBar", "player_volume_bar");
    $("#jplayer").jPlayerId("volumeBarValue", "player_volume_bar_value");

    $("#jplayer").onSoundComplete(function () {
        $("#jplayer").play();
    });
}


$(document).ready(function() {
    initPlayer('http://online-kissfm.tavrmedia.ua/KissFM');

    $("#radioSource a").click(function() {
        var source = $(this).data("source");
        var name = $(this).data("name");

        $("#song_title").text(name);
        $("#jplayer").jPlayer("clearFile");
        $('#jplayer').jPlayer("setFile", source);
        //$('#jplayer').stop();
        //$('#jplayer').play();
    });
});