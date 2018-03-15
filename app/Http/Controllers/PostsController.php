<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * This controller is responsible for handling the posts.
     */

    /**
     * PostsController constructor.
     * Set the correct permissions and handle the authentication.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:65535',
        ]);

        // Save the post with the current user id
        auth()->user()->publish(
            $post = new Post(request(['title', 'body']))
        );

        // Create the post tags
        $this->createPostTags($post);

        session()->flash('message', 'The post is successfully published.');

        return redirect('/posts');
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.showOnePost', compact('post'));
    }

    /**
     * Show the form for editing the post.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the post in storage.
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {
        $post = Post::findOrFail($id);

        $update = $this->validate(request(), [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:65535',
        ]);

        $post->update($update);

        $postTag = new PostTag();

        // Get the current post tags
        $currentPostTags = $postTag->where('post_id', '=', $post->id)
            ->get();

        // Delete the existing tags if any exist
        if (count($currentPostTags)) {
            $postTag->where('post_id', '=', $post->id)
                ->delete();
        }

        // Create the post tags
        $this->createPostTags($post);

        session()->flash('message', 'The post is successfully updated.');

        return redirect("/posts/" . $id);
    }

    /**
     * Remove the post from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        session()->flash('message', 'The post is successfully deleted.');

        return redirect("/posts");
    }

    /**
     * Get the connected tags names for the post.
     *
     * @param $id
     * @return mixed
     */
    public function getConnectedTags($id)
    {
        $tagIdCollection = PostTag::select('tag_id')
            ->where('post_id', '=', $id)
            ->get('tag_id');

        $tags = Tag::select('name')
            ->whereIn('id', $tagIdCollection)
            ->get();

        return $tags;
    }

    /**
     * Create the post tags
     *
     * @param Post $post
     */
    public function createPostTags(Post $post)
    {
        // Create the post tags
        if (!empty(request()->tags)) {

            $tagsList = explode(',', request()->tags);

            // Save each tags
            foreach ($tagsList as $tagName) {

                $tag = Tag::where('name', '=', $tagName)->firstOrFail();

                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id
                ]);

            }
        }
    }

}