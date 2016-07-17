<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class ArticleController extends Controller{
    /**
     * Show about page
     *
     * @return View
     */
    public function about(){
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Контакты', '');

        return view('about', compact('breadcrumbs'));
    }

    /**
     * Search data from titles and render it
     *
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request){
        $articles = Article::select('id', 'title', 'description', 'created_at', 'category_id')->where('title', 'LIKE', '%'.$request['search'].'%')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->show = false;

        return view('search', compact('articles', 'breadcrumbs'));
    }

    public function one($article_slug){
        $article = Article::where(['slug' => $article_slug])->first();
        if(!$article){
            App::abort(404);
        }

        $category = $article->category()->first();
        $parent_category = $category->parent();

        $breadcrumbs = new Breadcrumbs;
        if($parent_category){
            $breadcrumbs->add($parent_category->title, '/'.$parent_category->slug);
        }
        $breadcrumbs->add($category->title, ($parent_category ? '/'.$parent_category->slug : '').'/'.$category->slug);
        $breadcrumbs->add($article->title, $article->slug);

        return view('article', compact('article', 'breadcrumbs'));
    }

    public function oneWithCategory($category_slug, $article_slug){
        $article = Article::where(['slug' => $article_slug])->first();
        if(!$article){
            App::abort(404);
        }

        $category = $article->category()->get()->first();
        $parent_category = $category->parent()->get()->first();

        $breadcrumbs = new Breadcrumbs;
        if($parent_category){
            $breadcrumbs->add($parent_category->title, '/'.$parent_category->slug);
        }
        $breadcrumbs->add($category->title, ($parent_category ? '/'.$parent_category->slug : '').'/'.$category->slug);
        $breadcrumbs->add($article->title, $article->slug);

        return view('article', compact('article', 'breadcrumbs'));
    }
}
