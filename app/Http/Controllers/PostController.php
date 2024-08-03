<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\NullableType;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth' , except: ['index','show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(14);  // orderBy('created_at','desc') = latest()
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'MAX:255'],
            'body' => ['required'],
            'image' => ['Nullable','file','max:3000','mimes:png,jpg,webp'] //3000KB
        ]);

        // Store image if exists
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }

        //Create Post
            $post = Auth::user()->posts()->create([
                'title'=>$request->title,
                'image'=>$path,
                'body'=>$request->body,
            ]);

        // // Send Email
        // Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(), $post));

        //redirect
            return back()->with('success','Your post has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show' , [ 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //Authorizing this action
        Gate::authorize('modify' , $post);

        return view('posts.edit', [ 'post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    //Authorizing this action
    Gate::authorize('modify' , $post);

    //Validate
    $request->validate([
        'title' => ['required', 'MAX:255'],
        'body' => ['required'],
        'image' => ['Nullable','file','max:3000','mimes:png,jpg,webp'] //3000KB
    ]);

    $path = $post->image ?? null;

    // Store image if exist
    if($request->hasFile('image')){

        // Delete Post image if exist
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $path = Storage::disk('public')->put('/posts_images' , $request->image);
    }

    //Update Post
    $post->update([
        'title'=>$request->title,
        'image'=>$path,
        'body'=>$request->body
    ]);

    //redirect
    return redirect()->route('dashboard')-> with('update','Your post has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //Authorizing this action
        Gate::authorize('modify' , $post);

        // Delete Post image if exist
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }

        //post deletion
        $post->delete();

        //redirect
        return back()->with('delete','Your post has been deleted');
    }
}
