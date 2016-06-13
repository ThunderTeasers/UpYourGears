<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Redirects
 */
Route::get('/programs/drweb-cureit', function(){
    return Redirect::to('/');
});

Route::get('/programs/keepass-2', function(){
    return Redirect::to('/');
});

Route::get('/programs/unlocker', function(){
    return Redirect::to('/');
});

Route::get('/.well-known/apple-app-site-association', function(){
    return Redirect::to('/');
});

Route::get('/apple-app-site-association', function(){
    return Redirect::to('/');
});

Route::get('/tags/{anything}', function(){
    return Redirect::to('/');
});

/**
 * Home and other simple stuff
 */
Route::get('/', 'CategoryController@home');
Route::get('/about', [
    'uses' => 'ArticleController@about',
    'as' => 'about'
]);

Route::get('/login', [
    'uses' => 'UserController@getLogin',
    'as' => 'user.login'
]);

Route::post('/login', 'UserController@postLogin');

Route::get('/registration', [
    'uses' => 'UserController@getRegistration',
    'as' => 'user.registration'
]);

Route::post('/registration', 'UserController@postRegistration');

Route::post('/search', [
    'uses' => 'ArticleController@search',
    'as' => 'search'
]);


/**
 * Admin group
 */
Route::group(['middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function(){
    Route::resource('dashboard/articles', 'ArticleController');
    Route::resource('dashboard/categories', 'CategoryController');
    Route::resource('dashboard/tags', 'TagController');
    Route::resource('dashboard/users', 'UserController');
    Route::resource('dashboard/drafts', 'DraftController');
});

/**
 * Admin group
 */
Route::group(['middleware' => ['auth', 'admin']], function(){
    /**
     * Just getting dashboard
     */
    Route::get('/dashboard', [
        'uses' => 'UserController@getDashboard',
        'as' => 'user.dashboard'
    ]);

    /**
     * Logout user
     */
    Route::get('/dashboard/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
});

/**
 * User settings panel
 */
Route::group(['middleware' => ['auth']], function(){
    /**
     * User settings
     */
    Route::get('/user', [
        'uses' => 'UserController@settings',
        'as' => 'user.index'
    ]);

    /**
     * Logout user
     */
    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);

    Route::post('/add-comment', [
        'uses' => 'UserController@postAddComment',
        'as' => 'user.add-comment'
    ]);
});

/**
 * Get list of articles with tag
 */
Route::get('/tag/{slug}', [
    'uses' => 'TagController@show',
    'as' => 'tag.show'
])->where('slug', '[A-Za-z0-9]+');

/**
 * Get news
 */
Route::get('/news', [
    'uses' => 'CategoryController@news',
    'as' => 'categories.news.list'
]);

/**
 * Get one news article
 */
Route::get('/news/{news_slug}', [
    'uses' => 'ArticleController@one',
    'as' => 'article.news.one'
])->where('news_slug', '[A-Za-z0-9-_]+');

/**
 * Get blog
 */
Route::get('/blog', [
    'uses' => 'CategoryController@blog',
    'as' => 'categories.blog.list'
]);

/**
 * Get one blog article
 */
Route::get('/blog/{blog_slug}', [
    'uses' => 'ArticleController@one',
    'as' => 'article.blog.one'
])->where('blog_slug', '[A-Za-z0-9-_]+');

/**
 * Get sites
 */
Route::get('/sites', [
    'uses' => 'CategoryController@sites',
    'as' => 'categories.sites.list'
]);

/**
 * Get one sites article
 */
Route::get('/sites/{site_slug}', [
    'uses' => 'ArticleController@one',
    'as' => 'article.sites.one'
])->where('site_slug', '[A-Za-z0-9-_]+');

/**
 * Get articles
 */
Route::get('/articles', [
    'uses' => 'CategoryController@getArticles',
    'as' => 'categories.articles'
]);

/**
 * Get articles category
 */
Route::get('/articles/{category_slug}', [
    'uses' => 'CategoryController@one',
    'as' => 'categories.category'
])->where('category_slug', '[A-Za-z0-9-_]+');

/**
 * Get articles articles =\
 */
Route::get('/articles/{category_slug}/{article_slug}', [
    'uses' => 'ArticleController@oneWithCategory',
    'as' => 'categories.category.article'
])->where('category_slug', '[A-Za-z0-9-_]+', 'article_slug', '[A-Za-z0-9-_]+');

/**
 * Get drafts
 */
Route::get('/drafts', [
    'uses' => 'DraftController@all',
    'as' => 'drafts.all'
]);

/**
 * Get programms
 */
Route::get('/programs', [
    'uses' => 'CategoryController@programs',
    'as' => 'categories.programs'
]);

/**
 * Get programs category
 */
Route::get('/programs/{category_slug}', [
    'uses' => 'CategoryController@one',
    'as' => 'categories.category'
])->where('category_slug', '[A-Za-z0-9-_]+');

/**
 * Get programs program =\
 */
Route::get('/programs/{category_slug}/{program_slug}', [
    'uses' => 'ArticleController@oneWithCategory',
    'as' => 'categories.category.program'
])->where('category_slug', '[A-Za-z0-9-_]+', 'program_slug', '[A-Za-z0-9-_]+');