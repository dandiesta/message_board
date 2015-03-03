<?php

class UsersController extends BaseController
{

    public function home()
    {
        $users = User::all();
        $posts = Post::paginate(20);
        return View::make('home', compact('users', 'posts'));
    }

    public function login()
    {
        if ($_SESSION) {
            return Redirect::action('UsersController@home');
        } else {
            $invalid = 'none';
            $logout = 'none';
            return View::make('login', compact('invalid', 'logout'));
        }
    }

    public function doLogin()
    {
        $user = User::where('email', '=', Input::get('email'))->where('password', '=', Input::get('password'))->get()->first();
        if (!empty($user->id)) {
            $_SESSION['userid'] = $user->id;
            $user = User::find($_SESSION['userid']);
//            return View::make('home', compact('user'));
          return Redirect::action('UsersController@home');
        }
        $invalid = '';
        $logout = 'none';
        return View::make('login', compact('invalid', 'logout'));

    }

    public function register()
    {
        if ($_SESSION) {
            return Redirect::action('UsersController@home');
        } else {
            return View::make('register');
        }
    }

    public function saveRegistration()
    {
        $data = Input::all();

        $rules = array(
            'password' => 'confirmed',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            $user = new User;
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->save();

            return Redirect::action('UsersController@login');
        }

        return Redirect::action('UsersController@register');
    }

    public function logout()
    {
        if ($_SESSION) {
            session_destroy();
            $invalid = 'none';
            $logout = '';
            return View::make('login', compact('invalid', 'logout'));
        } else{
            Redirect::action('UsersController@login');
        }

    }
}