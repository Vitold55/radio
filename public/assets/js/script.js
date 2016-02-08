// Initialization player function
function initPlayer(source) {
    $("#jplayer").jPlayer({
        preload: 'auto',
        ready: function(){
            this.element.jPlayer("setFile", source);
        },

        swfPath: 'libs/Jplayer',
        solution: 'html, aurora, flash'
    });
    $("#jplayer").jPlayerId("play", "player_play");
    $("#jplayer").jPlayerId("pause", "player_pause");
    $("#jplayer").jPlayerId("stop", "player_stop");
    $("#jplayer").jPlayerId("volumeMin", "player_volume_min");
    $("#jplayer").jPlayerId("volumeMax", "player_volume_max");
    $("#jplayer").jPlayerId("volumeBar", "player_volume_bar");
    $("#jplayer").jPlayerId("volumeBarValue", "player_volume_bar_value");

    $("#jquery_jplayer").onSoundComplete(function () {
        $("#jquery_jplayer").play();
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
        $('#jPlayer').play();

    });
});