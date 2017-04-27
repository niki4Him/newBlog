@extends('pages.master')

@section('title', '| Create Categories')

 

@section('container')



		<div class="row">
            <div class="col-sm-8">
            
              
              <h2>Category</h2>

                <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>

              <div class="col-sm-3" style="margin-top: 25px;">
                  <form data-parsley-validate method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="form-group">
                          <label>New Category:</label>
                          <input type="text" class="form-control"  name="name" required="">
                        </div>
                        <button type="submit" class="btn btn-info btn-block">New Category</button>
                 </form>

              </div>
          
   </div>










@stop