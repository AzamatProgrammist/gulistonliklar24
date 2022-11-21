@extends('layouts.admin')

@section('title')
    Edit ad
@endsection
@section('css')
  <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('content')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <form method="POST" action="{{ route('admin.ads.update', $ad->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card">
          <div class="card-header">
            <h4>Edit ad</h4>
          </div>
        <div class="card-body">
          <div class="form-group">
            <label>Title1</label>
            <input type="text" value="{{ $ad->title1 }}" name="title1" class="form-control @error('title1') is-invalid @enderror">
            @error('title1')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Title2</label>
            <input type="text" value="{{ $ad->title2 }}" name="title2" class="form-control @error('title2') is-invalid @enderror">
             @error('title2')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Url1</label>
            <textarea name="ulr1" class="form-control @error('ulr1') is-invalid @enderror">{!! $ad->ulr1 !!}</textarea>
            @error('ulr1')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Url2</label>
            <textarea name="ulr2" class="form-control @error('ulr2') is-invalid @enderror">{!! $ad->ulr2 !!}</textarea>
             @error('ulr2')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Image1</label>
            <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror">
            <img src="/site/images/posts/{{ $ad->image1 }}" width="150" alt="image1">
             @error('image1')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Image2</label>
            <input type="file" name="image2" class="form-control @error('image2') is-invalid @enderror">
            <img src="/site/images/posts/{{ $ad->image2 }}" width="150" alt="image2">
             @error('image2')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
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