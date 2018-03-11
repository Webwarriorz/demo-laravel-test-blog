<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * This controller is responsible for handling the comments.
     */

    /**
     * Store a newly created comment in storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required|min:2|max:255'
        ]);

        $post->addComment(request('body'));

        session()->flash('message', 'The comment is successfully created.');

        return back();
    }

    /**
     * Remove the comment from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        session()->flash('message', 'The comment is successfully deleted.');

        return redirect()->back();
    }
}