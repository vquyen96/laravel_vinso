$(document).ready(function(){
    $('.sectionMain').slideUp();
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        var winHeight = $(window).height();
        for (let i = 0; i < $('section').length ; i++){
            if (scrollTop+winHeight-100 > $('section').eq(i).offset().top){
				setTimeout(function () {
                    $('section').eq(i).find('.sectionMain').slideDown("slow");
                },300)
            }
        }
    });

    $(document).on('click','.welcomeItemNav', function () {
        $(this).attr('class', 'welcomeItemNav active');
        $(this).siblings().attr('class', 'welcomeItemNav');
        var index_this = $(this).index();
        console.log(index_this);
        $('.welcomeItemNavContent').hide();
        $('.welcomeItemNavContent').eq(index_this).show();
    })

});