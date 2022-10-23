@extends('front.main')
@section('content')
  <style>
  @media print {
  #print_Button {
  display: none;
  }
  }

 </style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a class="text-danger" href="#">Home</a></li>
            <li class="breadcrumb-item"><a class="text-danger" href="{{ route('order.index')}}">Orders</a></li>
            <li class="breadcrumb-item active">Orders Details</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="row" id="print">
    <div class="col-lg-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                          <!-- /.card-header -->
                          
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">#</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Order Total</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Order offer</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Name</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">email</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">phone</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">address</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">status</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">created_at</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i = 0; ?>
                                <?php $i++; ?>
                              <tr>
                                <td class="py-5 text-center text-bold">{{ $i }}</td>
                                    <td class="py-5 text-center text-bold" style="color:#ff2832;">{{ $order['total_price'] }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order['offer']}}</td>
                                    <td class="py-5 text-center text-bold">{{ $order['name']}}</td>
                                    <td class="py-5 text-center text-bold">{{ $order['email']}}</td>
                                    <td class="py-5 text-center text-bold">{{ $order['phone']}}</td>
                                    <td class="py-5 text-center text-bold">{{ $order['address']}}</td>
                                    @if(($order->status) == 'pending')
                                    <td class="py-5 text-center text-bold" style="color:#fd7e14;">{{$order['status'] }}</td>
                                    @elseif(($order->status) == 'approve')
                                    <td class="py-5 text-center text-bold" style="color:#20c997;">{{$order['status'] }}</td>
                                    @else 
                                    <td class="py-5 text-center text-bold" style="color:#e74c3c;">{{$order['status'] }}</td>
                                    @endif
                                    <td class="py-5 text-center text-bold">{{ $order['created_at']}}</td>          
                              </tr>
                              </tbody>
                            </table>
                            <div class="card">
                          <div class="card-header">
                            <h3 class="card-title" style="color:#ff2832;">Order Notes:<h3 class="card-title" style="padding-left:10px;">{{ $order['notes'] }}</h3></h3>
                          </div>
                          <button class="btn btn-primary  float-left mt-3 mr-2" style="width:30%" id="print_Button" value="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>Print</button>
                        </div>
                          <!-- /.card-body -->
                        
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
            </div>
        </div><!-- /.card -->

<div class="row" id="print">
    <div class="col-lg-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                        
                          <div class="card-header">
                            <h3 class="card-title" style="color:#ff2832;"> Order Products </h3>
                                                
                          </div>
                          <!-- /.card-header -->
                          
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">#</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Order Name</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Product Name</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Product Image</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Color</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Price</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Offer</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Quantity</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i = 0; ?>
                            @foreach ($orderproducts as $oprod)
                                <?php $i++; ?>
                              <tr>
                                <td class="py-5 text-center text-bold">{{ $i }}</td>
                                    <td class="py-5 text-center text-bold">{{ $oprod->order->name }}</td>
                                    <td class="py-5 text-center text-bold">{{ $oprod->product->name }}</td>
                                    <td class="py-5 text-center text-bold"><img src="{{ asset($oprod->product->image) }}" width="100px" height="100px" alt=""></td>
                                    <td class="py-5 text-center text-bold">{{ $oprod->color->name }}</td>
                                    <td class="py-5 text-center text-bold">{{ $oprod->price }}</td>
                                    <td class="py-5 text-center text-bold">{{ $oprod->offer }}</td>
                                    <td class="py-5 text-center text-bold">{{ $oprod->quantity }}</td>
                              </tr>
                              @endforeach
                              </tbody>
                            </table>
                            <h2 class="py-5 text-center text-bold" style="color:#ff2832;">Total : <span>${{ $order['total_price'] }}</span></h2>
                          <!-- /.card-body -->
                          <!-- Main Footer -->
                      <footer class="main-footer py-5 text-center">
                      <a href="{{ route('index') }}">
                          <img src="{{asset($setting->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle"><br>
                        </a>
                        <br>
                          <!-- Default to the left -->
                        <strong>Copyright &copy; 2022 <a class="text-danger" href="{{ route('index') }}">Store</a>.</strong> All rights reserved.
                      </footer>
  
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
            </div>
        </div><!-- /.card -->
    </div>
</div>
</div>
</div>


@endsection
<script type="text/javascript">
              var hidden = false;
              function printDiv() {
              hidden = !hidden;
              if(hidden) {
                  document.getElementById('print_Button').style.visibility = 'hidden';
                  var printContents = document.getElementById('print').innerHTML;
                  var originalContents = document.body.innerHTML;
                  document.body.innerHTML = printContents;
                  window.print();
                  document.body.innerHTML = originalContents;
                  location.reload();
              } else {
                  document.getElementById('print_Button').style.visibility = 'visible';
              }
            }

  </script>