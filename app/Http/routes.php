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

Route::get('/', 'CategoryController@getHome');
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
    'uses' => 'ArticleController@postSearch',
    'as' => 'search',
    'https' => true
]);


/**
 * Admin group
 */
Route::group(['middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function(){
    Route::resource('dashboard/articles', 'ArticleController');
    Route::resource('dashboard/categories', 'CategoryController');
    Route::resource('dashboard/tags', 'TagController');
    Route::resource('dashboard/users', 'UserController');
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
    'uses' => 'CategoryController@getNews',
    'as' => 'categories.news.list'
]);

/**
 * Get one news article
 */
Route::get('/news/{news_slug}', [
    'uses' => 'ArticleController@getOne',
    'as' => 'article.news.one'
])->where('news_slug', '[A-Za-z0-9-_]+');

/**
 * Get blog
 */
Route::get('/blog', [
    'uses' => 'CategoryController@getBlog',
    'as' => 'categories.blog.list'
]);

/**
 * Get one blog article
 */
Route::get('/blog/{blog_slug}', [
    'uses' => 'ArticleController@getOne',
    'as' => 'article.blog.one'
])->where('blog_slug', '[A-Za-z0-9-_]+');

/**
 * Get sites
 */
Route::get('/sites', [
    'uses' => 'CategoryController@getSites',
    'as' => 'categories.sites.list'
]);

/**
 * Get one sites article
 */
Route::get('/sites/{site_slug}', [
    'uses' => 'ArticleController@getOne',
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
    'uses' => 'CategoryController@getCategory',
    'as' => 'categories.category'
])->where('category_slug', '[A-Za-z0-9-_]+');

/**
 * Get articles articles =\
 */
Route::get('/articles/{category_slug}/{article_slug}', [
    'uses' => 'ArticleController@getOneFromCategory',
    'as' => 'categories.category.article'
])->where('category_slug', '[A-Za-z0-9-_]+', 'article_slug', '[A-Za-z0-9-_]+');

/**
 * Get programms
 */
Route::get('/programs', [
    'uses' => 'CategoryController@getPrograms',
    'as' => 'categories.programs'
]);

/**
 * Get programs category
 */
Route::get('/programs/{category_slug}', [
    'uses' => 'CategoryController@getCategory',
    'as' => 'categories.category'
])->where('category_slug', '[A-Za-z0-9-_]+');

/**
 * Get programs program =\
 */
Route::get('/programs/{category_slug}/{program_slug}', [
    'uses' => 'ArticleController@getOneFromCategory',
    'as' => 'categories.category.program'
])->where('category_slug', '[A-Za-z0-9-_]+', 'program_slug', '[A-Za-z0-9-_]+');