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
        var logo = $(this).attr('data-logo');
        if (audio) {
            /*try {*/
                audio.setAttribute('src', source);
                audio.load();
                var volume = $('#volume').val();
                audio.volume = parseFloat(volume / 100);
                audio.play();
                $('.sourceName').text(name + ':');
                $('.logoInPlayer').attr('src', '/assets/images/logos/' + logo + '.jpg');
                $('.logoInPlayer').attr('alt', name);

                togglePlayButton();
            /*}
            catch(e) {
                alert("Error");
            }*/
        }


    });

    // Init bootstrap tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Menu animation
    $(".menu_btn").on("click", function(){
        $(this).toggleClass("close_button").closest("body").find(".overlayBox").toggleClass("show");
        $("header>div").first().toggleClass("header-wrap-fixed");
        var contWidth = $(".container").width();
        $(".header-wrap-fixed").width(contWidth);
    });
    $(".menu_sublist_caption").on("click", function(){
        $(this).toggleClass("clicked").closest(".m__menu_item").find(".m__menu_sublist").slideToggle();
    });
});

function togglePlayButton() {
    if (!audio.paused) {
        $("#play").hide();
    } else {
        $("#play").show();
    }
}