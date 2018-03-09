@extends ('layout.master')

@section ('content')

<h1> Edit Post </h1>


<form method="POST" action="/admin/editPost">
	<!-- security field -->
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$post->id}}"/>
	<div class="form-group">
		<label for="potTitleLabel">Post title</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" value="{{$post->title}}">
	</div>
	<div class="form-group">
		<label for="postContentLabel">Content</label>
		<textarea class="form-control" id="content" name="content" placeholder="Content"> {{$post->content}}</textarea>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>

	@include ('layout.formErrors')
	
</form>
<hr>
<h1> Comments for this post </h1>
 <div class="comments">
  	<ul class="list-group">
  	@foreach ($post->comments as $comment)
  		<li class="list-group-item">
  			<a href="/comment/delete/{{$comment->id}}"> Delete </a>
  			<strong>
  			{{$comment->created_at->diffForHumans()}}
  			</strong>
        by: <i>{{$comment->user->name}}</i>:
  			{{$comment->body}}

  		</li>

  	@endforeach
  	</ul>
  </div>


@endsection
