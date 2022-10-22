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
          <h1 class="m-0">Settings Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a style="color:#ff2832;" href="#">Home</a></li>
            <li class="breadcrumb-item active">Settings Page</li>
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
                            <h3 class="card-title" style="color:#ff2832;">Settings</h3>
                          </div>
                          <script>
    
                        function show(event){
                            let reader=new FileReader();
                            reader.onload=function(){
                                let img=document.getElementById('logo');
                                img.src=reader.result;
                            }
                            reader.readAsDataURL(event.target.files[0]);

                        }
                        </script>
                          <!-- /.card-header -->
                          <div class="mb-3">
                                <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                    Logo</label>
                                    <div class="setting_logo">
                                        <img style="border-radius: 35px;" src="{{asset($setting->logo)}}" id="logo" alt="" height="200px">
                                        <input class="dropify" onchange="show(event)" name="logo" type="file">
                                    </div>                                        
                                </div>


                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                        Website Name</label>
                                    <input class="form-control border-danger text-lg" id="validationCustom01" type="text" name="name" value="{{$setting->name}}">
                                </div>


                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control border-danger text-lg" name="description">{{$setting->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom02" class="col-form-label"><span>*</span>
                                        Email</label>
                                    <input class="form-control border-danger text-lg" id="validationCustom02" type="text" name="email" value="{{$setting->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Phone</label>
                                    <input class="form-control border-danger text-lg" id="validationCustomtitle" type="text" name="phone" value="{{$setting->phone}}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Whatsapp</label>
                                    <input class="form-control border-danger text-lg" id="validationCustomtitle" type="text" name="whatsapp" value="{{$setting->whatsapp}}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Twitter</label>
                                    <input class="form-control border-danger text-lg" id="validationCustomtitle" type="text" name="twitter" value="{{$setting->twitter}}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Instagram</label>
                                    <input class="form-control border-danger text-lg" id="validationCustomtitle" type="text" name="instagram" value="{{$setting->instagram}}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Youtube</label>
                                    <input class="form-control border-danger text-lg" id="validationCustomtitle" type="text" name="youtube" value="{{$setting->youtube}}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Facebook</label>
                                    <input class="form-control border-danger text-lg" id="validationCustomtitle" type="text" name="facebook" value="{{$setting->facebook}}">
                                </div>

                                <div class="form-group">
                                <button type="submit" class="btn text-white" style="background-color:#ff2832;">Create</button>
                                </div>


                                </form>

                            </div>
                        </div>
                    </div>

        <!-- Container-fluid Ends-->

    @endsection