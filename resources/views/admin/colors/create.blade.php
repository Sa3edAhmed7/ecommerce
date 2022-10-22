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
          <h1 class="m-0" style="color:#ff2832;">Colors Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a style="color:#ff2832;" href="#">Home</a></li>
            <li class="breadcrumb-item active">Colors Page</li>
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
                <form action="{{ route('colors.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <div class="form-group">
                                <label for="inputName" class="control-label" style="color:#ff2832;">ProductName</label>
                                <select name="product_id" class="form-control SlectBox border-danger text-lg">
                                    <!--placeholder-->
                                    <option value="" selected enabled>Select-Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"> {{ $product->name }}</option>
                                    @endforeach
                                </select>                         
                    </div>
                    <label for="color" class="form-label" style="color:#ff2832;">Colors</label>
                      <input type="color" class="form-control" style="width: 30%;" id="color" name="color">
                      <label for="name" class="form-label" style="color:#ff2832;">Colors Name</label>
                      <input type="name" class="form-control text-lg" style="border-color:#ff2832;" id="name" name="name">
                    </div>
                    <button type="submit" class="btn text-white" style="background-color:#ff2832;">Create</button>
                  </form>
            </div>
        </div><!-- /.card -->
    </div>
</div>
@endsection