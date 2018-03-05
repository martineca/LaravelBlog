@extends ('layout.master')

@section ('content')
  <!-- Content here -->
  <!-- Content here -->

  <h1> Welcome to Ultimate Pc Builds. </h1>

  <p> Here is the list of the latest pc builds that we have: </p>

  @foreach ($posts as $post)
  <li> <a href="post/{{$post->id}}"> {{$post->title }}</a></li>
  @endforeach
  
@endsection
