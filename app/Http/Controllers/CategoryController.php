<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller{
    /**
     * Render home page
     *
     * @return mixed
     */
    public function home(){
        $articles = Article::whereIn('category_id', [2, 7, 8, 9, 10])->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(3)->get();
        $news = Article::where('category_id', 3)->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(3)->get();
        $programs = Article::whereIn('category_id', [12, 13, 14, 15, 16, 17])->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(3)->get();
        $blog = Article::where('category_id', 4)->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(3)->get();

        return view('home', compact('articles', 'news', 'programs', 'blog'));
    }

    /**
     * Render list of news
     *
     * @return mixed
     */
    public function news(){
        $category = Category::where(['slug' => 'news'])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Новости', '');

        return view('category', compact('category', 'articles', 'breadcrumbs'));
    }

    /**
     * Render list of blog
     *
     * @return mixed
     */
    public function blog(){
        $category = Category::where(['slug' => 'blog'])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Блог', '');

        return view('category', compact('category', 'articles', 'breadcrumbs'));
    }

    /**
     * Render list of sites
     *
     * @return mixed
     */
    public function sites(){
        $category = Category::where(['slug' => 'sites'])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Сайты', '');

        return view('category', compact('category', 'articles', 'breadcrumbs'));
    }

    /**
     * Render list of articles
     *
     * @return mixed
     */
    public function getArticles(){
        $category = Category::where(['slug' => 'articles'])->first();
        if(!$category){
            App::abort(404);
        }

        $childs = $category->childs();

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Статьи', '/articles');

        return view('categories', compact('category', 'childs', 'breadcrumbs'));
    }

    /**
     * Render single category with articles
     *
     * @param $category_slug
     * @return mixed
     */
    public function one($category_slug){
        $category = Category::where(['slug' => $category_slug])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select(['id', 'title', 'description', 'category_id', 'created_at', 'slug'])->orderBy('created_at', 'DESC')->paginate(5);

        $parent = $category->parent()->first();

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add($parent->title, '/'.$parent->slug);
        $breadcrumbs->add($category->title, '');

        return view('category', compact('category', 'articles', 'breadcrumbs'));
    }

    /**
     * Render list of programms
     *
     * @return mixed
     */
    public function programs(){
        $category = Category::where(['slug' => 'programs'])->first();
        if(!$category){
            App::abort(404);
        }

        $childs = $category->childs()->get();

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Программы', '');

        return view('categories', compact('category', 'childs', 'breadcrumbs'));
    }
}
