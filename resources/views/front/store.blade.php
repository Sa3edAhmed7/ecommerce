@extends('front.layout')
@section('content')
	<!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('index')}}">Home</a></li>
							<li class="active">All Products ({{ count($products) }} Results)</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							@foreach ($products as $product)
							<div class="product-widget">
								<div class="product-img">
									<img src="{{ URL::asset($product->image) }}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{$product->category->name}}</p>
									<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
									<h4 class="product-price">${{$product->price}} <h4 class="product-old-price"></h4></h4>
								</div>
							</div>
							@endforeach
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store products -->
						<div class="row">
						@foreach ($products as $product)
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="{{ URL::asset($product->image) }}" alt="">
										<div class="product-label">
											<span class="sale">-{{$product->offer}}%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{$product->category->name}}</p>
										<h3 class="product-name"><a href="/productdetail/{{ $product['id'] }}">{{$product->name}}</a></h3>
										<h4 class="product-price">${{$product->price}} <h4 class="product-old-price"></h4></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button><a href="/productdetail/{{ $product['id'] }}" data-lightbox="project" class="quick-view"><i class="fa fa-eye"></i></a></button>
											
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
							<!-- /product -->
							@endforeach
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 1-5 products</span>
							{!! $products->links() !!}
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
    </div>
</div>

@endsection