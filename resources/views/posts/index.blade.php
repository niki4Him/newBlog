  @extends('pages.master')

@section('title', '| Homepage')


@section('container')
	<div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Christian's blog</h1>
        <p class="lead blog-description">Here we can discuss any topic</p>
        <a href="/posts/create" class="btn btn-link" style="margin-left: 37%; font-style: italic; text-decoration: none">Create New Post +</a>
        <a href="/tags/" class="btn btn-link" style="font-style: italic; text-decoration: none">Create New Tag +</a>
        <a href="/categories/" class="btn btn-link" style="font-style: italic; text-decoration: none">Create New Category +</a>
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
            <p style="font-style: italic" class="text-muted blog-post-meta">
            @if ($post->images) 
            <img src="{{ asset('images/'. $post->images) }}" alt="" height="60" width="60">
            @endif
              {{ $post->created_at->diffForHumans() }} / created by: {{ $post->user->name }}</p>
            <p>{{ substr(strip_tags($post->body), 0, 300) }}{{strlen(strip_tags($post->body)) > 300 ? "..." : ""}}</p>
            <span class="text-muted">category: {{ $post->category['name'] }}</span>
             @if ($post->comments->count() > 0 )
            <span class="text-muted"> / {{ $post->comments()->count() }} Comment(s)</span>
             @endif
          </div><!-- /.blog-post -->
          <nav class="blog-pagination">
            @if(Auth::check())
            <a class="btn btn-outline-primary" href="{{route('posts.show', $post->id)}}">View</a>
            <a class="btn btn-outline-warning" href="{{route('posts.edit', $post->id)}}">Edit</a>
            @else 
            <a class="btn btn-outline-primary disabled" href="{{route('posts.show', $post->id)}}">View</a>
            <a class="btn btn-outline-warning disabled" href="{{route('posts.edit', $post->id)}}">Edit</a>
            @endif
          </nav>
          <br>
          @endforeach
        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              @foreach($posts as $post)
              <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
              @endforeach
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
        <br>
        <br>
      {{$posts->links('vendor.pagination.bootstrap-4')}}

    </div><!-- /.container -->


@stop