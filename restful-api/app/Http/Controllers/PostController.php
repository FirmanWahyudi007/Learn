<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Transformers\PostTransformer;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        # code...
        $post = Post::all();
        return fractal()
    		->collection($post)
    		->transformWith(new PostTransformer)
    		->toArray('data');
    }
    public function add(Request $request,Post $post)
    {
    	$this->validate($request, [
    		'title' => 'required|min:5',
    		'thumbnail' => 'required',
    		'content' => 'required|min:10'
    	]);

    	$post = $post->create([
    		'user_id' => Auth::user()->id,
    		'title' => $request->title,
    		'thumbnail' => $request->thumbnail,
    		'content' => $request->content,
    	]);

    	$response = fractal()
    		->item($post)
    		->transformWith(new PostTransformer)
    		->toArray();

    	return response()->json($response, 201);
    }

    public function update(Request $request,Post $post)
    {
        $this->authorize('update', $post);

        $post->title = $request->get('title', $post->title);
        $post->thumbnail = $request->get('thumbnail', $post->thumbnail);
        $post->content = $request->get('content', $post->content);
        $post->save();

        return fractal()
            ->item($post)
            ->transformWith(new PostTransformer)
            ->toArray();
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return response()->json([
            'message' => 'Post Deleted',
        ]);
    }
}
