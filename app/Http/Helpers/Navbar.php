<?php

namespace App\Helpers;

class Navbar{
    static public function isActive($url, $full){
        if(!$full){
            $uris = explode('/', $_SERVER['REQUEST_URI']);

            foreach($uris as $uri){
                if($uri == $url){
                    return 'active';
                }
            }

            return '';
        }else{
            if(starts_with($_SERVER['REQUEST_URI'], $url)){
                return 'active';
            }else{
                return '';
            }
        }
    }
}