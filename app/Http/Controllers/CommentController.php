<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function postsStore(StoreCommentRequest $request, $id)
    {
        $post = Post::find($id);
        $post->comments()->create([
            'body' => $request->input('body'),
            'author' => $request->input('author'),
        ]);
        return redirect()->back();
    }

    public function videosStore(StoreCommentRequest $request, $id)
    {
        $video = Video::find($id);
        $video->comments()->create([
            'body' => $request->input('body'),
            'author' => $request->input('author'),
        ]);
        return redirect()->back();
    }

    public function commentDestroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
