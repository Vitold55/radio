$(document).ready(function() {
    // Save volume value to cookie
    var savedVolume = $.cookie("volume");
    if (savedVolume) {
        $('#volume').val(savedVolume);
    }

    // Change station on Player
    $(".station-source").click(function() {
        var source = $(this).data('source');
        var name = $(this).attr('data-name');
        if (audio) {
            /*try {*/
                audio.setAttribute('src', source);
                audio.load();
                var volume = $('#volume').val();
                audio.volume = parseFloat(volume / 100);
                audio.play();
                $('.sourceName').text(name + ':');
            /*}
            catch(e) {
                alert("Error");
            }*/
        }
    });
});