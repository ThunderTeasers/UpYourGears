"use strict";

(function(document) {
    var button = document.getElementById("mobile-menu"),
            doc = document.documentElement;
    button.onclick = function(){
        if(doc.className == "open"){
            doc.className = "";
        }else{
            doc.className = "open";
        }
    }
})(document);