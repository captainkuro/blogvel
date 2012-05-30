<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Blogvel: Practice Project</title>
	<meta name="viewport" content="width=device-width">

	{{ HTML::style('css/style.css') }}
</head>
<body onload="prettyPrint()">
	<div class="wrapper">
		<header>
			<h1>Blogvel</h1>
			<h2>Practice Project Using Laravel</h2>

			<p class="intro-text">
			</p>
		</header>
		<div role="main" class="main">
			@if (Section::exists('sidebar'))
				<aside class="sidebar">
					@yield('sidebar')
				</aside>
				
				<div class="content">
					@yield('content')
				</div>
			@else
				<div class="content single-column">
					@yield('content')
				</div>
			@endif
		</div>
	</div>
</body>
</html>