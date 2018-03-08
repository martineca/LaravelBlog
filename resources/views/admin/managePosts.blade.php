@extends ('layout.master')

@section ('content')
<!-- Content here -->
<!-- Content here -->

<h1> Admin panel: Manage articles </h1>
@if (count($posts) === 0)
<p> No articles to manage.. Time to write a new one? </p>
@else
<p> All articles: </p>
@endif
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
