//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(document).ready(function() {
    $( ".containerRadio" ).change(function() {
            var checkedRadio = $(this).find("input[type='radio']:checked").val();
            switch (checkedRadio) {
                case "o2":
                    select($("#o2Container"));
                    $("#blauContainer").removeClass("selected");
                    $("#baseContainer").removeClass("selected");
                    break;
                case "Blau":
                    select($("#blauContainer"));
                    $("#o2Container").removeClass("selected");
                    $("#baseContainer").removeClass("selected");
                    break;
                case "Base":
                    select($("#baseContainer"));
                    $("#o2Container").removeClass("selected");
                    $("#blauContainer").removeClass("selected");
                    break;
                default:
            }
    });
});

$(document).ready(function() {
    $( "#checkboxCheckout" ).change(function() {
        var checkoutStep = $(".checkoutStep");
        if($(this).is(":checked")) {
            select(checkoutStep);
        }else {
            checkoutStep.removeClass("selected");
        }
    });
});

function select(obj) {
    if(!obj.hasClass("selected")) {
        obj.addClass("selected");
    }
}
