
		<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{ url('/') }}" class="logo">
									<img src="{{asset('assets')}}/front/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="/search">
									<select class="input-select">
										<option value="0">All Categories</option>
									</select>
									<input class="input" name="query" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Settings -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-cogs"></i>
										<span>Settings</span>
									</a>
									<div class="cart-dropdown" style="left:0;">
											<div class="product-widget">
												<div class="product-img">
													<img style="border-radius: 50%; margin-top: -8px;" src="{{ URL::asset(Auth::user()->image) }}" >
												</div>
												<div class="product-body">
												<div class="mr-3 my-auto">
								
												
												<h6 style="font-weight:bold; margin-left: 15px; font-size:15px; margin-top: 5px;">{{ Auth::user()->name }}</h6><span style="color:#D10024e6; font-weight:bold; margin-left: -8px;">{{ Auth::user()->email }}</span>
									            
											</div>
											</div>
										</div>
										<div class="cart-btns">
										@if (Auth::user()->type == 'admin')
										@auth
										<a href="{{route('admin')}}">View Profile</a>
										@else
										<a href="#">View Profile</a>
										@endif
										@endif
										@if (Auth::user()->type == 'user')
										@auth
										<a href="{{ url('dashboard/') }}">View Profile</a>
										@else
										<a href="#">View Profile</a>
										@endif
										@endif
											<a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout <i class="fa fa-arrow-circle-right"></i></a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
										</div>
									</div>
								</div>
								<!-- /Settings -->
									<!-- Cart -->
									@php
									$cart_array = cardArray()
									@endphp
									<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?= count($cart_array) ?></div>
									</a>
									
									<div class="cart-dropdown">
										<div class="cart-list">
										@foreach ($cart_array as $add_cart )
										@php
										$images = $add_cart['attributes'][0];
										$images = explode('|',$images);
										$images = $images[0];
										@endphp
											<div class="product-widget">
											<div class="product-img">
											<img src="{{asset($images)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name">{{ $add_cart['name'] }}<a href="#"></a><h4 class="product-price">%{{ $add_cart['offer'] }}<span class="offer"></span></h4></h3>
													<h4 class="product-price">({{ $add_cart['quantity'] }}) ${{ $add_cart['price'] }}</h4>
												</div>
												<a class="delete" href="{{ url('/delete-cart/'.$add_cart['id']) }}"><i class="fa fa-close"></i></a>
											</div>
											
										@endforeach
									</div>
									
										<div class="cart-summary">
											<small><?= count($cart_array) ?>Item(s) selected</small>
											<h5>SUBTOTAL: {{Cart::getTotal()}}</h5>
										</div>
										<div class="cart-btns">
											<a href="/carts">View Cart</a>
											<a href="{{route('checkout.index')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
									
								</div>

								<!-- /Cart -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{ route('index')}}">Home</a></li>
						<li><a href="{{ route('allproducts.index')}}">Products</a></li>
						<li><a href="{{ route('contact-us.index')}}">Contact Us</a></li>
						@foreach($pages as $page)
						<li><a href="{{ route('showpage.show', $page->id) }}">{{ $page->title }}</a></li>
						@endforeach
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
