$(document).ready(function() {
    // Change station on Player
    $(".station-source").click(function() {
        var source = $(this).data('source');
        var name = $(this).attr('data-name');
        if (audio) {
            audio.pause();
        }
        if (audio.paused) {
            /*try {*/
                audio = new Audio(source);
                var volume = $('#volume').val();
                audio.volume = parseFloat(volume / 100)
                audio.play();
                $('.sourceName').text(name + ':');
            /*}
            catch(e) {
                alert("Error");
            }*/
        }
    });
});