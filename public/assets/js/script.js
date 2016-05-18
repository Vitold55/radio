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

    // Fix player on top while scrolling page
    $(window).scroll(function(){
        if (!$(".overlayBox").hasClass("show")) {
            fixPlayerOnScrolling();
        }
    });
    $(".close_button").click(function(){
        if (!$(".overlayBox").hasClass("show")) {
            fixPlayerOnScrolling();
        }
    });
    function fixPlayerOnScrolling() {
        var h_hght = 125; // висота шапки
        var h_mrg = 0;
        var elem = $('#player');
        var top = $(this).scrollTop();
        var pageWidth = $(".container").width();

        if(top > h_hght){
            $("body").prepend(elem);
            elem.removeClass('player').addClass("topNavFixed");
            elem.find(".row").width(pageWidth).css('margin', '0 auto');
            elem.css('width', '100%');
            elem.css('top', h_mrg);
        } else {
            $(".content").prepend(elem);
            elem.removeClass("topNavFixed").addClass('player');
            elem.removeAttr('style');
        }
    }
});

function togglePlayButton() {
    if (!audio.paused) {
        $("#play").hide();
    } else {
        $("#play").show();
    }
}