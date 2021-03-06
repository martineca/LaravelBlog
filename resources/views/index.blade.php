@extends ('layout.master')

@section ('content')
<!-- Content here -->


<div class="row">
  <div class="col-md-8">

    <h1 class="my-4">Welcome to Ultimate Pc Builds. 
      <!-- <small>Secondary Text</small> -->
    </h1>
    @if (count($posts) === 0)
    <p> No articles available.. </p>
      @else
        @foreach ($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="{{$post->articleImage }}" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"> {{$post->title }}</h2>
            <p class="card-text">{!!$post -> content!!}</p>
            <a href="post/{{$post -> id }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            {{$post->created_at->toFormattedDateString() }} by
            <a href="#">{{$post->user->name}}</a>
          </div>
        </div>

        @endforeach
    @endif
    

    

    <!-- Pagination 
    <ul class="pagination justify-content-center mb-4">
      <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
      </li>
    </ul>
  -->

</div>
<!-- Sidebar Widgets Column -->
<div class="col-md-4">

  <!-- Search Widget -->
  <div class="card my-4">
    <h4 class="card-header">Search</h4>
    <div class="card-body">
      <form action="/postSearch/search/" class="form-inline my-2 my-lg-0" method="get">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
      </form>
    </div>
  </div>

  <!-- Categories Widget -->
  <div class="card my-4">
    <h4 class="card-header">Categories</h4>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach ($tags as $tag)
            <li>
              <a href="/posts/tags/{{$tag->name}}">{{ $tag->name }}</a>
            </li>
            @endforeach
          </ul>
      </div>
    </div>
  </div>
</div><!-- end of card body -->

    <!-- Side Widget
    <div class="card my-4">
      <h5 class="card-header">Side Widget</h5>
      <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
      </div>
    </div> -->

  </div>

</div>
<!-- /.row -->


@endsection
