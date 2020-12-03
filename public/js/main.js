
$(document).ready(function() {
    if($(window).width() < 600){
        $('#navbarSupportedContent').addClass('hidden');
    }
    $('nav button').on('click', function() {
        var sidebar = $('.sidebar');
        if($(window).width() < 600){
            if(sidebar.hasClass('show')){
                sidebar.animate({width: 'hide'});
                sidebar.removeClass('show');
            }else{
                sidebar.animate({width: 'show'});
                sidebar.addClass('show').removeClass('hidden');
            }
        }
    });
});
