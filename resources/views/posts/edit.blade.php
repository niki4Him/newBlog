@extends('pages.master')

@section('title', '| Edit Blog Post')

 

@section('container')

<h3 style="font-style: italic; color: #112e78; margin-left: 25px;">Edit your Post</h3>

<div class="container" style="background-color: #cddae6; border-radius: 5px;">
	<br>

	<div class="col-sm-6 offset-sm-3">
		
		<form data-parsley-validate method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
		{{ method_field('PUT') }}
         {{ csrf_field() }}
		  	<div class="form-group">
			    <label>Title:</label>
			    <input type="text" class="form-control" placeholder="Title" name="title" required="" minlength="5" value="{{ $post->title }}">
			</div>
			<div class="form-group">
			    <label for="exampleTextarea">Body:</label>
			    <textarea class="form-control"  rows="5" placeholder="Put your text here..." name="body" required="">{{ $post->body }}</textarea>
		  	</div>
		  	<button type="submit" class="btn btn-info">Submit</button>
		  	<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger">Cancel</a>
		</form>
	</div>
	<br>
</div>


@stop
