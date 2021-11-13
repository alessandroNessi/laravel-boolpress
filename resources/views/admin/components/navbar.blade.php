<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('admin.home')}}"><button class="btn btn-primary">Admin's Home</button></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('admin.posts.index')}}">View all posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.posts.create')}}">Add a new post</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>