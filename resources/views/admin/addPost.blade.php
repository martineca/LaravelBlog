@extends ('layout.master')

@section ('content')
<script src='/js/tinymce/tinymce.min.js'></script>
<script src='/js/tinymce/init.js'></script>

<h1> Write a new article </h1>

<form method="POST" action="/admin/addPost" enctype="multipart/form-data">
	<!-- security field -->
	{{ csrf_field() }}

	<div class="form-group">
		<label for="potTitleLabel">Post title</label>
		<input type="text" class="form-control" id="Title" name="title" placeholder="Enter post title" >
	</div>
	<div class="form-group">
		<label for="postContentLabel">Content</label>
		<textarea class="form-control" id="content" name="content" placeholder="Content"></textarea>
	</div>

	<div class="form-group">
		 <label class="d-block" for="articleImage">Heading image</label>
		 <input type="file" name="image" accept="image/*">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>


	@include ('layout.formErrors')
	
</form>


@endsection
