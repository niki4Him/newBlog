@extends('pages.master')

@section('title', "| Edit Comment")

 

@section('container')



		<div class="row">
            <div class="col-sm-8">
            <a href="http://localhost:8000/posts" class="btn btn-link" style="font-style: italic; text-decoration: none">Back to posts...</a>
              <div class=" card card-block text-xs-center" style="background-color: #17bbed">
              <span style="font-style: italic;" class="card-text text-muted">created by: {{ $post->user->name }} // category: {{ $post->category['name'] }} </span>
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="card-text"><i>  {{ $post->body }} </i></p>     
              <div class="card-footer">
              <span class="text-muted" style="font-style: italic;">{{ $post->created_at->diffForHumans() }} / update: {{ $post->updated_at->diffForHumans() }}</span>
                @foreach($post->tags as $tag)
                    <span class="badge badge-default">{{$tag->name}}</span>
                @endforeach
              </div>
            </div>
            <br>
            <br>
            
        

        @if(Auth::user())  
         <div class="col-sm-5" style="margin-top: 200px">
          <form  method="POST" action="{{ route('comment.update', $comment->id) }}">
            {{ method_field('PUT') }}
               {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleTextarea">Edit Comment:</label>
                <textarea class="form-control"  rows="5" placeholder="Put your comment here..." name="comment" required="">{{ $comment->comment }}</textarea>
              </div>
              <button type="submit" class="btn btn-info btn-block">Comment</button>
            </form>
          </div>
        </div>
        @endif


          <div class="col-sm-3 offset-sm-1 blog-sidebar">
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