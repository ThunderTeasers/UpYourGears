"use strict";

(function (document) {
    function updateScrollbar() {
        var main = document.getElementById('sidebar');

        if (!main.classList.contains('open')) {
            var header = document.getElementById('header'),
                doc = document.documentElement,
                top = doc && doc.scrollTop || document.body.scrollTop;

            if (top > header.offsetHeight) {
                main.className = 'fix';
            } else {
                main.className = '';
            }
        }
    }

    window.addEventListener("scroll", updateScrollbar);
})(document);