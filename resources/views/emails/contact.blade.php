@extends('pages.master')

@section('title', '| Contact')


@section('container')

<div class="container">
	<div class="col-sm-5">
		<h2>Sent to new Users</h2>

		<div class="card-block">
			<form action="{{ route('sendMail')}}" method="POST">
			 {{ csrf_field() }}
			 	<button type="submit" class="btn btn-info">Send Mail</button>
			</form>
		</div>
	
	</div>
</div>













@stop