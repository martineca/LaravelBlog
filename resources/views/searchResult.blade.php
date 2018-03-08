@extends ('layout.master')

@section ('content')
  <!-- Content here -->
  <!-- Content here -->

  <h1> Search result: </h1>

  @foreach ($posts as $post)
  <div class="blog-post">
      <h2 class="blog-post-title">
         <a href="post/{{$post->id}}">
            {{$post->title }}
         </a>
      </h2>
      <p class="blog-post-meta">
          {{$post->created_at->toFormattedDateString() }}
      </p>
      <p>{{$post -> content}}</p>
      

  </div>
  @endforeach

@endsection
