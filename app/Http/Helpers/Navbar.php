<?php

namespace App\Helpers;

class Navbar{
    static public function isActive($url){
        $uris = explode('/', $_SERVER['REQUEST_URI']);

        foreach($uris as $uri){
            if($uri == $url){
                return 'active';
            }
        }

        return '';
    }
}