<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller

{

//     public function index()
// {
//     $posts = Post::all();

//     return response()->json($posts);
// }


public function index()
{
    $posts = DB::table('posts')->paginate(10); 

    return response()->json($posts);
}


    public function show(string $id)
    {
        $post = Post::find($id);

        return response()->json($post);
    }

    

    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->save();
        return response()->json($post,201);
    }


    public function update(CreatePostRequest $request,  $id)
    {
        $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->content = $request->input('content');
            $post->save();
            return response()->json($post);
    }

    public function destroy( $id)
    {   
        $post = Post::find($id);
        if($post){
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully']);
        

        }
        else {
            return response()->json(['message' =>"this post not found"]);
        }
     }
}
