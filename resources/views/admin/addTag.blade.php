@extends ('layout.master')

@section ('content')


<h1>Add new post tag</h1>

<form method="POST" action="/tag/addTag" enctype="multipart/form-data">
	<!-- security field -->
	{{ csrf_field() }}

	<div class="form-group">
		<label for="potTitleLabel">Tag name</label>
		<input type="text" class="form-control" id="Name" name="name" placeholder="Enter tag name" >
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>


	@include ('layout.formErrors')
	
</form>

@endsection
