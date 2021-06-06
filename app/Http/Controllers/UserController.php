<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function edit(User $user){

        return view('users.edit', compact('user'));

    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email' . $user->id]]);
        $name = $request->get('name');
        $email = $request->get('email');

        $user->name = $name;
        $user->email = $email;
        $user->update();

        return redirect('/posts');
    }

    public function destroy(User $user)
    {
        $post = Post::where('user_id', '=', $user->id);
        $post->delete();
        $user->delete();
        return redirect('/posts');
    }
}
