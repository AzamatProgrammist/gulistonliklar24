@extends('layouts.admin')

@section('title')
    Tags
@endsection

@section('content')

<div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tags</h4>
                    <div class="card-header-form">
                    	<a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create</a>
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
                      <table class="table">
                      	<thead>
                      		<tr>
                      			<th>T/R</th>
                      			<th>Name (UZ)</th>
                            <th>Name (RU)</th>
                      			<th>Slug</th>
                      			<th>Action</th>
                      		</tr>
                      	</thead>
                      	<tbody>
                      		@foreach($tags as $tag)
                      		<tr>
                      			<td>{{ $loop->iteration }}</td>
                      			<td>{{ $tag->name_uz }}</td>
                            <td>{{ $tag->name_ru }}</td>
                      			<td>{{ $tag->slug }}</td>
                      			<td>
                      				<a href="#" class="btn btn-info">View</a>
		                            <a href="{{ route('admin.tags.edit', $tag->id)}}" class="btn btn-primary">Edit</a>
		                            <form style="display: inline;" method="POST" action="{{ route('admin.tags.destroy', $tag->id)}}">
		                            @csrf
		                            @method('DELETE')
		                            <input class="btn btn-danger" onclick="return confirm('Confirm {{$tag->name_uz}} delete')" type="submit" value="Delete">
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
