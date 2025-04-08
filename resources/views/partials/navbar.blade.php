<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand fw-bold text-primary" href="/">
      <span style="font-weight: bold;">DO</span><span style="font-style: italic;">THINGS</span>
    </a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar items -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center gap-3">
        @auth
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
              Home
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-outline-dark rounded-3 px-4" type="submit">Log Out</button>
            </form>
          </li>
          <li class="nav-item">
            <img src="{{ Auth::user()->profile_picture_url ?? 'https://via.placeholder.com/40' }}"
                 alt="Profile"
                 class="rounded-circle border border-primary"
                 style="width: 40px; height: 40px; object-fit: cover;">
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
