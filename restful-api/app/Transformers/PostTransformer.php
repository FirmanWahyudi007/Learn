<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

/**
 * 
 */
class PostTransformer extends TransformerAbstract
{
	
	public function transform(Post $post)
	{
		return [
			'user_id' => $post->user_id,
			'title' => $post->title,
			'thumbnail' => $post->thumbnail,
			'created_at' => $post->created_at->diffForHumans(),
		];
	}
}