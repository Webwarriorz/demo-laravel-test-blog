<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * This controller is responsible for handling the tags.
     */

    /**
     * TagsController constructor.
     * Set the correct permissions and handle the authentication.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'showPostsByTag');
    }

    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::latest()
            ->get();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created tag in storage.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2|max:255',
        ]);

        $tag = new Tag();
        $tag->name = request()->name;
        $tag->save();

        session()->flash('message', 'The tag is successfully created.');

        return redirect('/tags');
    }

    /**
     * Show the form for editing the tag.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $tag = Tag::findOrFail($request->id);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the tag in storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {
        $tag = Tag::findOrFail($id);

        $update = $this->validate(request(), [
            'name' => 'required|min:2|max:255',
        ]);

        $tag->update($update);

        session()->flash('message', 'The tag is successfully updated.');

        return redirect("/tags");
    }

    /**
     * Remove the tag from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $tag = tag::findOrFail($id);

        $tag->delete();

        session()->flash('message', 'The tag is successfully deleted.');

        return redirect("/tags");
    }

    /**
     * Display a listing of the tags.
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPostsByTag(Tag $tag)
    {
        $posts = $tag->posts;

        return view('posts.postsByTag', compact('posts', 'tag'));
    }

    /**
     * Get all tags and return in JSON format
     *
     * @return mixed
     */
    public function getAllTags()
    {
        return Tag::latest()
            ->get();
    }

}