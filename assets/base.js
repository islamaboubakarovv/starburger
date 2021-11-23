$(function(){
    $('.navbar').data('size','big');
});

$(window).scroll(function(){
    if($(document).scrollTop() > 0)
    {
        if($('.navbar').data('size') == 'big')
        {
            $('.navbar').data('size','small');
            $('.navbar-brand img').stop().animate({
                height:'50px'
            },800);
        }
    }
    else
    {
        if($('.navbar').data('size') == 'small')
        {
            $('.navbar').data('size','big');
            $('.navbar-brand img').stop().animate({
                height:'70px'
            },800);
        }
    }
});
