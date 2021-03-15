<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Transformers\UserTransformer;
use Auth;

class UserController extends Controller
{
    public function users(User $user)
    {
    	$users = $user->limit(5)->get();

    	return fractal()
    		->collection($users)
    		->transformWith(new UserTransformer)
    		->toArray();
    }

    public function profile(User $user)
    {
        $user = $user->find(Auth::user()->id);

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->includePosts()
            ->toArray();
    }

    public function profileById(User $user,$id)
    {
        $user = $user->find($id);

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->includePosts()
            ->toArray();
    }
}
