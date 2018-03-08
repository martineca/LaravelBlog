@extends ('layout.master')

@section ('content')
<!-- Content here -->
<!-- Content here -->

<h1> Admin panel: Manage posts </h1>

<p> All active posts: </p>
<hr>
@foreach ($posts as $post)
<div class="blog-post">
	<h2 class="blog-post-title">

		{{$post->title }}
		<a href='/admin/editPost/{{$post->id}}'> edit </a>
		<a href='/admin/delete/{{$post->id}}'> delete </a>
	</h2>

</div>
@endforeach

@endsection
