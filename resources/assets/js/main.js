$(document).ready(function() {
    $('.engine-loading').hide();
    $("#button").click( function () {
        $.ajax({
           url: postOrderUrl,
           type: 'POST',
           dataType: 'json',
           data: {
                '_token': _token, 
                'name': $("#inputName").val(), 
                'email': $("#inputEmail").val(), 
                'phone': $("#inputTwitter").val(), 
                'message': $("#txtmessage").val(),
                'carriage_id': $("#carriageID").val(),
            },
           success: function (data) {
                if(data.success) {
                    $('.engine-loading').show();
                    setTimeout(function () {
                        $('.engine-loading').hide(200);
                        window.location = redirectUrl + '/' + data.id;
                    },5000);
                }
           },
           error: function () {

           }
        });
       
       return false;   
    });
});

jQuery(function($) {
    var open = false;
    function resizeMenu() {
        if ($(this).width() < 768) {
            if (!open) {
                $(".block-menu").hide();
            }
            $(".menu-button").show();
        }
    }
 
    function setupMenuButton() {
        $(".menu-button").click(function(e) {
            e.preventDefault();
 
            if (open) {
                $(".block-menu").fadeOut();
                $(".menu-button").toggleClass("selected");
            }
            else {
                $(".block-menu").fadeIn();
                $(".menu-button").toggleClass("selected");
            }
            open = !open;
        });
    }
     
    $(window).resize(resizeMenu);
 
    resizeMenu();
    setupMenuButton();
});

$(document).ready(function(){
   $(window).bind('scroll', function() {
        var slideHeight = $('.slideshow').innerHeight();
        if(slideHeight != null) {
            var navHeight = $( window ).height() - slideHeight - 60;
        }else{
            var navHeight = 67;
        }

        if($(window).scrollTop() > navHeight) {
            $('.block-menu').addClass('fixed');
            $('.block-menu').addClass('animated');
            $('.block-menu').addClass('bounce');
        }else {
            $('.block-menu').removeClass('fixed');
            $('.block-menu').removeClass('animated');
            $('.block-menu').removeClass('bounce');
        }
    });
});

$(document).ready(function(){

    function setHeight() {
        windowHeight = $(window).innerHeight();
        topHeight = $('#top-menu').innerHeight();
        var height = (windowHeight-topHeight);
        $('.slideshow').css('height', height);
    };
    setHeight();
      
    $(window).resize(function() {
        var windowWidth = $(window).innerWidth();
        if(windowWidth >= 996) {
            setHeight();
        } else {
            $('.slideshow').css('height', 'auto');
        }
    });
});