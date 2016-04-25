<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller{
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

    public function getAll(){
        $articles = Article::all();

        return view('dashboard.article.list', ['articles' => $articles]);
    }

    public function getOneForAdmin($post_id){
        $article = Article::find($post_id);
        $categories = Category::all();

        return view('dashboard.article.one', ['article' => $article, 'categories' => $categories]);
    }

    public function getCreate(){
        $categories = Category::all();

        return view('dashboard.article.create', ['categories' => $categories]);
    }
    
    public function postOneForAdmin(Request $request){
        $article = Article::find($request['id']);
        $article->title = $request['title'];
        $article->description = $request['description'];
        $article->body = $request['body'] ? $request['body'] : null;
        $article->category_id = $request['category_id'];
        $article->created_at = $request['created_at'];
        $article->slug = $request['slug'];
        $article->meta_title = $request['meta_title']? $request['meta_title'] : null;
        $article->meta_description = $request['meta_description'] ? $request['meta_description'] : null;
        $article->meta_keywords = $request['meta_keywords'] ? $request['meta_keywords'] : null;
        $article->save();

        return redirect()->back();
    }

    public function postCreate(Request $request){
        $article = new Article;
        $article->title = $request['title'];
        $article->description = $request['description'];
        $article->body = $request['body'];
        $article->category_id = $request['category_id'];
        $article->created_at = $request['created_at'];
        $article->slug = $request['slug'];
        $article->meta_title = $request['meta_title'];
        $article->meta_description = $request['meta_description'];
        $article->meta_keywords = $request['meta_keywords'];
        $article->save();

        return redirect()->route('dashboard.articles');
    }

    public function deleteOne($article_id){
        $article = Article::find($article_id);
        $article->delete();

        return redirect()->back();
    }
}
