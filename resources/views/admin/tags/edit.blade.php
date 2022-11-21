@extends('layouts.admin')

@section('title')
    Edit tag
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <form method="POST" action="{{ route('admin.tags.update', $tag->id )}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card">
          <div class="card-header">
            <h4>Edit tag</h4>
          </div>
        <div class="card-body">
          <div class="form-group">
            <label>Name (UZ)</label>
            <input type="text" value="{{ $tag->name_uz }}" name="name_uz" class="form-control @error('name_uz') is-invalid @enderror">
            @error('name_uz')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="form-group">
            <label>Name (RU)</label>
            <input type="text" value="{{ $tag->name_ru }}" name="name_ru" class="form-control @error('name_ru') is-invalid @enderror">
             @error('name_ru')<div class="invalid-feedback">Oh no! This is invalid.</div>@enderror
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Update</button>
          </div>
        </div>
      </div>
    </form>
    </div>

@endsection


@section('js')

@endsection