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
    public function getHome(){
        $articles = Article::whereIn('category_id', [2, 7, 8, 9, 10])->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(2)->get();
        $news = Article::where('category_id', 3)->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(2)->get();
        $blog = Article::where('category_id', 4)->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->take(2)->get();

        return view('home', ['articles' => $articles, 'news' => $news, 'blog' => $blog]);
    }

    /**
     * Getting parent category with childs and return view with it if it's exist and 404 if not
     *
     * @param $category_slug
     * @return mixed
     */
    public function getParentCategoryForClient($category_slug){
        //Check if category exist and have no parent
        $category = Category::where(['slug' => $category_slug])->first();
        if(!$category){
            App::abort(404);
        }

        //Getting child categories
        $childs = $category->childs()->get();

        //Create breadcrumbs
        $breadcrumbs[] = [
            'title' => $category->title,
            'last' => true
        ];

        return view('categories', ['category' => $category, 'childs' => $childs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Getting category and return view with it if it's exist and 404 if not
     *
     * @param $parent_slug
     * @param $category_slug
     * @return mixed
     */
    public function getCategoryForClient($parent_slug, $category_slug){
        //Check if category exist and have parent
        $category = Category::where(['slug' => $category_slug])->first();

        if(!$category){
            App::abort(404);
        }

        //Getting parent category
        $parent = $category->parent()->first();

        //Getting articles
        $articles = $category->articles()->get();

        //Create breadcrumbs
        $breadcrumbs[] = [
            'title' => $parent->title,
            'url' => $parent_slug,
            'last' => false
        ];
        $breadcrumbs[] = [
            'title' => $category->title,
            'last' => true
        ];

        return view('category', ['parent' => $parent, 'category' => $category, 'articles' => $articles, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Get category by 'id'
     *
     * @param $category_id
     * @return mixed
     */
    public function getCategoryForAdmin($category_id){
        $category = Category::find($category_id);

        $categories = Category::where('id', '!=', $category_id)->get();

        return view('dashboard.category.one', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Create new category
     *
     * @param Request $request
     * @return mixed
     */
    public function postCategoryCreate(Request $request){
        $category = new Category;
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->parent_id = $request['parent_id'];
        $category->slug = $request['slug'];
        $category->meta_title = isset($request['meta_title']) ? $request['meta_title'] : null;
        $category->meta_description = isset($request['meta_description']) ? $request['meta_description'] : null;
        $category->meta_keywords = isset($request['meta_keywords']) ? $request['meta_keywords'] : null;
        $category->save();

        return redirect()->route('dashboard.categories.list');
    }

    /**
     * Delete category by 'id'
     *
     * @param $category_id
     * @return mixed
     */
    public function deleteCategory($category_id){
        $category = Category::find($category_id);
        $category->delete();

        return redirect()->route('dashboard.categories.list');
    }

    /**
     * Update a category
     *
     * @param Request $request
     * @return mixed
     */
    public function postCategoryUpdate(Request $request){
        $category = Category::find($request['id']);
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->parent_id = $request['parent_id'];
        $category->slug = $request['slug'];
        $category->meta_title = isset($request['meta_title']) ? $request['meta_title'] : null;
        $category->meta_description = isset($request['meta_description']) ? $request['meta_description'] : null;
        $category->meta_keywords = isset($request['meta_keywords']) ? $request['meta_keywords'] : null;
        $category->save();

        return redirect()->back();
    }

    /**
     * Get blank page for create category
     *
     * @return mixed
     */
    public function getCategoryCreate(){
        //Get all categories to put it into 'select'
        $categories = Category::all();

        return view('dashboard.category.create', ['categories' => $categories]);
    }

    /**
     * Get all categories
     *
     * @return mixed
     */
    public function getCategoriesForAdmin(){
        $categories = Category::all();

        return view('dashboard.category.list', ['categories' => $categories]);
    }

    /**
     * Render list of news
     *
     * @return mixed
     */
    public function getNews(){
        $category = Category::where(['slug' => 'news'])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Новости', '/news');

        return view('category', ['category' => $category, 'articles' => $articles, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Render list of blog
     *
     * @return mixed
     */
    public function getBlog(){
        $category = Category::where(['slug' => 'blog'])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Блог', '/blog');

        return view('category', ['category' => $category, 'articles' => $articles, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Render list of sites
     *
     * @return mixed
     */
    public function getSites(){
        $category = Category::where(['slug' => 'sites'])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select('id', 'title', 'description', 'created_at', 'slug', 'category_id')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Сайты', '/sites');

        return view('category', ['category' => $category, 'articles' => $articles, 'breadcrumbs' => $breadcrumbs]);
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

        $childs = $category->childs()->get();

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Статьи', '/articles');

        return view('categories', ['category' => $category, 'childs' => $childs, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Render single category with articles
     *
     * @param $category_slug
     * @return mixed
     */
    public function getCategory($category_slug){
        $category = Category::where(['slug' => $category_slug])->first();
        if(!$category){
            App::abort(404);
        }

        $articles = $category->articles()->where('is_published', 1)->select(['id', 'title', 'description', 'category_id', 'created_at', 'slug'])->orderBy('created_at', 'DESC')->paginate(5);

        $parent = $category->parent()->first();

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add($parent->title, '/'.$parent->slug);
        $breadcrumbs->add($category->title, '');

        return view('category', ['category' => $category, 'articles' => $articles, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Render list of programms
     *
     * @return mixed
     */
    public function getPrograms(){
        $category = Category::where(['slug' => 'programs'])->first();
        $childs = $category->childs()->get();

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Программы', '/programs');

        return view('categories', ['category' => $category, 'childs' => $childs, 'breadcrumbs' => $breadcrumbs]);
    }
}
