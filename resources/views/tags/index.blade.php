@extends('pages.master')

@section('title', '| Create Tags')

 

@section('container')



		<div class="row">
            <div class="col-sm-8">
            
              
              <h2>Tags</h2>

                <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($tags as $tag)
                  <tr>
                    <th>{{$tag->id}}</th>
                    <td><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>

              <div class="col-sm-3">
                  <form data-parsley-validate method="POST" action="{{ route('tags.store') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="form-group">
                          <label>New Tag:</label>
                          <input type="text" class="form-control"  name="name" required="">
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Create</button>
                 </form>

              </div>
          
   </div>










@stop