"use strict";

(function(document){
    Array.prototype.forEach.call(document.querySelectorAll('.spoiler'), function(el, i){
        el.querySelector('.spoiler__head').onclick = function(){
            el.querySelector('.spoiler__body').classList.toggle('spoiler-open');
        };
    });
})(document);