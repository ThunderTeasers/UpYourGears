"use strict";

(function(document){
    Array.prototype.forEach.call(document.querySelectorAll('.spoiler'), function(el, i){
        el.querySelector('.spoiler_head').onclick = function(){
            el.classList.toggle('spoiler-open');
        };
    });
})(document);