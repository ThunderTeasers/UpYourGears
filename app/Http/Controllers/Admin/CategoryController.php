<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller{
    /**
     * Show all categories
     *
     * @return View with table witch contains all categories
     */
    public function index(){
        $categories = Category::select(['id', 'title', 'parent_id'])->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show blank inputs for category creation
     *
     * @return View
     */
    public function create(){
        $parent_categories = Category::lists('title', 'id');
        $parent_categories->prepend('Корневая');

        return view('dashboard.categories.create', compact('parent_categories'));
    }

    /**
     * Save a new category with data from request
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){
        Category::create($request->all());

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Show one category(not needed by now, but maybe sometime...)
     *
     * @param Category $category
     * @return View - with data of category and possibility to change it
     */
    public function show(Category $category){
        $categories = Category::select(['id', 'title'])->get();
        $tags = Tag::lists('title', 'id');

        return view('dashboard.categories.edit', compact('category', 'categories', 'tags'));
    }

    /**
     * Show one category with ability to edit and save it
     *
     * @param Category $category
     * @return View - with data of category and possibility to change it
     */
    public function edit(Category $category){
        $parent_categories = Category::lists('title', 'id');
        $parent_categories->prepend('Корневая');

        return view('dashboard.categories.edit', compact('category', 'parent_categories'));
    }

    /**
     * Update category
     *
     * @param Category $category
     * @param Request $request
     * @return mixed
     */
    public function update(Category $category, Request $request){
        $category->update($request->all());

        return redirect()->back();
    }

    /**
     * Delete one category by 'id'
     *
     * @param Category $category
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Category $category){
        $category->delete();

        return redirect()->back();
    }
}