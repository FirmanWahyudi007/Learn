<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Transformers\PostTransformer;
use Auth;

class PostController extends Controller
{
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
}
