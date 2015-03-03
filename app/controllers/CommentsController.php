<?php

class CommentsController extends BaseController
{
    public function saveComment()
    {
        $input = Input::all();

        $rules = array(
            'body' => 'required'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {

            $comment = new Comment;
            $comment->post_id = $input['id'];
            $comment->commentor_id = $_SESSION['userid'];
            $comment->body = $input['body'];
            $comment->save();

            return Redirect::action('PostsController@view', $input['id']);
        }

        return Redirect::action('PostsController@view');
    }
}