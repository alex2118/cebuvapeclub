<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Category;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        $subcategory = Category::where('slug', $category)->first();
        $category = Category::where('id', $subcategory->parent_id)->first();
        $threads = Thread::where('category_id', $subcategory->id)->latest()->paginate(15);

        return view('forums.threads.index', compact(['category', 'subcategory', 'threads']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category)
    {
        $category = Category::where('slug', $category)->first();

        return view('forums.threads.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category)
    {
        //
        $this->validate($request, [
          'category' => 'required|exists:categories,slug',
          'title' => 'required|max:255',
          'content' => 'requried'
        ]);

        $category = Category::where('slug', $category)->first();

        $thread = new Thread;
        $thread->user_id = $request->user()->id;
        $thread->category_id = $category->id;
        $thread->title = $request->title;
        $thread->content = $request->content;

        $thread->save();

        $thread->tags()->sync($request->tags, false);

        return redirect()->route('thread.show', $thread->category->slug, $thread->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($category, $thread)
    {
        $subcategory = Category::where('slug', $category)->first();
        $category = Category::where('id', $subcategory->parent_id)->first();
        $thread = Thread::where('category_id', $subcategory->id)->where('slug', $thread)->first();
        $replies = Thread::where('parent_id', $subcategory->id)->get();

        return view('forums.threads.show', compact(['category', 'subcategory', 'thread', 'replies']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
