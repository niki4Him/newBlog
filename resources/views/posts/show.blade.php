@extends('pages.master')
<?php $title = htmlspecialchars($post->title); ?>
@section('title', "| $title")

 

@section('container')



		<div class="row">
            <div class="col-sm-8">
            <a href="http://localhost:8000/posts" class="btn btn-link" style="font-style: italic; text-decoration: none">Back to posts...</a>
              <div class=" card card-block text-xs-center" style="background-color: #17bbed">
              <span style="font-style: italic;" class="card-text text-muted">
               @if ($post->images) 
              <img src=" {{ asset('images/'. $post->images) }} " alt="" height="60" width="60">
              @endif
               created by: {{ $post->user['name'] }} // category: {{ $post->category['name'] }} </span>
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="card-text"><i>  {!! $post->body !!} </i></p>     
              <div class="card-footer">
              <span class="text-muted" style="font-style: italic;">{{ $post->created_at->diffForHumans() }} / update: {{ $post->updated_at->diffForHumans() }}</span>
                @foreach($post->tags as $tag)
                    <span class="badge badge-default">{{$tag->name}}</span>
                @endforeach
                 @if(Auth::user()->id == $post->user_id)
	              <div class="float-right">
		              <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a></div>
                   <div class="float-right" style="margin-right: 5px">
                  <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                 {{ method_field('DELETE') }}
                 {{ csrf_field() }} 
		              <button class="btn btn-danger btn-sm">Delete</button>
                  </form>
	              </div>
                @endif
              </div>
            </div>
            <br>
            <br>

        @if ($post->comments->count() > 0 )
            
      <h5><i class="fa fa-comments" aria-hidden="true"></i> {{ $post->comments()->count() }} Comments</h5>

       @else 

        <span style="font-style: italic;">Be the first to reply</span>

       @endif
      
      @foreach($post->comments as $comment)
      <div class="col-sm-8" style="margin-top: 20px;">
          <div class="alert alert-danger" role="alert">
            <h6 class="alert-heading text-muted" style="font-style: italic;">
              By: {{ $comment->user->name }}
              <p class="text-muted float-right">
             {{$comment->created_at->diffForHumans()}}
            </p>
            </h6>

            <hr>
        
            <p>{{ $comment->comment }}</p>
            @if (Auth::User()->id == $comment->user_id)
            <div class="btns">
            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                 {{ method_field('DELETE') }}
                 {{ csrf_field() }} 
                 <button type="submit" class="btn btn-sm btn-danger float-right"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                 </form>
            <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-sm btn-warning float-right" style="margin-right: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </div>
             @endif
             <div class="clearfix"></div>
            
           
          </div>
      </div>
      @endforeach
  
        

        @if(Auth::user())  
         <div class="col-sm-5" style="margin-top: 200px">
          <form  method="POST" action="{{ route('posts.show', $post->id) }}">
               {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleTextarea">Comment:</label>
                <textarea class="form-control"  rows="5" placeholder="Put your comment here..." name="comment" required=""></textarea>
              </div>
              <button type="submit" class="btn btn-info btn-block">Comment</button>
            </form>
          </div>
        </div>
        @endif


          <div class="col-sm-3 offset-sm-1 blog-sidebar" style="margin-top: 110px">
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