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
                addActiveStationStyle();
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
        var logoBlock = $("#playerLogoBlock");
        var top = $(this).scrollTop();
        var pageWidth = $(".container").width();

        if(top > h_hght){
            $("body").prepend(elem);
            elem.removeClass('player').addClass("topNavFixed");
            elem.find(".row").width(pageWidth).css('margin', '0 auto');
            elem.css('width', '100%');
            elem.css('top', h_mrg);
            logoBlock.removeClass('col-md-5').addClass('col-md-2');
            if (logoBlock.parent().children().length < 4) {
                logoBlock.before("<div class='col-md-3'></div>");
            }
            $(".sourceName").hide();
            $(".logoInPlayer").css({'margin-top': 2, 'margin-right': 0});
            if (logoBlock.parent().children().eq(0).children().length == 0) {
                $(".logo").clone().appendTo(logoBlock.parent().children().eq(0));
                $(".topNavFixed .logo").find('.fmka-logo').css('width', '50px');
                $(".topNavFixed .logo a").append("<span class='fmka-fix-player-text'>FMka.in.ua</span>");
            }
        } else {
            $(".content").prepend(elem);
            elem.removeClass("topNavFixed").addClass('player');
            elem.removeAttr('style');
            logoBlock.removeClass('col-md-2').addClass('col-md-5');
            if (logoBlock.parent().children().length >= 4) {
                logoBlock.parent().children().eq(0).detach();
            }
            $(".sourceName").show();
            $(".logoInPlayer").removeAttr('style');
        }
    }

    // Toogle mute volume
    $('.volume-mute').click(function() {
        volumeMute($(this));
    });
    function volumeMute(elem) {
        var src = elem.attr('src');
        if (!audio.muted) {
            audio.muted = true;
            elem.attr('src', src.replace(/\.png/, "-mute.png"));
        } else {
            audio.muted = false;
            elem.attr('src', src.replace(/\-mute\.png/, ".png"));
        }
    }

    // Stop playing radio by click on active station Li
    /*var source = audio.getAttribute('src');
    if (source != null) {
        var activeStationLi = $(".stationsList>ul").find("[data-source='" + source + "']");
        activeStationLi.click(function() {
            removeActiveStationStyle();
            audio.pause();
        });
    }*/

});

function togglePlayButton() {
    if (!audio.paused) {
        $("#play").hide();
        $("#pause").show();
    } else {
        $("#play").show();
        $("#pause").hide();
    }
}

// Add styles for active station
function addActiveStationStyle() {
    removeActiveStationStyle();
    var source = audio.getAttribute('src');
    var activeStationLi = $(".stationsList>ul").find("[data-source='" + source + "']");
    activeStationLi.removeClass('stationLi').addClass('activeStationLi');
}

// Remove active styles for stations
function removeActiveStationStyle() {
    var activeStationLi = $(".activeStationLi");
    activeStationLi.removeClass('activeStationLi').addClass('stationLi');
}