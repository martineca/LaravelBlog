<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">UltimatePcBuilds</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			</li>

		
			@if (Auth::check())
			<li class="nav-item">
				<a class="nav-link" href="/admin/addPost">Create Post</a>
			</li>

			<li class="nav-item">
				<a class="nav-link disabled" href="#">{{ Auth::user()->name }}</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/logout">Logout</a>
			</li>

			@else
				<li class="nav-item">
				<a class="nav-link" href="/login">Login</a>
			</li>

			@endif
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>