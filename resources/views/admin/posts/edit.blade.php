@extends('layouts.admin')

@section('title')
    Edit post
@endsection
@section('css')
  <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('content')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card">
          <div class="card-header">
            <h4>Edit post</h4>
          </div>
        <div class="card-body">
          <div class="form-group">
            <label>Title (UZ)</label>
            <input type="text" value="{{ $post->title_uz }}" name="title_uz" class="form-control @error('title_uz') is-invalid @enderror">
            @error('title_uz')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Title (RU)</label>
            <input type="text" value="{{ $post->title_ru }}" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror">
             @error('title_ru')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Body (UZ)</label>
            <textarea name="body_uz" class="form-control @error('body_uz') is-invalid @enderror">{!! $post->body_uz !!}</textarea>
            @error('body_uz')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Body (RU)</label>
            <textarea name="body_ru" class="form-control @error('body_ru') is-invalid @enderror">{!! $post->body_ru !!}</textarea>
             @error('body_ru')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            <img src="/site/images/posts/{{ $post->image }}" width="150" alt="image">
             @error('image')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Category</label>
            <select name="category_id" id="" class="form-control">
              <option>Select Category</option>
              @foreach($categories as $category)
              <option {{ $post->category_id==$category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name_uz }}</option>
              @endforeach
            </select>
            
          </div>
          <div class="form-group">
            <label>Tags</label>
            <select name="tags[]" id="" class="form-control select2" multiple>
              @foreach($tags as $tag)
              <option @if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif value="{{ $tag->id }}">{{ $tag->name_uz }}</option>
              @endforeach
            </select>
            
          </div>

          <div class="form-group">
            <div class="control-label">is special ?</div>
            <label class="custom-switch mt-2">
              <input type="checkbox" value="1" @if($post->is_special == 1) ? checked : '' @endif name="is_special" class="custom-switch-input">
              <span class="custom-switch-indicator"></span>
            </label>
          </div>

          <div class="form-group">
            <label>Meta title</label>
            <input type="text" value="{{ $post->meta_title }}" name="meta_title" class="form-control">
          </div>
          <div class="form-group">
            <label>Meta Description</label>
            <input type="text" value="{{ $post->meta_description }}" name="meta_description" class="form-control">
          </div>
          <div class="form-group">
            <label>Meta keywords</label>
            <input type="text" value="{{ $post->meta_keywords }}" name="meta_keywords" class="form-control">
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Save</button>
          </div>
        </div>
      </div>
    </form>
    </div>

@endsection

@section('js')

<!-- <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js">
  // online editor ulash usuli
  $('.ckeditor').ckeditor();
</script> -->

<script src="/admin/assets/ckeditor/ckeditor.js">
  /*
  $('.ckeditor').ckeditor();*/
</script>
<script>
  CKEDITOR.replace('body_uz', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
  CKEDITOR.replace('body_ru', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>

@endsection