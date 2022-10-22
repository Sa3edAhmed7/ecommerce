@extends('front.layout')
@section('content')
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning bg bg-warning tx-white alert-dismissible fade show col-sm-2">
        <i class="fas fa-check-circle"></i>
        <strong>{{ $error }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
            @endforeach
@endif

@if (session()->has('Add'))
    <div class="alert alert-success bg bg-success tx-white alert-dismissible fade show col-sm-2" role="alert">
    <i class="fas fa-check-circle"></i>
    <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger bg bg-danger tx-white alert-dismissible fade show col-sm-2" role="alert">
    <i class="fas fa-check-circle"></i>
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-info bg bg-info tx-white  alert-dismissible fade show col-sm-2" role="alert">
    <i class="fas fa-check-circle"></i>
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

  <!-- row -->
  <div class="row">

<!-- section title -->
<div class="col-md-12">
	<div class="section-title">
		<h3 class="title">New Products</h3>
	</div>
</div>
<!-- /section title -->
<!-- Products tab & slick -->
<div class="col-md-12">
	<div class="row">
		<div class="products-tabs">
			<!-- tab -->
			<div id="tab1" class="tab-pane active">
				<div class="products-slick" data-nav="#slick-nav-1">
    			@foreach ($product as $prod)
					<!-- product -->
					<div class="product">
						<div class="product-img">
							<img src="{{asset($prod->image)}}" alt="">
							<div class="product-label">
								<span class="sale">{{ $prod->offer }}%</span>
								<span class="new">NEW</span>
							</div>
						</div>
						<div class="product-body">
							<p class="product-category">{{$prod->category->name}}</p>
							<h3 class="product-name"><a href="/productdetail/{{ $prod['id'] }}">{{$prod->name}}</a></h3>
							<h4 class="product-price">${{$prod->price}}</h4>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="product-btns">
							<input type="hidden" name="offer" value="{{$prod->offer}}">
							<input type="hidden" name="user_id" value= "{{ Auth::id() }}">
							<input type="hidden" name="price" value="{{$prod->price}}">
							<input type="hidden" name="product_id" value="{{$prod->id}}">
							@foreach ($colors as $color)<input type="hidden" name="color_id" value="{{$color->product_id}}">@endforeach
							<input type="hidden" name="id" value="{{$prod->id}}">
								<button class="add-to-wishlist" type="submit"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							</div>
							</form>
							<form action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data">
                        @csrf
						<div class="input-number" style="width: 30%; margin-left: 80px;">
										<input type="number" name="quantity" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>	
						</div>
						<div class="add-to-cart">
							<input type="hidden" name="offer" value="{{$prod->offer}}">
							<input type="hidden" name="user_id" value= "{{ Auth::id() }}">
							<input type="hidden" name="price" value="{{$prod->price}}">
							<input type="hidden" name="product_id" value="{{$prod->id}}">
							@foreach ($colors as $color)<input type="hidden" name="color_id" value="{{$color->product_id}}">@endforeach
							<input type="hidden" name="id" value="{{$prod->id}}">
							<button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
						</form>
					</div>
					<!-- /product -->
					@endforeach
				</div>
				<div id="slick-nav-1" class="products-slick-nav"></div>
				
			</div>
			
			<!-- /tab -->
		</div>
	</div>
	
</div>

<!-- Products tab & slick -->
</div>

<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->
<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
<div class="col-md-12">
	<div class="hot-deal">
		<ul class="hot-deal-countdown">
			<li>
				<div>
					<h3>02</h3>
					<span>Days</span>
				</div>
			</li>
			<li>
				<div>
					<h3>10</h3>
					<span>Hours</span>
				</div>
			</li>
			<li>
				<div>
					<h3>34</h3>
					<span>Mins</span>
				</div>
			</li>
			<li>
				<div>
					<h3>60</h3>
					<span>Secs</span>
				</div>
			</li>
		</ul>
		<h2 class="text-uppercase">hot deal this week</h2>
		<p>New Collection Up to 50% OFF</p>
		<a class="primary-btn cta-btn" href="{{ route('allproducts.index')}}">Shop now</a>
	</div>
</div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">

<!-- section title -->
<div class="col-md-12">
	<div class="section-title">
		<h3 class="title">Top selling</h3>
	</div>
</div>
<!-- /section title -->
						
<!-- Products tab & slick -->
<div class="col-md-12">
	<div class="row">
		<div class="products-tabs">
			<!-- tab -->
			<div id="tab2" class="tab-pane fade in active">
				<div class="products-slick" style="padding-bottom:90px" data-nav="#slick-nav-2">
				@foreach ($product as $prod)
					<!-- product -->
					<div class="product">
						<div class="product-img">
							<img src="{{asset($prod->image)}}" alt="">
							<div class="product-label">
								<span class="sale">{{ $prod->offer }}%</span>
								<span class="new">NEW</span>
							</div>
						</div>
						<div class="product-body">
							<p class="product-category">{{$prod->category->name}}</p>
							<h3 class="product-name"><a href="/productdetail/{{ $prod['id'] }}">{{$prod->name}}</a></h3>
							<h4 class="product-price">${{$prod->price}}</h4>
							
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							</div>
							<form action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data">
                        @csrf
						
						<div class="input-number" style="width: 30%; margin-left: 80px;">
										<input type="number" name="quantity" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>	
						</div>
						
						<div class="add-to-cart">
							<input type="hidden" name="offer" value="{{$prod->offer}}">
							<input type="hidden" name="user_id" value= "{{ Auth::id() }}">
							<input type="hidden" name="price" value="{{$prod->price}}">
							<input type="hidden" name="product_id" value="{{$prod->id}}">
							<input type="hidden" name="id" value="{{$prod->id}}">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
						</form>
					</div>
					<!-- /product -->
					@endforeach
					
				</div>
				<div id="slick-nav-2" class="products-slick-nav"></div>
			</div>
			<!-- /tab -->
		</div>
	</div>
</div>
<!-- /Products tab & slick -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->
@endsection