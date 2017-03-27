@extends('pages.master')

@section('title', '| View Post')

 

@section('container')



		<div class="row">
            <div class="col-sm-8">
              <div class=" card card-block text-xs-center" style="background-color: #17bbed">
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="card-text"><i>  {{ $post->body }} </i></p>
              <div class="card-footer">
              <span class="text-muted" style="font-style: italic;">{{ $post->created_at->diffForHumans() }} / {{ $post->updated_at->diffForHumans() }}</span>
	              <div class="float-right">
		              <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a>
		              <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger btn-sm">Delete</a>
	              </div>
              </div>
              </div>
            </div>

            <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
         </div>










@stop