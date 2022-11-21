@extends('layouts.admin')

@section('title')
    Post view
@endsection

@section('css')

@endsection

@section('content')

<div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Post ID {{ $post->id }}</h4>
                    <div class="card-header-form">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                       <tr>
                         <th>Title (UZ)</th><td>{{ $post->title_uz }}</td>
                       </tr>
                       <tr>
                         <th>Title (RU)</th><td>{{ $post->title_ru }}</td>
                       </tr>
                       <tr>
                         <th>Body (UZ)</th><td>{!! $post->body_uz !!}</td>
                       </tr>
                       <tr>
                         <th>Body (RU)</th><td>{!! $post->body_ru !!}</td>
                       </tr>
                       <tr>
                         <th>Category</th><td>{{ $post->category->name_uz }}</td>
                       </tr>
                        <tr>
                         <th>Tags</th><td>@foreach($post->tags as $tag) {{ $tag->name_uz }}, @endforeach</td>
                       </tr>
                       <tr>
                         <th>Image</th><td><img src="/site/images/posts/{{ $post->image }}" width="150"></td>
                       </tr>
                       <tr>
                         <th>Slug</th><td>{{ $post->slug }}</td>
                       </tr>
                       <tr>
                         <th>View</th><td>{{ $post->view }}</td>
                       </tr>
                       <tr>
                         <th>Meta Title</th><td>{{ $post->meta_title }}</td>
                       </tr>
                       <tr>
                         <th>Meta Description</th><td>{{ $post->meta_description }}</td>
                       </tr>
                       <tr>
                         <th>Meta Keywords</th><td>{{ $post->meta_keywords }}</td>
                       </tr>
                      </table>
                    </div>
                      </div>
                  <!-- <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                       
                      </ul>
                    </nav>
                  </div> -->
                </div>
              </div>

            </div>

@endsection

@section('js')

@endsection