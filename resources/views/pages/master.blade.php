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
            <a class="nav-link" href="http://localhost:8000/posts">Home</a>
          </li>
          <li class="nav-item {{Request::is('/about') ? 'active' : ""}}">
            <a class="nav-link" href="http://localhost:8000/about">About</a>
          </li>
          <li class="nav-item {{Request::is('/contact') ? 'active' : ""}}">
            <a class="nav-link" href="http://localhost:8000/contact">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav float-xs-right">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            my acount
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
          </li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>