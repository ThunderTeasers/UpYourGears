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
     * Show all articles
     *
     * @return View with table witch contains all articles
     */
    public function index(){
        $articles = Article::select(['id', 'title', 'category_id'])->get();

        return view('dashboard.articles.index', compact('articles'));
    }

    /**
     * Show blank inputs for article creation
     *
     * @return View
     */
    public function create(){
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');

        return view('dashboard.articles.create', compact('categories', 'tags'));
    }

    /**
     * Save a new article with data from request
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){
        $article = Article::create($request->all());
        $this->syncTags($article, $request['tag_list']);

        return redirect()->route('dashboard.articles.index');
    }

    /**
     * Show one article(not needed by now, but maybe sometime...)
     *
     * @param Article $article
     * @return View - with data of article and possibility to change it
     */
    public function show(Article $article){
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');

        return view('dashboard.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Show one article with ability to edit and save it
     *
     * @param Article $article
     * @return View - with data of article and possibility to change it
     */
    public function edit(Article $article){
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('title', 'id');

        return view('dashboard.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update article and synchronize tags
     *
     * @param Article $article
     * @param Request $request
     * @return mixed
     */
    public function update(Article $article, Request $request){
        $article->update($request->all());
        $this->syncTags($article, $request['tag_list']);

        return redirect()->back();
    }

    /**
     * Delete one article by 'id'
     *
     * @param Article $article
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Article $article){
        $article->delete();

        return redirect()->back();
    }

    /**
     * Sync up the list of tags in the database
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags){
        $article->tags()->sync($tags);
    }
}