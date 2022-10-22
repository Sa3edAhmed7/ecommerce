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

						@php
						$cart_array = cardArray()
						@endphp
                <div class="wrap-iten-in-cart">
					<h3 class="box-title">Products Name</h3>
					<ul class="products-cart">
					@foreach ($cart_array as $add_cart )
										@php
										$images = $add_cart['attributes'][0];
										$images = explode('|',$images);
										$images = $images[0];
										@endphp
										
						<li class="pr-cart-item">
							<div class="product-image">
								<figure><img src="{{asset($images)}}" height="100px" width="100px" alt=""></figure>
							</div>
							<div class="product-name">
							<a class="link-to-product" style="color:#D10024;">({{ $add_cart['quantity'] }})</a>
								<a class="link-to-product" href="#">{{ $add_cart['name'] }}</a>
								<a class="link-to-product" style="color:#D10024;"></a>
								
							</div>
						
							<div class="price-field sub-total"><p class="price">${{ $add_cart['price'] }}</p></div>
							<div class="delete">
								<a href="{{ url('/delete-cart/'.$add_cart['id']) }}" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>				
						</li>

						@endforeach
															
					</ul>
				</div>
				<a class="primary-btn order-submit" style="margin-left: 30%" href="{{ route('checkout.index') }}">Checkout: ${{Cart::getTotal()}}</a>
             </div>
            </div>
        @endsection


				
							