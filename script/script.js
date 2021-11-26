//---------------------슬라이드---------------------
//조작 버튼

$('.prev').click(function(){
    $('.slide li:last').prependTo('.slide');
    $('.slide').css('margin-left', -1600);
    $('.slide').stop().animate({marginLeft:0}, 800)
});
$('.next').click(function(){
    $('.slide').stop().animate({marginLeft:-1600}, 800, function(){
        $('.slide li:first').appendTo('.slide');
        $('.slide').css({marginLeft:0})
    });
});
