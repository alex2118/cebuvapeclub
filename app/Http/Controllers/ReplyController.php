<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //
    public function store(Request $request, $category, $thread)
    {
      $this->validate($request, [
        'category' => 'exists:categories,slug',
        'parent_id' => 'exists:threads,id',
        'content' => 'required'
      ]);

      $category = Category::where('slug', $category);
      $category_id = $category->id;

      $thread = Thread::where('slug', $thread);
      $thread_id = $thread->id;

      $reply = new Thread;
      $reply->user_id = $request->user()->id;
      $reply->category = $request->category_id;
      $reply->parent_id = $thread_id;
      $reply->content = $request->content;
      $reply->slug = null;
    }
}
