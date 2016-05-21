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
            $output = "<ul class='breadcrumbs clear' itemscope itemtype='http://schema.org/BreadcrumbList'><li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemprop='item' href='/'><span itemprop='name'>Главная</span><meta itemprop='position' content='1'></a><span class='divider'>&gt;</span></li>";

            $position = 2;
            foreach($this->_breadcrumbs as $key => $value){
                $output .= "<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>";
                if($value !== end($this->_breadcrumbs)){
                    $output .= "<a itemprop='item' href='{$key}'><span itemprop='name'>{$value}</span></a>";
                    $output .= "<meta itemprop='position' content='{$position}'>";
                    $output .= "<span class='divider'>&gt;</span>";
                }else{
                    $output .= "<span itemprop='item'><span itemprop='name'>{$value}</span></span>";
                    $output .= "<meta itemprop='position' content='{$position}'>";
                }
                $output .= "</li>";

                $position++;
            }

            $output .= "</ul>";

            return $output;
        }else{
            return '';
        }
    }
}