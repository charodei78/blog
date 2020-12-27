<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PostController extends Controller
{
    use WithPagination;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->is_admin)
        {
            $type = 'create';
            $post = new Post();
            return view('edit_post', compact('post', 'type'));
        }
        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->is_admin)
        {
            $post = new Post();
            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('public/post_images');
            }
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->tag = $request->input('tag');
            $post->save();
        }
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $type = 'edit';
        if (Auth::user()->is_admin)
            return view('edit_post', compact('post', 'type'));
        return redirect()->route('index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::user()->is_admin)
        {
            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('public/post_images');
            }
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->tag = $request->input('tag');
            $post->save();
        }
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->is_admin)
            $post->delete();
    }
}
