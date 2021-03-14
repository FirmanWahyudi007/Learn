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
			'id' => $post->id,
			'title' => $post->title,
			'thumbnail' => $post->thumbnail,
			'content' => $post->content,
			'published' => $post->created_at->diffForHumans(),
		];
	}
}