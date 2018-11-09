<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="/">My Movie List</a>
    </div>

    {{-- if user is logged in, these become available --}}
    @if (Auth::check())
    <ul class="nav nav-tabs navbar-left">
      <li class="nav-item"><a class="nav-link" href="/search">Search</a></li>
      <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="/friends">Friends</a></li>
      <li class="nav-item"><a class="nav-link" href="/discussion">Discussions</a></li>
      <li class="nav-item"><a class="nav-link" href="https://github.com/FresnoStateCSCI150/MyMovieList">GitHub</a></li>
    </ul>
    <ul class="nav nav-tabs navbar-left">
      <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                                                {{-- ^ will eventually become user dashboard --}}
      <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
    </ul>
    @else
    <ul class="nav nav-tabs navbar-left">
      <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="https://github.com/FresnoStateCSCI150/MyMovieList">GitHub</a></li>
    </ul>
    @endif

  </div>
</nav>
