
$(document).load(function(){
    if($(window).width() < 600){
        $('.sidebar').css('display', 'none');
        $('#navbarSupportedContent').addClass('hidden');
    }
});
$(document).ready(function() {

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
