<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="/">My Movie List</a>
    </div>

    <ul class="nav nav-tabs navbar-left">
      <li class="active nav-item"><a class="nav-link" href="/">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="/discussion">Discussions</a></li>
      <li class="nav-item"><a class="nav-link" href="https://github.com/FresnoStateCSCI150/MyMovieList">GitHub</a></li>
    </ul>

    {{-- if user is logged in, these become available --}}
    @if (Auth::check())
    <ul class="nav nav-tabs navbar-left">
      <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                                                {{-- ^ will eventually become user dashboard --}}
      <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
    </ul>
    @endif

  </div>
</nav>