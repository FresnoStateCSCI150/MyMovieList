
<! Style Check !>

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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/account"> <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:5px; left:-40px; border-radius:50%"> {{ Auth::user()->name }} </a>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>


      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>      
    </div></li>

<! Logout on nav !>
      <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      </li>
    </ul>
    @else
    <ul class="nav nav-tabs navbar-left">
      <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
      <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="https://github.com/FresnoStateCSCI150/MyMovieList">GitHub</a></li>
    </ul>
    @endif

  </div>
</nav>
