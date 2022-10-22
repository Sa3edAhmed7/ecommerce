@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
                        <div class="form-group">
                            <h3>{{$page['title']}}</h3>
                            <div>{!!$page['content']!!}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
@endsection