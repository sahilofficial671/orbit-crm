
$(document).ready(function() {
    var body = $('body');

    if($(window).width() < 600){
        $('#navbarSupportedContent').addClass('hidden');
    }
    if(body.hasClass('app-dark')){
        var tables = $('table');
        tables.each(function(){
            var table = $(this)
            if(!table.hasClass('table-dark')){
                table.addClass('table-dark')
            }
        });
        if(!$('nav').hasClass('navbar-dark')){
            $('nav').addClass('navbar-dark')
        }
    }
    $('nav button.sidebar-toggle').on('click', function() {
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
