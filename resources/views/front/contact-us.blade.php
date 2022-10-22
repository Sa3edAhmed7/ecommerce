@extends('front.layout')
@section('content')
			<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Contact us</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('index')}}">Home</a></li>
							<li class="active">Contact us</li>
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
			<div class="row">
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">
								<div class="newsletter">
							<p style="color:#000000;">Leave a <strong style="color:#D10024;">Message</strong></p>
							<form action="{{ route('contact-us.store') }}" method="POST" name="frm-contact" enctype="multipart/form-data">
                                @csrf
								<label for="name">Name<span>*</span></label>
									<input type="text" value="" id="name" name="name" >

									<label for="email">Email<span>*</span></label>
									<input type="text" value="" id="email" name="email" >

									<label for="subject">Subject</label>
									<input type="text" value="" id="subject" name="subject" >

									<label for="message">Message</label>
									<textarea name="message" id="message"></textarea>
								<button class="newsletter-btn" style="border-radius: 35px;" type="submit" name="submit" value="Submit"><i class="fa fa-envelope"></i> Message</button>
							</form>
						</div>
					</div>
				</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								<div class="wrap-map">
									<!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="w-100 mb-n2" style="height: 450px; width:150%"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d864.0084017286532!2d31.147192170764654!3d29.978464160551933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x545c7e4f4c158b73!2zMjnCsDU4JzQyLjUiTiAzMcKwMDgnNDcuOSJF!5e0!3m2!1sar!2seg!4v1661442365036!5m2!1sar!2seg"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Google Map End -->
								</div>
								<h2 class="box-title">Contact Detail</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">									
										<div class="right-info">
										<i class="fa fa-envelope" aria-hidden="true"></i>
											<b>Email</b>
											<p style="font-weight: bold; color:#D10024;">{{$setting->email}}</p>
										</div>
									</div>

									<div class="icon-box-item">				
										<div class="right-info">
										<i class="fa fa-phone" aria-hidden="true"></i>
											<b>Phone</b>
											<p style="font-weight: bold; color:#D10024;">+{{$setting->phone}}</p>
										</div>
									</div>

									<div class="icon-box-item">					
										<div class="right-info">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
											<b>Mail Office</b>
											<p style="font-weight: bold; color:#D10024;">Sed ut perspiciatis unde omnis<br />Street Name, Los Angeles</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div>

		</div><!--end container-->
@endsection