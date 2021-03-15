<?php

namespace App\Transformers;

use App\Models\User;
use App\Transformers\PostTransformer;
use League\Fractal\TransformerAbstract;

/**
 * 
 */
class UserTransformer extends TransformerAbstract
{

	protected $availableIncludes = [
		'posts'
	];
	
	public function transform(User $user)
	{
		return [
			'name' => $user->name,
			'email' => $user->email,
			'registered' => $user->created_at->diffForHumans(),
		];
	}

	public function includePosts(User $user)
	{
		$posts = $user->posts()->LatestFirst()->get();

		return $this->collection($posts, new PostTransformer);
	}
}