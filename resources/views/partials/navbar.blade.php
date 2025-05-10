<nav class="navbar navbar-expand-lg bg-danger navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Web</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ ($active === "Home") ? 'active' : '' }}" href="/">Home</a>
          <a class="nav-link {{ ($active === "About") ? 'active' : '' }}" href="/about">About</a>
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Blog</a>
          <a class="nav-link {{ ($active === "Post Categories") ? 'active' : '' }}" href="/categories">Categories</a>
        </div>
        @auth
        <div class="nav-item dropdown ms-auto">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </div>
        @else   
         <div class="navbar-nav ms-auto">
           <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i>Login</a>
         </div>
        @endauth

      </div>

    </div>
</nav>