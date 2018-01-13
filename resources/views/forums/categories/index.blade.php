@extends('layouts.app')

@section('content')

  <div class="col-md-12">

    <ol class="breadcrumb">
      <li class="active">Forums</li>
    </ol>

    <ul class="forums-list">

      @foreach ($categories as $category)

        <li class="forum">
          <div class="row">
            <div id="{{ $category->slug }}" class="forum-head">
              <div class="col-md-12">
                <div class="">
                  <h3 class="forum-title">{{ $category->title }}</h3>
                </div>
              </div>
            </div>
          </div>

          <ul class="subforums-list">
            @foreach ($subcategories as $subcategory)

              <li class="subforum row">

                @if ($category->id === $subcategory->parent_id)

                  <div class="pull-left">
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                  </div>

                  <div class="subforum-heading">
                    <a class="subforum-title" href="{{ route('thread.index', $subcategory->slug) }}">{{ $subcategory->title }}</a>
                    <p class="subforum-description">{{ $subcategory->description }}</p>
                  </div>

                  <div class="latest-post">

                    @foreach ($subcategory->threads as $thread)

                      @if ($loop->last)

                        <div class="">
                          <p class="thread-post-title"><span>Latest: <span><a href="{{ route('thread.show', [$thread->category->slug, $thread->slug]) }}">{{ $thread->title }}</a></p>
                          <p class="thread-post-author"><span>by</span> <a href="{{ route('user.profile', $thread->user->username) }}">{{ $thread->user->username }}</a> <span class="thread-post-date">{{ $thread->created_at->diffForHumans() }}</span></p>
                        </div>

                      @endif

                    @endforeach

                  </div>

                @endif

              </li>

            @endforeach

          </ul>

        </li>

      @endforeach

    </ul>

  </div>

@endsection
