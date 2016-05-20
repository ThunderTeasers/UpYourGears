<?php

namespace App\Helpers;

class Breadcrumbs{
    public $show = true;
    private $_breadcrumbs = array();

    /**
     * Add breadcrumb to array
     *
     * @param $text
     * @param $link
     */
    public function add($text, $link){
        $this->_breadcrumbs[$link] = $text;
    }

    /**
     * Generate HTML
     *
     * @return string
     */
    public function generate(){
        if($this->show){
            $output = "<ul class='breadcrumbs clear'><li><a href='/'>Главная</a><span class='divider'>&gt;</span></li>";

            foreach($this->_breadcrumbs as $key => $value){
                $output .= "<li>";
                if($value !== end($this->_breadcrumbs)){
                    $output .= "<a href='{$key}'>{$value}</a>";
                    $output .= "<span class=\"divider\">&gt;</span>";
                }else{
                    $output .= "<span>{$value}</span>";
                }
                $output .= "</li>";
            }

            $output .= "</ul>";

            return $output;
        }else{
            return '';
        }
    }
}