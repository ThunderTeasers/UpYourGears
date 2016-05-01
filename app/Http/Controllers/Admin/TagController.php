<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\View\View;

class TagController extends Controller{
    /**
     * Show all tags
     *
     * @return View with table witch contains all tags
     */
    public function index(){
        $tags = Tag::select(['id', 'title'])->get();

        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Show blank inputs for tag creation
     *
     * @return View
     */
    public function create(){
        return view('dashboard.tags.create');
    }

    /**
     * Save a new tag with data from request
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){
        Tag::create($request->all());

        return redirect()->route('dashboard.tags.index');
    }

    /**
     * Show one tag(not needed by now, but maybe sometime...)
     *
     * @param Tag $tag
     * @return View - with data of tag and possibility to change it
     */
    public function show(Tag $tag){
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Show one tag with ability to edit and save it
     *
     * @param Tag $tag
     * @return View - with data of tag and possibility to change it
     */
    public function edit(Tag $tag){
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Update tag
     *
     * @param Tag $tag
     * @param Request $request
     * @return mixed
     */
    public function update(Tag $tag, Request $request){
        $tag->update($request->all());

        return redirect()->back();
    }

    /**
     * Delete one tag by 'id'
     *
     * @param Tag $tag
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Tag $tag){
        $tag->delete();

        return redirect()->back();
    }
}