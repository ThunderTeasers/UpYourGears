(function(window){
    'use strict';
    function defineUYG(){
        var uyg = {};

        uyg.getJSON = function(url){
            var request = new XMLHttpRequest(),
                error = "{'message': 'Error load JSON file from " + url + "!'}";
            request.open('GET', url, true);

            request.onload = function(){
                if(request.status >= 200 && request.status < 400){
                    return JSON.parse(request.responseText);
                }else{
                    return error;
                }
            };

            request.onerror = function(){
                return error;
            };

            request.send();
        };

        uyg.fadeIn = function(){

        };

        return uyg;
    }

    if(typeof uyg === 'undefined'){
        window.uyg = defineUYG();
    }
})(window);