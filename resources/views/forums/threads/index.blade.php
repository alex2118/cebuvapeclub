@extends('layouts.app')

@section('content')

  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="{{ route('category.index') }}">Forums</a></li>
      <li><a href="{{ url('/forums') }}">{{ $category->title }}</a></li>
      <li class="active">{{ $subcategory->title }}</li>
    </ol>
    @foreach ($threads as $thread)

      <div class="thread-title">
        <h3><a href="{{ route('thread.show', [$thread->category->slug, $thread->slug]) }}">{{ $thread->title }}</a></h3>
        <div class="thread-author">
          <span>By</span> <a href="{{ route('user.profile', $thread->user->username) }}">{{ $thread->user->username }}</a>, <span>{{ $thread->created_at->diffForHumans() }}</span>
        </div>
        {{-- <div class="thread-content">
          <p>{{ str_limit($thread->content, 100, '...') }}</p>
        </div> --}}
      </div>

    @endforeach
    <div class="text-center">
      {!! $threads->links() !!}
    </div>
    <div class="">
      <a href="{{ route('thread.create', $subcategory->slug) }}">Post New Thread</a>
    </div>
  </div>

@endsection
