@extends('pages.master')

@section('title', '| Homepage')


@section('container')
	<div class="blog-header">
      <div class="container">
        <h1 class="blog-title">The Sexiest girls blog</h1>
        <p class="lead blog-description">A very hot and naughty girls looking at you</p>
        <a href="/posts/create" class="btn btn-link" style="margin-left: 45%; font-style: italic; text-decoration: none">Create New Post +</a>
      </div>
    </div>
      <br>
      <br>
    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
          @foreach($posts as $post)
          <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="text-muted blog-post-meta">{{ $post->created_at->diffForHumans() }}<a href="#"></a></p>

            <p>{{ substr($post->body, 0, 50) }}{{strlen($post->body) > 50 ? "..." : ""}}</p>
            
          </div><!-- /.blog-post -->
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{route('posts.show', $post->id)}}">View</a>
            <a class="btn btn-outline-warning" href="{{route('posts.edit', $post->id)}}">Edit</a>
          </nav>
          @endforeach
        </div><!-- /.blog-main -->
          {{$posts->links('vendor.pagination.bootstrap-4')}}
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

    </div><!-- /.container -->


@stop