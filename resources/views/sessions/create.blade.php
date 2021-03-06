@extends ('layout.master')

@section ('content')

<h1> Login </h1>

<form method="POST" action="/login">
	<!-- security field -->
	{{ csrf_field() }}

	<div class="form-group">
		<label for="email">Email:</label>
		<input type="text"  class="form-control" id="email" name="email" placeholder="Enter your email: " required/>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password"  class="form-control" id="password" name="password" placeholder="Type in password: " required/>
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>


	@include ('layout.formErrors')

	
</form>


@endsection
