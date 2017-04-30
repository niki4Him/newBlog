<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use App\Comment;
use Image;  
use Gate;
use App\Http\Requests\UpdaPost as UpdatePostRequest;


class PostController extends Controller
{
    

    public function __construct()
    {
      $this->middleware('auth', ['except' => ['index']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->filter(request(['month', 'year']))->paginate(6);

            
       



        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|max:250',
            'body' => 'required',
            'category_id' => 'required|integer',
            'images' => 'sometimes|image'


            ]);

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post['slug'] = str_slug($post['title']);

        if ($request->hasFile('images')) {

            $images = $request->file('images');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            // $filename = $images->getClientOriginalName();
            //$request->file('images')->move('images', $images2);
            $location = public_path('images/'.$filename);
            Image::make($images)->resize(800, 400)->save($location);
            $post->images = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Your Blog post was successfully save!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    
        return view('posts.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (Auth::user()->id == $post->user_id) {
             $categories = Category::all();

             $tags = Tag::all();


            return view('posts.edit', compact('post','categories', 'tags'));
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' => 'required|max:250',
            'body' => 'required',
            'images' => 'image'


            ]);

       $post = Post::findOrFail($id);

        if (Auth::user()->id == $post->user_id) {
           $post->title = $request->title;
           $post->body = $request->body;
           $post->category_id = $request->category_id;

           if ($request->hasFile('images')) {

            $images = $request->file('images');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            // $filename = $images->getClientOriginalName();
            //$request->file('images')->move('images', $images2);
            $location = public_path('images/'.$filename);
            Image::make($images)->resize(800, 400)->save($location);
            $oldfilename = $post->images;

            $post->images = $filename;
            Storage::delete($oldfilename);

            }

       $post->save();

       if (isset($request->tags)) {
          $post->tags()->sync($request->tags);
       } else {
            $post->tags()->sync(array());
       }
       

        Session::flash('success', 'Your Blog post was successfully update!');
        }
       
       return redirect()->route('posts.show', $post->id);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (Auth::user()->id == $post->user_id) {
        $post->tags()->detach();
        Storage::delete($post->images);
            
            $post->delete();

            Session::flash('success', 'Your Blog post was successfully delete!');

        }
    
        return redirect()->route('posts.index');
    }

    public function drafts()

    {
        $postsQuery = Post::unpublished();
        if (Gate::denies('see-all-drafts')) {
            $postsQuery = $postsQuery->where('user_id', Auth::user()->id);
        }

        $posts = $postsQuery->paginate();
        return view('posts.drafts', compact('posts'));
    }

    public function publish(Post $post)
    {
        $post->published = true;
        $post->save();
        
        return redirect()->route('posts.index');
    }
    

   
}
