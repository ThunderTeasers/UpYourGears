"use strict";

(function(document) {
    var button = document.getElementById("mobile-menu"),
        sidebar = document.getElementById("sidebar");
    button.onclick = function(){
        if(sidebar.className == "open"){
            sidebar.className = "";
        }else{
            sidebar.className = "open";
        }
    }
})(document);