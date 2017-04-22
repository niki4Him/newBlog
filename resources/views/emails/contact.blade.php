@extends('pages.master')

@section('title', '| Contact')


@section('container')

<div class="container">
	<div class="col-sm-5">
		<h2>You Have a New Contact Via the Contact Form</h2>

		<div class="card-block">
			<div class="card-title">{{ $bodyMessage }}</div>
			<p class="card-text">{{ $email }}</p>
		</div>
	
	</div>
</div>













@stop