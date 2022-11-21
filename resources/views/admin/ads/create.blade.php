@extends('layouts.admin')

@section('title')
    Create ad
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <form method="POST" action="{{ route('admin.ads.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card">
          <div class="card-header">
            <h4>Create ad</h4>
          </div>
        <div class="card-body">
          <div class="form-group">
            <label>Title1</label>
            <input type="text" name="title1" class="form-control @error('title1') is-invalid @enderror">
            @error('title1')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Image1</label>
            <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror">
             @error('image1')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Url1</label>
            <input type="text" name="ulr1" class="form-control">
          </div>
          <div class="form-group">
            <label>Title2</label>
            <input type="text" name="title2" class="form-control @error('title2') is-invalid @enderror">
            @error('title2')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Image2</label>
            <input type="file" name="image2" class="form-control @error('image2') is-invalid @enderror">
             @error('image2')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Url2</label>
            <input type="text" name="ulr2" class="form-control">
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Save</button>
          </div>
        </div>
      </div>
    </form>
    </div>

@endsection