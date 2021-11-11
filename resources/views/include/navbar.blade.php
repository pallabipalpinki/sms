<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/home')}}">Student Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Home</a>
        </li>
        @if( !Auth::guard('student')->check() )
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('student.login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('student.register')}}">Register</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('student.logout')}}">Logout</a>
        </li>
        @endif
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>