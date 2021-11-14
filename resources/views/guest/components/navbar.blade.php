<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><button class="btn btn-primary">Homepage</button></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-between collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/posts">View all articles</a>
                </li>
            </ul>
            <div class="nav-item">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            {{-- <button class="btn btn-primary">
                                <a href="{{ url('/home') }}">Home</a>
                            </button> --}}
                        @else
                            <a href="{{ route('login') }}">
                                <button class="btn btn-primary">Login</button>
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">
                                    <button class="btn btn-primary">Register</button>
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
  </nav>