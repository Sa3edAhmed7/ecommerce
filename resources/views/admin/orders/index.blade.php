@extends('admin.main')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <!-- /.content-header -->
  <div class="row">
    <div class="col-lg-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                        
                          <div class="card-header">
                            <h3 class="card-title" style="color:#ff2832;"> Orders</h3>
                                                
                          </div>
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
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">updated_at</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Show</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i = 0; ?>
                            @foreach ($orders as $order)
                                <?php $i++; ?>
                              <tr>
                                <td class="py-5 text-center text-bold">{{ $i }}</td>
                                    <td class="py-5 text-center text-bold" style="color:#ff2832;">{{ $order->total_price }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order->offer }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order->name }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order->email }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order->phone }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order->address }}</td>
                                    @if(($order->status) == 'pending')
                                    <td class="py-5 text-center text-bold" style="color:#ffffff; background-color:#fd7e14; border-raduis:25%;">{{$order->status }}
                                    <a class="btn btn-sm btn-info-gradient" style="color:#ffffff;"
                                          href="{{ route('orders.edit', $order->id) }}" title="تعديل"><i class="fa fa-pen"></i></a>
                                    </td>
                                    @elseif(($order->status) == 'approve')
                                    <td class="py-5 text-center text-bold" style="color:#ffffff; background-color:#20c997;">{{$order->status }}
                                    <a class="btn btn-sm btn-info-gradient" style="color:#ffffff;"
                                          href="{{ route('orders.edit', $order->id) }}" title="تعديل"><i class="fa fa-pen"></i></a>
                                    </td>                          
                                    @else 
                                    <td class="py-5 text-center text-bold" style="color:#ffffff; background-color:#e74c3c;">{{$order->status }}
                                    <a class="btn btn-sm btn-info-gradient" style="color:#ffffff;"
                                          href="{{ route('orders.edit', $order->id) }}" title="تعديل"><i class="fa fa-pen"></i></a>
                                    </td>                                 
                                    @endif
                                    </td>
                                    <td class="py-5 text-center text-bold">{{ $order->created_at }}</td>
                                    <td class="py-5 text-center text-bold">{{ $order->updated_at }}</td>
                                    <td class="py-5 text-center text-bold">
                                    <a class="btn btn-sm btn-info-gradient" style="color:#ff2832;"
                                                href="orderdetail/{{ $order['id'] }}" title="عرض"><i class="fa fa-eye"></i></a>   
                                                </form>  
                                      </td>
                              </tr>
                              @endforeach
                              </tbody>
                            </table>
                          
                          <!-- /.card-body -->
                        
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
@endsection
