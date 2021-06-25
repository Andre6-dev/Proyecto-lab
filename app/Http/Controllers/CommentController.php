<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CommentNoti;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required:max:250',
        ]);


        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->content =$request->get('content');
        $post = Post::find($request->get('post_id'));

        $user = User::find($post->user->id);
        $user->notify(new CommentNoti($post,$comment)); //del constructor creado en el CommentNoti

        $post->comments()->save($comment);

        return redirect()->route('post',['id' => $request->get('post_id')]);
    }

    public function notify(Request $request)
    {
        $user=$request->user();
        $notify = $user->unreadNotifications;
        return view('/notificaciones', compact('notify'));
    }
}
