"use strict";

(function(document){
    document.querySelector('#dropdown').onclick = function(){
        document.querySelector('#menu').classList.toggle('open-menu');
    }
})(document);