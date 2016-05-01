<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller{
    /**
     * Show all users
     *
     * @return View with table witch contains all users
     */
    public function index(){
        $users = User::select(['id', 'username'])->get();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show blank inputs for user creation
     *
     * @return View
     */
    public function create(){
        return view('dashboard.users.create');
    }

    /**
     * Save a new user with data from request
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){
        User::create($request->all());

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Show one user(not needed by now, but maybe sometime...)
     *
     * @param User $user
     * @return View - with data of user and possibility to change it
     */
    public function show(User $user){
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Show one user with ability to edit and save it
     *
     * @param User $user
     * @return View - with data of user and possibility to change it
     */
    public function edit(User $user){
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update user
     *
     * @param User $user
     * @param Request $request
     * @return mixed
     */
    public function update(User $user, Request $request){
        $file = $request->file('image');
        if($file){
            $filename = 'profiles/'.$request['username'].'.'.$file->getClientOriginalExtension();
            Storage::disk('uploads')->put($filename, File::get($file));
            $user->image = $filename;
        }

        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->update();

        return redirect()->back();
    }

    /**
     * Delete one user by 'id'
     *
     * @param User $user
     * @return mixed
     * @throws \Exception
     */
    public function destroy(User $user){
        $user->delete();

        return redirect()->back();
    }
}