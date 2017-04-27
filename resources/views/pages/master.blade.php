<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>newBlog @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="{{ asset('css/parsley.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css

">
  </head>
  <body style="background-color: #e6e7f2">
    <div class="container-fluid">
    <nav class="navbar navbar-toggleable-md navbar-light bg-info">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">newBlog</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item{{Request::is('/posts') ? 'active' : ""}}">
            <a class="nav-link" href="http://localhost:8000/">Home</a>
          </li>
          <li class="nav-item {{Request::is('/about') ? 'active' : ""}}">
            <a class="nav-link" href="http://localhost:8000/about">About</a>
          </li>
          <li class="nav-item {{Request::is('/contact') ? 'active' : ""}}">
            <a class="nav-link" href="http://localhost:8000/contact">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav float-xs-right">
           <ul class="nav navbar-nav float-xs-right">
        @if(Auth::user())
             <li class="nav-item">
               <a class="nav-link" href="#">Welcome: {{ Auth::user()->name }}</a>
             </li>
             <li class="nav-item"><a class="nav-link" href="{{ route('list_drafts') }}">Drafts</a></li>
             <li class="nav-item">
               <a class="nav-link" href="{{ url('/logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">         Logout</a><form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
             </li>
        @else
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Action
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="http://localhost:8000/login">Login</a>
            <a class="dropdown-item" href="http://localhost:8000/register">Register</a>
          </div>
          </li>
        @endif
      </ul>
  </div>
</nav>
</div>
<br>
<br>
  <div class="container">
  @include('pages._massages')

  @yield('container')
  
  </div>

<br>
<br>

<footer class="blog-footer">
  <div class="container">
    <div class="row">
      <p>Blog template built for <a href="https://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@niki4Him</a>.</p>
      <div class="offset-sm-7">
      <p>
        <a href="#">Back to top</a>
      </p>
      </div>
    </div>
  </div>
</footer>


    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
   <script type="text/javascript" src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    @yield('JScript')
    <script>
          $(document).ready(function(){
            $('.select2-multi').select2();


           }); 
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    @yield('scripts')
  </body>
</html>