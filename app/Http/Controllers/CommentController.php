<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Comment;
use Illuminate\Support\Facades\Auth;




class CommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }


    public function store(Post $post)
    {
    	Comment::create([

    			'comment' => request('comment'),
    			'post_id' => $post->id,
    			'user_id' => Auth::user()->id,
   				'approved' => true

    		]);

    	Session::flash('success', 'new comment has added');

    	return back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $comment = Comment::findOrFail($id);

        return view('comment.edit', compact('comment', 'post'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $this->validate($request, array('comment' => 'required'));

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('posts.show', $comment->post->id);
    }



    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Deleted Comment');

        return redirect()->route('posts.show', $post_id);
    }
}
