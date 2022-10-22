@extends('admin.main')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Orders : {{ $order->status }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a class="text-danger" href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Orders Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="row">
    <div class="col-lg-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                          <!-- /.card-header -->
                          <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="form-group">
                                <label for="inputName" class="control-label" style="color:#ff2832;">Order Status</label>
                                <select name="status" class="form-control SlectBox border-danger text-lg">
                                    <!--placeholder-->
                                    <option value="" selected enabled>حدد الحالة</option>
                                        <option class="tx-center" style="color:#fd7e14;">pending</option>
										                    <option class="tx-center" style="color:#20c997;">approve</option>
                                        <option class="tx-center" style="color:#e74c3c;">reject</option>
                                </select>
                            </div>
                    </div>
                    <button type="submit" class="btn text-white" style="background-color:#ff2832;">Update</button>
                  </form>
                          
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
@endsection
