<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Http\Requests;
use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller{
    /**
     * Show all articles with the current tag
     *
     * @param $slug
     * @return View witch display articles with paginate by 5
     */
    public function show($slug){
        $tag = Tag::where('slug', $slug)->first();
        $articles = $tag->articles()->paginate(5);

        foreach($articles as $article){
            $slug = $article->slug;
            $article->slug = "";
            $category = $article->category()->first();
            $parent = $category->parent()->first();
            if($parent){
                $article->slug .= '/'.$parent->slug;
            }
            $article->slug .= '/'.$category->slug.'/'.$slug;
        }

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->show = false;

        return view('tag', compact('tag', 'articles', 'breadcrumbs'));
    }
}