@extends ('layout.master')

@section ('content')

<h1> Register </h1>

<form method="POST" action="/register">
	<!-- security field -->
	{{ csrf_field() }}
	<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name: " required>
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="text"  class="form-control" id="email" name="email" placeholder="Enter your email: " required/>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password"  class="form-control" id="password" name="password" placeholder="Type in password: " required/>
	</div>
	<div class="form-group">
		<label for="password">Password confirmation:</label>
		<input type="password"  class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Type in password: " required/>
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>


		@include ('layout.formErrors')

	
	
</form>


@endsection
