$(document).ready(function() {
    // Save volume value to cookie
    var savedVolume = $.cookie("volume");
    if (savedVolume) {
        $('#volume').val(savedVolume);
    }

    // Change station on Player
    $(".stationLi").click(function() {
        if ($(this).hasClass("stationLi")) {
            var source = $(this).data('source');
            var name = $(this).attr('data-name');
            var logo = $(this).attr('data-logo');
            playStation(source, logo, name);
        } else if ($(this).hasClass("activeStationLi")) {
            // Stop playing radio by click on active station Li
            removeActiveStationStyle();
            audio.pause();
            togglePlayButton();
        }
        showNextPrevButtons();
    });

    // Play radio station
    function playStation(source, logo, name) {
        if (audio) {
            audio.setAttribute('src', source);
            audio.load();

            // Error checker
            audio.onerror = function() {
                var errorStationLi = $(".stationsList>ul").find("[data-source='" + source + "']");
                errorStationLi.removeClass('activeStationLi').removeClass('stationLi').addClass('errorStation');
            };
            var volume = $('#volume').val();
            audio.volume = parseFloat(volume / 100);
            audio.play();
            $('.sourceName').text(name);
            $('.logoInPlayer').attr('src', '/assets/images/logos/' + logo + '.jpg');
            $('.logoInPlayer').attr('alt', name);

            togglePlayButton();
            addActiveStationStyle();

            // animate top scroll to active station
            var topOffset = 515;
            var screenWidth = $(window).width();
            if (screenWidth > 768 && screenWidth < 991) {
                topOffset = 415;
            } else if (screenWidth > 551 && screenWidth <= 768) {
                topOffset = 315;
            } else if (screenWidth <= 550) {
                topOffset = 250;
            }
            var activeStationLi = $(".stationsList>ul").find("[data-source='" + source + "']");
            $('html, body').animate({
                scrollTop: activeStationLi.offset().top - topOffset
            }, 1000);
        }
    }

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
            $(".content").addClass("mt-75");
            elem.removeClass('player').addClass("topNavFixed");
            elem.find(".row").width(pageWidth).css('margin', '0 auto');
            elem.css('width', '100%');
            elem.css('top', h_mrg);
            logoBlock.removeClass('col-md-4').removeClass('col-sm-4').removeClass('col-xs-4').addClass('col-md-1').addClass('col-sm-2').addClass('col-xs-2');
            if (logoBlock.parent().children().length < 4) {
                logoBlock.before("<div class='col-md-3 col-sm-2 col-xs-2'></div>");
            }
            $(".sourceName").hide();
            $(".logoInPlayer").css({'margin-top': 2, 'margin-right': 0});
            if (logoBlock.parent().children().eq(0).children().length == 0) {
                $(".logo").clone().appendTo(logoBlock.parent().children().eq(0));
                $(".topNavFixed .logo").find('.fmka-logo').css('width', '50px');
                $(".topNavFixed .logo a").append("<span class='fmka-fix-player-text'>FMka.in.ua</span>");
            }
        } else {
            $(".content").removeClass("mt-75").prepend(elem);
            elem.removeClass("topNavFixed").addClass('player');
            elem.removeAttr('style');
            logoBlock.removeClass('col-md-1').removeClass('col-sm-2').removeClass('col-xs-2').addClass('col-md-4').addClass('col-sm-4').addClass('col-xs-4');
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

    // Enabled/Disabled next, prev buttons call
    showNextPrevButtons();

    // Play next station
    $("#next").click(function() {
        var source = audio.getAttribute('src');
        var activeStationLi = $(".stationsList>ul").find("[data-source='" + source + "']");
        playNextStation(activeStationLi);
    });

    // Play previous station
    $("#prev").click(function() {
        var needStationLi = '';
        var source = audio.getAttribute('src');
        var activeStationLi = $(".stationsList>ul").find("[data-source='" + source + "']");
        if(activeStationLi.is(':first-child')) {
            needStationLi = $(".stationsList>ul li").last();
        } else {
            needStationLi = activeStationLi.prev('li');
        }
        var needSource = needStationLi.attr('data-source');
        var needLogo = needStationLi.attr('data-logo');
        var needName = needStationLi.attr('data-name');
        playStation(needSource, needLogo, needName);
    });

    // Play next station function
    function playNextStation(activeStationLi) {
        var needStationLi = '';
        if(activeStationLi.is(':last-child')) {
            needStationLi = $(".stationsList>ul li").first();
        } else {
            needStationLi = activeStationLi.next('li');
        }
        var needSource = needStationLi.attr('data-source');
        var needLogo = needStationLi.attr('data-logo');
        var needName = needStationLi.attr('data-name');
        playStation(needSource, needLogo, needName);
    }

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

// Enabled/Disabled next, prev buttons
function showNextPrevButtons() {
    if (typeof audio !== 'undefined' && audio.paused) {
        $("#prev").prop("disabled", true);
        $("#next").prop("disabled", true);
    } else {
        $("#prev").prop("disabled", false);
        $("#next").prop("disabled", false);
    }
}