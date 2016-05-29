<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Models\Draft;
use App\Http\Requests;

class DraftController extends Controller{
    public function all(){
        $drafts = Draft::select('id', 'title', 'text', 'created_at')->orderBy('created_at', 'DESC')->paginate(5);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Заметки', '');

        return view('drafts', compact('drafts', 'breadcrumbs'));
    }
}