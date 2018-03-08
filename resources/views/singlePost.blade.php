@extends ('layout.master')

@section ('content')
<div class="row">
  <div class="col-md-8">
  <!-- Content here -->
  <h1> {{ $post->title}} </h1>
  <hr>
  <img src="{{$post->articleImage}}" class="img-fluid" name="articleImage"/>
  <p> {{$post->content}}</p>


  <hr>
  <div class="comments">
  	<ul class="list-group">
  	@foreach ($post->comments as $comment)
  		<li class="list-group-item">
  			<strong>
  			{{$comment->created_at->diffForHumans()}}
  			</strong>

  			{{$comment->body}}

  		</li>

  	@endforeach
  	</ul>
  </div>


</div>
<div class="col-md-4">

  <!-- Search Widget -->
  <div class="card my-4">
    <h5 class="card-header">Recent posts</h5>
    <div class="card-body">
     @foreach ($articles as $article)
        <!-- Blog Post -->
        <span class="d-block"> {{$post->created_at->toFormattedDateString() }}  </span>
        <a href="post/{{$article -> id }}">{{$article->title}} </a>

        @endforeach
    </div>
  </div>
</div>
</div>
@endsection

