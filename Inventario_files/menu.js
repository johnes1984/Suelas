$(function(){

    $('#view-navbar').click(function() {
        if ($('nav.navbar-inverse').hasClass('hide')) {
            $('nav.navbar-inverse').removeClass('hide');
            $('#content-container > div > #content').removeAttr('style');
        } else {
            $('nav.navbar-inverse').addClass('hide');
            $('#content-container > div > #content').css('margin-left', '0px');
        }
    });

    
});