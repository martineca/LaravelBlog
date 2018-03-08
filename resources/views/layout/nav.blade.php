


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href="/">UltimatePcBuilds.com</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.html">About</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="contact.html">Contact</a>
				</li>
				@if (Auth::check())
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ Auth::user()->name }}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/admin/addPost">Write Article</a>
						<a class="dropdown-item" href="/admin/manage">Admin area</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/logout">Logout</a>
					</div>
				</li>
				

				@else
				<li class="nav-item">
					<a class="nav-link" href="/login">Login</a>
				</li>

				@endif
			</ul>
		</div>
	</div>
</nav>

