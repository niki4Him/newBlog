@extends('pages.master')

@section('title', '| Create New Post')


@section('container')

<h3 style="font-style: italic; color: #112e78; margin-left: 25px;">Create new post</h3>

<div class="container" style="background-color: #cddae6; border-radius: 5px;">
	<br>

	<div class="col-sm-7 offset-sm-3">
		
		<form data-parsley-validate method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
         {{ csrf_field() }}
		  	<div class="form-group">
			    <label>Title:</label>
			    <input type="text" class="form-control" placeholder="Title" name="title" required="" minlength="5">
			</div>
			<div class="form-group">
				<label>Choose category:</label>
				<select class="form-control" name="category_id" required>
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
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
                  <label for="InputFile">Image:</label>
                  <input type="file" name="images" class="form-control-file" id="InputFile" aria-describedby="fileHelp">
            </div>
			<div class="form-group">
			    <label for="exampleTextarea">Body:</label>
			    <textarea class="form-control"  rows="5" placeholder="Put your text here..." name="body"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-info btn-block">Submit</button>
		</form>
	</div>
	<br>
</div>


@stop

@include('pages._scripts')
