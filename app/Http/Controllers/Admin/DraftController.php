<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Draft;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DraftController extends Controller{
    /**
     * Show all drafts
     *
     * @return View with table witch contains all drafts
     */
    public function index(){
        $drafts = Draft::all();

        return view('dashboard.drafts.index', compact('drafts'));
    }

    /**
     * Show blank inputs for draft creation
     *
     * @return View
     */
    public function create(){
        return view('dashboard.drafts.create');
    }

    /**
     * Save a new draft with data from request
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){
        Draft::create($request->all());

        return redirect()->route('dashboard.drafts.index');
    }

    /**
     * Show one draft(not needed by now, but maybe sometime...)
     *
     * @param Draft $draft
     * @return View - with data of draft and possibility to change it
     */
    public function show(Draft $draft){
        return view('dashboard.drafts.edit', compact('draft'));
    }

    /**
     * Show one draft with ability to edit and save it
     *
     * @param Draft $draft
     * @return View - with data of draft and possibility to change it
     */
    public function edit(Draft $draft){
        return view('dashboard.drafts.edit', compact('draft'));
    }

    /**
     * Update draft
     *
     * @param Draft $draft
     * @param Request $request
     * @return mixed
     */
    public function update(Draft $draft, Request $request){
        $draft->update($request->all());

        return redirect()->back();
    }

    /**
     * Delete one draft by 'id'
     *
     * @param Draft $draft
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Draft $draft){
        $draft->delete();

        return redirect()->back();
    }
}