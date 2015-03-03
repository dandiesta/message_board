<?php

class PostsController extends BaseController
{

    public function create()
    {
        if ($_SESSION) {
            return View::make('posts.create');
        } else {
            return Redirect::action('UsersController@home');
        }
    }

    public function saveCreate()
    {
        $input = Input::all();

        $rules = array(
            'title' => 'required',
            'body' => 'required'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {

            $post = new Post;
            $post->title = $input['title'];
            $post->body = $input['body'];
            $post->user_id = $_SESSION['userid'];
            $post->save();

            return Redirect::action('UsersController@home');
        }

        return Redirect::action('PostsController@create');

    }

    public function edit($id)
    {
        $post = Post::find($id);

        if ($_SESSION) {
            if (!empty($post)) {
                if ($post->user_id == $_SESSION['userid']) {
                    return View::make('posts.edit', compact('post'));
                } else {
                    echo "<script type='text/javascript'>alert('Post cannot be edited')</script>";
                    return Redirect::action('UsersController@home');
                }
            } else {
                return Redirect::action('UsersController@home');
            }
        } else {
            return Redirect::action('UsersController@home');
        }
    }

    public function saveEdit()
    {
        $post = Post::findOrFail(Input::get('id'));
        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->save();

        return Redirect::action('UsersController@home');
    }

    public function delete($id)
    {
        $posts = Post::find($id);

        if ($_SESSION) {
            if (!empty($posts)) {
                if ($posts->user_id == $_SESSION['userid']) {
                    $posts->delete();
                    DB::table('comments')->where('post_id', $id)->delete();
                    DB::table('votes')->where('post_id', $id)->delete();

                    return Redirect::action('UsersController@home');
                } else {
                    return Redirect::action('UsersController@home');
                }
            } else {
                return Redirect::action('UsersController@home');
            }
        } else {
            return Redirect::action('UsersController@home');
        }
    }

    public function view($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        $users = User::all();

        return View::make('posts.view', compact('post', 'comments', 'users'));
    }

}