@extends('layouts.admin')

@section('title')
    Ad view
@endsection

@section('css')

@endsection

@section('content')

<div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Ad ID {{ $ad->id }}</h4>
                    <div class="card-header-form">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                       <tr>
                         <th>Title1</th><td>{{ $ad->title1 }}</td>
                       </tr>
                       <tr>
                         <th>Title2</th><td>{{ $ad->title2 }}</td>
                       </tr>
                       <tr>
                         <th>Url1</th><td>{{ $ad->url1 }}</td>
                       </tr>
                       <tr>
                         <th>Url2</th><td>{{ $ad->url2 }}</td>
                       </tr>
                       
                       <tr>
                         <th>Image1</th><td><img src="/site/images/posts/{{ $ad->image1 }}" width="150"></td>
                       </tr>
                       <tr>
                         <th>Image2</th><td><img src="/site/images/posts/{{ $ad->image2 }}" width="150"></td>
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