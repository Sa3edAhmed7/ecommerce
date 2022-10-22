@extends('front.layout')
@section('content')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
					<h3 class="breadcrumb-header">{{$page['title']}}</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{route('index')}}">Home</a></li>
							<li class="active">{{$page['title']}}</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <div style="font-size:18px;">{!!$page['content']!!}</div>
		
		<!-- /BREADCRUMB -->
		</div>
	</div>
@endsection