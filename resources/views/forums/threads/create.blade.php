@extends('layouts.app')

@section('scripts')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea',
      plugins: 'image',
      menubar: false
    });
  </script>
@endsection

@section('content')

  <div class="col-md-8 col-md-offset-2">
    <div class="row">
      <form class="" action="index.html" method="post">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Thread Title">

          @if ($errors->has('title'))
            <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
          <textarea class="form-control" name="content" value="{{ old('content') }}" rows="8" cols="80"></textarea>
          @if ($errors->has('content'))
            <span class="help-block">
              <strong>{{ $errors->first('content') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
          <label for="tags">Tags:</label>
          <select id="tags" class="form-control" name="tags[]" value="{{ old('tags[]') }}" multiple="multiple">
            @foreach ($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('tags'))
            <span class="help-block">
              <strong>{{ $errors->first('tags') }}</strong>
            </span>
          @endif
        </div>
        <button type="submit">Create Thread</button>
      </form>
    </div>
  </div>

@endsection
