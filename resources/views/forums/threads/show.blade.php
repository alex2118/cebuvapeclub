@extends('layouts.app')

@section('content')

  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="{{ route('category.index') }}">Forums</a></li>
      <li><a href="{{ url('/forums') }}">{{ $category->title }}</a></li>
      <li><a href="{{ route('thread.index', $subcategory->slug) }}">{{ $subcategory->title }}</a></li>
      <li class="active">{{ str_limit($thread->content, 50) }}</li>
    </ol>
    <div id="thread{{ $thread->id }}" class="thread">
      <div class="thread-title">
        <h3>{{ $thread->title }}</h3>
      </div>
      <div class="thread-content">
        <p>{!! $thread->content !!}</p>
      </div>
      <div class="thread-author">
        <a href="{{ route('user.profile', $thread->user->username) }}">{{ $thread->user }}</a>
      </div>
    </div>

    @if ($replies)

      <ul class="replies">

        @foreach ($replies as $reply)

          <li id="thread{{ $reply->id }}" class="reply">
            <div class="reply-content">
              <p>{{ $reply->content }}</p>
            </div>
          </li>

        @endforeach

      </ul>

    @endif

  </div>
@endsection
