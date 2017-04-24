@extends('pages.master')

@section('title', '| Edit Blog Post')

 

@section('container')

<h3 style="font-style: italic; color: #112e78; margin-left: 25px;">Edit your Post</h3>

<div class="container" style="background-color: #cddae6; border-radius: 5px;">
	<br>

	<div class="col-sm-7 offset-sm-3">
		
		<form data-parsley-validate method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
		{{ method_field('PUT') }}
         {{ csrf_field() }}
		  	<div class="form-group">
			    <label>Title:</label>
			    <input type="text" class="form-control" placeholder="Title" name="title" required="" minlength="5" value="{{ $post->title }}">
			</div>
			<div class="form-group">
				<label>Choose category:</label>
				<select class="form-control" name="category_id" required>
				@foreach($categories as $category)
				@if($category->id == $post->category_id)
                 <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                 @else
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endif
         		@endforeach
				 </select>
			</div> 
			<div class="form-group">
				<label>Tags:</label>
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
				@foreach($tags as $tag)
				<option value="{{$tag->id}}">{{$tag->name}}</option>
				@endforeach
				 </select>
			</div> 
			<div class="form-group">
				@if ($post->images)
				<img src="{{ asset('images/'. $post->images) }}" alt="" height="60" width="60">
				@endif
                  <label for="InputFile">Image</label>
                  <input type="file" name="images" class="form-control-file" id="InputFile" aria-describedby="fileHelp" style="margin-top: 5px" ">
            </div>
			<div class="form-group">
			    <label for="exampleTextarea">Body:</label>
			    <textarea class="form-control"  rows="5" placeholder="Put your text here..." name="body" required="">{{ $post->body }}</textarea>
		  	</div>
		  	<button type="submit" class="btn btn-info">Submit</button>
		  	<a href="{{ route('posts.index') }}" class="btn btn-danger">Cancel</a>
		</form>
	</div>
	<br>
</div>

@stop

@include('pages._javascript')

@include('pages._scripts')
