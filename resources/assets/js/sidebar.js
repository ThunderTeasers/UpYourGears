"use strict";

(function(document) {
    window.addEventListener("scroll", updateScrollbar);

    function updateScrollbar() {
        var header = document.getElementById('header'),
            main = document.getElementById('sidebar'),
            doc = document.documentElement,
            top = doc && doc.scrollTop || document.body.scrollTop;

        if (top > header.offsetHeight) {
            main.className = 'fix';
        } else {
            main.className = '';
        }
    }
})(document);