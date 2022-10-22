@extends('admin.main')
@section('content')
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning bg bg-warning-gradient tx-white alert-dismissible fade show col-sm-2">
        <i class="fas fa-check-circle"></i>
        <strong>{{ $error }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
            @endforeach
@endif

@if (session()->has('Add'))
    <div class="alert alert-success bg bg-success-gradient tx-white alert-dismissible fade show col-sm-2" role="alert">
    <i class="fas fa-check-circle"></i>
    <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger bg bg-danger-gradient tx-white alert-dismissible fade show col-sm-2" role="alert">
    <i class="fas fa-check-circle"></i>
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-info bg bg-info-gradient tx-white  alert-dismissible fade show col-sm-2" role="alert">
    <i class="fas fa-check-circle"></i>
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a style="color:#ff2832;" href="#">Home</a></li>
            <li class="breadcrumb-item active">Products Page</li>
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
                        
                          <div class="card-header">
                            <h3 class="card-title" style="color:#ff2832;">Products</h3>
                          </div>
                          <!-- /.card-header -->
                          
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">#</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Category Name</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Product Name</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Price</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Offer</th>
                                <th class="wd-5p border-bottom-0 text-center" style="color:#ff2832;">Processes</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i = 0; ?>
                            @foreach ($product as $prod)
                                <?php $i++; ?>
                              <tr>
                                <td class="py-5 text-center">{{ $i }}</td>
                                    <td class="py-5 text-center">{{ $prod->category->name }}</td>
                                    <td class="py-5 text-center">{{ $prod->name}}</td>
                                    <td class="py-5 text-center">{{ $prod->price }}</td>
                                    <td class="py-5 text-center">{{ $prod->offer }}</td>
                                    <td class="py-5 text-center" style="color:#ff2832;">
                                    <form action="{{ route('products.destroy',$prod->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-info-gradient" style="color:#ff2832;">
                                                    <i class="fas fa-trash"></i></button>
                                            <a class="btn btn-sm btn-info-gradient" style="color:#ff2832;"
                                                href="{{ route('products.edit', $prod->id) }}" title="تعديل"><i class="fa fa-pen"></i></a>
                                                
                                                </form>     
                                    </td>
                              </tr>
                              @endforeach
                              </tbody>
                            </table>
                            <div class="d-flex">
                                    {!! $product->links() !!}
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
    </div>
</div>
@endsection