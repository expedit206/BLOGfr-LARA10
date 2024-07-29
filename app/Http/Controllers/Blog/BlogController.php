<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    
    public function index()
    {
       $posts = Post::latest()->with('user')->paginate(9);
       
        return view('blog/index', compact('posts'));
    }

    public function create()
    {
        return view('blog/create');
    }

    public function store(CreatePostRequest $request)
    {
        // $request->
         // return Post::create($request->validated());
         $path = $request->file('image')->store('post', 'public');
         $post = $request->validated();
         $post['image']=$path;
         $post['user_id']=Auth::user()->id;
         Post::create($post); 

        return redirect()->route('blog.index')->with('ok ', 'Publication ajouté');    
    }

    public function show(Post $post)
    {
        $post = $post->load('user');
        return view('blog.show', compact("post"));
    }
    
        public function edit(Post $post){
            $this->authorize('update', $post);
            return view('blog.edit' , compact('post'));
         }
    
         public function update(UpdatePost $request, POSt $post)
         {
            $this->authorize('update', $post);

             $updated = $request->validated();
            if($request->file('image')){
                Storage::disk('public')->delete($post->image);
                $path = $request->file('image')->store('post', 'public');
                $updated['image']=$path;

            }
    
            $post->update($updated);
             
            return redirect()->route('blog.index')->with('ok', 'Publication modifer');    
    
          }

    public function destroy(Post $post)
    {
        $this->authorize('delete ', $post);

        Storage::disk('public')->delete($post->image);
        $post->delete();
        return redirect()->route('blog.index')->with('ok', 'Publication supprimée');    

    }
}
