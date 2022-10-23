@extends('front.layout')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('index')}}">Home</a></li>
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
        <i class="fa fa-check-circle"></i>
        <strong>{{ $error }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
            @endforeach
@endif

@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible" role="alert">
    <i class="fa fa-check-circle"></i>
    <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible" role="alert">
    <i class="fa fa-check-circle"></i>
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-warning alert-dismissible" role="alert">
    <i class="fa fa-check-circle"></i>
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>				
@endif
               
				<div class="wrap-iten-in-cart">
				@php
				$cart_array = cardArray()
				@endphp
				@if( count($cart_array)  > 0)
					<h3 class="box-title">Products Name</h3>
					<h4 style="color:#ff2832;">To Increase The Quantity Of The Product, Click On The Name or Image of The Product</h4>
					@foreach ($cart_array as $add_cart )
					@php
					$images = $add_cart['attributes'][0];
					$images = explode('|',$images);
					$images = $images[0];
					@endphp
					<ul class="products-cart">
						<li class="pr-cart-item">			
							<div class="product-image">
								<a href="/productdetail/{{ $add_cart['id'] }}"><img src="{{asset($images)}}" alt="" width="100px" height="100px"></a>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="/productdetail/{{ $add_cart['id'] }}">{{ $add_cart['name'] }}</a>
								<div class="product-name">
										<h4>{{ $add_cart['quantity'] }}</h4>
								</div>	
							</div>
							<div class="price-field produtc-price"><p class="price">${{ $add_cart['price'] }}</p></div>					
							<div class="delete">
								<a href="{{ url('/delete-cart/'.$add_cart['id']) }}" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</li>			
					</ul>
					@endforeach
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<h3 class="summary-info total-info "><span class="title">Total :</span><b class="index" style="color:#ff2832;"> ${{Cart::getTotal()}}</b></h3>
					</div>
						<a class="btn btn-checkout" style="font-weight: bold;color: #D10024;text-align: right;" href="{{route('checkout.index')}}">Check out</a>
						<a class="btn btn-checkout" style="font-weight: bold;color: #D10024;text-align: right;" href="{{ route('allproducts.index')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
				</div>
				@else
                    <p>No item in cart</p>
                @endif
            </div>
		</div>
    @endsection