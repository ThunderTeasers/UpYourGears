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
    public function postSearch(Request $request){
        $articles = Article::where('title', 'LIKE', '%'.$request['search'].'%')->paginate(1);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->show = false;

        return view('search', ['articles' => $articles, 'breadcrumbs' => $breadcrumbs]);
    }

    public function getOne($article_slug){
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

        $comments = $article->comments()->get();

        return view('article', ['article' => $article, 'breadcrumbs' => $breadcrumbs, 'comments' => $comments]);
    }

    public function getOneFromCategory($category_slug, $article_slug){
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

        $comments = $article->comments()->get();

        return view('article', ['article' => $article, 'breadcrumbs' => $breadcrumbs, 'comments' => $comments]);
    }
}
