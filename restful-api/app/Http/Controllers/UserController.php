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
    	$users = $user->all();

    	return fractal()
    		->collection($users)
    		->transformWith(new UserTransformer)
    		->toArray('data');
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

    public function update(Request $request,User $user)
    {
        $user->name = $request->get('name', $user->name);
        $user->email = $request->get('email', $user->email);
        $user->save();

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->toArray();
    }
}
