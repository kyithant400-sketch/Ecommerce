<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Minaati is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, admin theme, bootstrap 4, responsive, sass support, ui kits, crm, ecommerce">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Minaati</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    @include('frontend.partials.css')
</head>
<body>
<section class="home-section">
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <img src="{{ asset('frontend/assets/images/logo.svg')}}" class="img-fluid" style="width: 100px;">
            </div>
            <div class="col-6 text-right">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-info">My Account</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-10">
				<div class="py-2">
					<h2 class="mb-1">Welcome! Hello, happy to have you here</h2>
					<p class="mb-2">Shop by Category</p>					
				</div>
			</div>
		</div>
        <section class="widget-section" style="background-image: url('frontend/assets/images/home-bg.jpg');">
		<div class="container">
			<div class="row justify-content-center">
				@yield('content')
			</div>
		</div>
	</section>
	</div>
	
	@include('frontend.partials.footerbar')
	@include('frontend.partials.js')

</body>
</html>