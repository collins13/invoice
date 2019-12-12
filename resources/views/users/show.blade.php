@extends('layouts.main');
@section('content');
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Users</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Users</a></li>
  </ul>
</div>
<a href="{{route('users.index')}}" class="btn btn-dark">Back</a><hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-heading">User Info</div>

                <div class="card-body">


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        {{ $user->name }}
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">E-mail</label>
                        {{ $user->email }}
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Roles</label>
                        @if(!empty($user->roles))
                            @foreach($user->roles as $role)
                                <label class="label label-success">{{ $role->display_name }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
