<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller{
    /**
     * Create new article by data from request
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){
        Article::create($request->all());

        return redirect('user.dashboard');
    }

    /**
     * Show all articles(latest -> first)
     *
     * @return View with table witch contains all articles
     */
    public function all(){
        $articles = Article::select(['id', 'title', 'category_id', 'created_at'])->get();

        return view('dashboard.article.list', compact('articles'));
    }

    /**
     * Show one article
     *
     * @param $id - of article to find and display
     * @return View - with data of article and possibility to change it
     */
    public function show($id){
        $article = Article::findOrFail($id);
        $categories = Category::select(['id', 'title'])->get();
        $tags = Tag::lists('title', 'id');

        return view('dashboard.article.one', compact('article', 'categories', 'tags'));
    }
}
