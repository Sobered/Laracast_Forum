<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($channel_id, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required'
        ]);
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back()->with('flash', 'Your reply has been saved.');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);
        $reply->delete();
        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }
        return back();
    }

    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->body = request('body');
        $reply->save();
    }
}
