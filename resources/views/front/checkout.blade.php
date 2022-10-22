@extends('front.layout')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('index')}}">Home</a></li>
							<li class="active">Checkout</li>
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
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">CHECKOUT Details</h3>
							</div>
							<form action="{{ route('checkout.store') }}" method="POST" name="frm-contact" enctype="multipart/form-data">
                                @csrf
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
								
							<div class="form-group">
										<input class="input" type="text" name="name" placeholder="Name">
									</div>
							<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
							<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
							<div class="form-group">
										<input class="input" type="text" name="phone" placeholder="Phone">
									</div>
						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes" name="notes"></textarea>
						</div>
						
						<!-- /Order notes -->
						</div>
						<!-- /Billing Details -->
					</div>
						
					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						@php
						$cart_array = cardArray()
						@endphp
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>				
								<div><strong>Name</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
						    @foreach ($cart_array as $add_cart )
										@php
										$images = $add_cart['attributes'][0];
										$images = explode('|',$images);
										$images = $images[0];
										@endphp
							<div class="order-products">
									
								<div class="order-col">
								<div><img src="{{asset($images)}}" height="100px" width="100px" alt=""><a class="delete" href="{{ url('/delete-cart/'.$add_cart['id']) }}"><i class="fa fa-close"></i></a></div>
									<div>
									{{ $add_cart['name'] }}
									</div>
									<div style="font-weight: bold;color: #D10024;text-align: right;">
									${{ $add_cart['price'] }}
									</div>
									<input type="hidden" name="offer" value="0" />
									<input type="hidden" name="status" value="pending" />
								</div>
							</div>
							@endforeach
							<!--  -->
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div style="font-weight: 700;"><strong>TOTAL</strong></div>
								<div style="font-weight: bold;color: #D10024;text-align: right;"><strong class="order-total">${{Cart::getTotal()}}</strong></div>
								<input type="hidden" name="total_price" value="{{Cart::getTotal()}}" />

								
							</div>
						</div>
						<button class="primary-btn order-submit" type="submit" name="submit" value="Submit">Place order</button>
						</form>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        </div>
</div>
@endsection