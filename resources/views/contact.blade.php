@extends('pages.master')

@section('title', '| Contact')


@section('container')

<div class="container">

	<div class="col-sm-4 offset-sm-2">
		
		<form>
		  	<div class="form-group">
			    <label>Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			</div>
			<div class="form-group">
			    <label>Subject</label>
			    <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" placeholder="Subject">
			</div>
			<div class="form-group">
			    <label for="exampleTextarea">Example textarea</label>
			    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-info">Submit</button>
		</form>
	</div>
</div>













@stop