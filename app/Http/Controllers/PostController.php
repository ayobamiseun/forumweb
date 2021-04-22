<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Post;
use App\Topic;

class PostController extends Controller
{
    /**
     * Save new post
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'post'      => 'required|string',
            'topic_id'  => 'required|integer'
        ]);

        $user = Auth::user();
        $topic = Topic::find($request->input('topic_id'));

        Post::create([
            'user_id'   => $user->id,
            'topic_id'  => $topic->id,
            'post'      => $request->input('post')
        ]);

        $topic->last_post = Carbon::now();
        $topic->save();

        return redirect()->back()
                ->with('message', 'Post created');
    }
}
