@extends('layouts.admin')

@section('title')
    Ads
@endsection

@section('content')

<div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Ads</h4>
                    <div class="card-header-form">
                    @empty($ads)
                    	<a href="{{ route('admin.ads.create') }}" class="btn btn-primary">Create</a>
                    @endempty
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
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                          <th>Title1</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                     
                        <tr>
                          @if($ads)
                          <td>{{ $ads->title1}}</td>
                          <td>
                            <img src="/site/images/posts/{{ $ads->image1 }}" width="200">
                          </td>
                          <td>
                            
                            <a href="{{ route('admin.ads.edit', $ads->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('admin.ads.show', $ads->id) }}" class="btn btn-primary">View</a>
                            <form style="display: inline;" method="POST" action="{{ route('admin.ads.destroy', $ads->id)}}">
                              @csrf
                              @method('DELETE')
                              <input class="btn btn-danger" onclick="return confirm('Confirm {{$ads->title1}} delete')" type="submit" value="Delete">
                            </form>
                          </td>
                          @endif
                        </tr>
                      </tbody></table>
                    </div>
	                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      
                    </nav>
                  </div>
                </div>
              </div>

            </div>

@endsection