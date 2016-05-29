"use strict";

(function(document){
    document.body.innerHTML += '<div id="image-holder"><img src=""></div>';
    
    var images = document.querySelectorAll('.fancybox');
    var imageHolder = document.getElementById('image-holder'),
        imageHolder_image = imageHolder.querySelector('img');

    imageHolder.style.display = 'none';

    imageHolder.onclick = function(event){
        imageHolder.style.display = 'none';
        imageHolder_image.setAttribute('src', '');
    };

    Array.prototype.forEach.call(images, function(el, i){
        el.onclick = function(event){
            var href = el.getAttribute('href');

            imageHolder_image.setAttribute('src', href);
            imageHolder_image.style.marginLeft = '-' + imageHolder_image.width / 2 + 'px';
            imageHolder_image.style.marginTop = '-' + imageHolder_image.height / 2 + 'px';
            imageHolder.style.display = '';

            event.preventDefault();
        };
    });

    document.body.onresize = function(event){
        imageHolder_image.height = document.body.offsetHeight;
        imageHolder_image.style.marginLeft = '-' + imageHolder_image.width / 2 + 'px';
        imageHolder_image.style.marginTop = '-' + imageHolder_image.height / 2 + 'px';
    };
})(document);