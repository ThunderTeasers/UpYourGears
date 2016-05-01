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
        $categories = Category::select(['id', 'title'])->get();
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
        $article->tags()->attach($request['tags']);

        return redirect()->route('dashboard.articles.index');
    }

    /**
     * Show one article(not needed by now, but maybe sometime...)
     *
     * @param $id - of article to find and display
     * @return View - with data of article and possibility to change it
     */
    public function show($id){
        $article = Article::findOrFail($id);
        $categories = Category::select(['id', 'title'])->get();
        $tags = Tag::lists('title', 'id');

        return view('dashboard.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Show one article with ability to edit and save it
     *
     * @param $id - of article to find and display
     * @return View - with data of article and possibility to change it
     */
    public function edit($id){
        $article = Article::findOrFail($id);
        $categories = Category::select(['id', 'title'])->get();
        $tags = Tag::lists('title', 'id');

        return view('dashboard.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update article
     *
     * @param $id - of article to find and update
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request){
        Article::findOrFail($id)->update($request->all());

        return redirect()->back();
    }

    /**
     * Delete one article by 'id'
     *
     * @param $id - of article to find and delete
     * @return mixed
     */
    public function destroy($id){
        Article::findOrFail($id)->delete();

        return redirect()->back();
    }
}