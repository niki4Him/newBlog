@extends('pages.master')

@section('title', '| $tag->name Tag')

 

@section('container')



		<div class="row">
            <div class="col-sm-8">
            
              
              <h2>{{ $tag->name }} Tag / <small>{{ $tag->posts()->count() }} Posts</small></h2>


              </div>
          
   </div>

    <div class="row">
      <div class="col-sm-12">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Tags</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach ($tag->posts as $post)
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>@foreach ($post->tags as $tag)

            <span class="badge badge-default">{{ $tag->name }}</span>
            @endforeach
            </td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a></td>
            <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm"> Edit </a></td>
            <td>
              <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                 {{ method_field('DELETE') }}
                 {{ csrf_field() }} 
                 <button class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>








@stop