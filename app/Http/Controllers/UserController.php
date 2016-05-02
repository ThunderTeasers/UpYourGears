<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    /**
     * Check if user already logged and admin redirect him to dashboard, if regular user to settings page
     * if user are not logged in render login page
     *
     * @return mixed
     */
    public function getLogin(){
        if(Auth::user()){
            if(Auth::user()->isAdmin()){
                return redirect()->route('user.dashboard');
            }else{
                return redirect()->route('user.settings');
            }
        }

        return view('login');
    }

    /**
     * Login user
     *
     * @param Request $request
     * @return mixed
     */
    public function postLogin(Request $request){
        $this->validate($request, [
            'username' => 'required|min:4|max:255',
            'password' => 'required|min:4'
        ]);

        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
            if(Auth::user()->isAdmin()){
                return redirect()->route('user.dashboard');
            }else{
                return redirect()->route('user.settings');
            }
        }
        return redirect()->back();
    }

    /**
     * Logout user
     *
     * @return mixed
     */
    public function getLogout(){
        Auth::logout();

        return redirect()->back();
    }

    /**
     * Just render dashboard
     *
     * @return mixed
     */
    public function getDashboard(){
        return view('dashboard.home');
    }

    /**
     * Just render settings
     *
     * @return mixed
     */
    public function settings(){
        return view('user.index', ['user' => Auth::user()]);
    }

    /**
     * Add comment to article
     *
     * @param Request $request
     * @return mixed
     */
    public function postAddComment(Request $request){
        $comment = new Comment;
        $comment->body = $request['body'];
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $request['article_id'];
        $comment->save();

        return redirect()->back();
    }

    /**
     * Just render registration form
     *
     * @return mixed
     */
    public function getRegistration(){
        $a = rand(1, 10);
        $b = rand(1, 10);

        return view('registration', ['a' => $a, 'b' => $b]);
    }

    /**
     * Register new user
     *
     * @param Request $request
     * @return mixed
     */
    public function postRegistration(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users|max:30|min:4',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:4',
            'password_check' => 'required|min:4|same:password'
        ]);

        if($request['a'] + $request['b'] !== $request['answer']){
            return redirect()->back()->withError('Ошибка регистрации!');
        }

        $user = new User;
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        Auth::login($user);

        return redirect()->back();
    }
}