<?php

class VotesController extends BaseController
{
    public function voteUp($id)
    {
        $vote = Vote::where('post_id', '=', $id)->where('voter_id', '=', $_SESSION['userid'])->get()->first();

        if (empty($vote)) {
            $votes = new Vote;
            $votes->post_id = $id;
            $votes->voter_id = $_SESSION['userid'];
            $votes->vote = 'up';
            $votes->save();

            $post= Post::find($id);
            $post->upvote = $post->upvote + 1;

            $post->save();

            return Redirect::action('UsersController@home');
        } elseif ($vote->vote == 'down') {
            $votes = Vote::find($vote->id);
            $votes->vote = 'up';
            $votes->save();

            $post = Post::find($id);
            $post->upvote = $post->upvote + 1;
            $post->downvote = $post->downvote - 1;
            $post->save();

            return Redirect::action('UsersController@home');
        } else {
            return Redirect::action('UsersController@home');
        }
    }

    public function voteDown($id)
    {
        $vote = Vote::where('post_id', '=', $id)->where('voter_id', '=', $_SESSION['userid'])->get()->first();

        if (empty($vote)) {
            $votes = new Vote;
            $votes->post_id = $id;
            $votes->voter_id = $_SESSION['userid'];
            $votes->vote = 'down';
            $votes->save();

            $post= Post::find($id);
            $post->downvote = $post->downvote + 1;

            $post->save();

            return Redirect::action('UsersController@home');
        } elseif ($vote->vote == 'up') {
            $votes = Vote::find($vote->id);
            $votes->vote = 'down';
            $votes->save();

            $post = Post::find($id);
            $post->upvote = $post->upvote - 1;
            $post->downvote = $post->downvote + 1;
            $post->save();

            return Redirect::action('UsersController@home');
        } else {
            return Redirect::action('UsersController@home');
        }
    }
}