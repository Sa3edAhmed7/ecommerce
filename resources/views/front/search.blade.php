@extends('front.layout')
@section('content')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
						<!-- store products -->
					 <div class="row">
						@foreach ($product as $prod)
							<!-- product -->
							<div class="col-sm-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="{{ URL::asset($prod->image) }}" alt="">
										<div class="product-label">
											<span class="sale">-{{$prod['offer']}}%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{$prod->category->name}}</p>
										<h3 class="product-name"><a href="/productdetail/{{ $prod['id'] }}">{{$prod['name']}}</a></h3>
										<h4 class="product-price">${{$prod['price']}} <h4 class="product-old-price"></h4></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button><a href="/productdetail/{{ $prod['id'] }}" data-lightbox="project" class="quick-view"><i class="fa fa-eye"></i></a></button>
										</div>
                                        <div class="input-number">
										<input type="number" name="quantity" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>	
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
							<!-- /product -->
						@endforeach
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