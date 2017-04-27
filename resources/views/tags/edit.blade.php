@extends('pages.master')

@section('title', '| Edit Tags')

 

@section('container')



	<div class="row">

              <div class="col-sm-3">
                  <form data-parsley-validate method="POST" action="{{ route('tags.update', $tag->id) }}" enctype="multipart/form-data">
                  {{ method_field('PUT') }}
                       {{ csrf_field() }}
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="name" required=""  value="{{ $tag->name }}">
                    </div>
                    <button class="btn btn-info">Save Changes</button>
                  </form>
              </div>
          
   </div>










@stop