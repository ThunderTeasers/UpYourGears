"use strict";

$('.spoiler').each(function(){
    var spoiler = $(this);

    spoiler.find('.spoiler__head').click(function(){
        var body = spoiler.find('.spoiler__body');
        if(spoiler.hasClass('spoiler-open')){
            body.slideUp();
            spoiler.removeClass('spoiler-open');
        }else{
            body.slideDown();
            spoiler.addClass('spoiler-open');
        }
    });
});