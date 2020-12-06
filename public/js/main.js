
$(document).ready(function() {
    var body = $('body');
    var sidebar = $('.sidebar');
    var sidebar_close = $('.sidebar-close');

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
    $('#sidebarToggle').on('click', function() {
        if($(window).width() < 600){
            if(sidebar.hasClass('show')){
                sidebar.animate({width: 'hide'}).removeClass('show');
            }else{
                sidebar.animate({width: 'show'}).addClass('show').removeClass('hidden');
                sidebar_close.addClass('show').removeClass('hidden');
                $('.sidebar-close-button').addClass('show').removeClass('hidden');
            }
        }
    });
    $('.sidebar-close, .sidebar-close-button .button').on('click', function(){
        if($(window).width() < 600){
            if(sidebar.hasClass('show')){
                sidebar.animate({width: 'hide'}).removeClass('show');
                sidebar_close.removeClass('show').addClass('hidden');
                $('.sidebar-close-button').addClass('hidden').removeClass('show');
            }
        }
    });
    $('#extraFieldCheck').on('change', function(){
        var extra_fields = $('.extra-fields');
        if(extra_fields.hasClass('hidden')){
            extra_fields.slideDown(function(){
                extra_fields.removeClass('hidden');
            });
            return;
        }
        extra_fields.slideUp(function(){
            extra_fields.addClass('hidden');
        });
    });
});
