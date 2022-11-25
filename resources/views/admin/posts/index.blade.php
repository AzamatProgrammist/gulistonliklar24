@extends('layouts.admin')

@section('title')
    Posts
@endsection

@section('css')

  <link rel="stylesheet" href="/admin/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')

<div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Posts</h4>
                    <div class="card-header-form">
                    	<a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    
                  </div>
                  @if(session('success'))
                    <div class="alert alert-success alert-dismissible show fade col-lg-4">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        {{ session('success')}}
                      </div>
                    </div>
                    @endif
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              T/R
                            </th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($posts as $post)
                          <tr>
                            <td>
                              {{ $loop->iteration }}
                            </td>
                            <td>{{ $post->title_uz }}</td>
                            <td class="align-middle">

                              {{ $post->category['name_uz'] }}
                            
                            </td>
                             <td class="align-middle">
                              @foreach($post->tags as $tag){{ $tag->name_uz }}, @endforeach
                            </td>
                            <td class="align-middle">
                              {!! $post->body_uz !!}
                            </td>
                            <td>
                              <img alt="image" src="/site/images/posts/{{ $post->image}}" width="50">
                            </td>
                            <td>
                              <a href="{{ route('admin.posts.show', $post->id )}}" class="btn btn-info">View</a>
                              <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                               <form style="display: inline;" method="POST" action="{{ route('admin.posts.destroy', $post->id)}}">
                              @csrf
                              @method('DELETE')
                              <input class="btn btn-danger" onclick="return confirm('Confirm {{$post->title_uz}} delete')" type="submit" value="Delete">
                            </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
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

  <script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
  <script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="/admin/assets/js/page/datatables.js"></script>
@endsection