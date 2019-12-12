@extends('layouts.main');
@section('content');
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Edit User</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Edit User</a></li>
  </ul>
</div>
<a href="{{route('users.index')}}" class="btn btn-dark"><i class="fa fa-angle-left"></i> Back</a><hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-heading">Edit User</div> --}}

                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ url('admin/users/'.$user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                            <label for="name" class="control-label">Name</label>

                                <input id="display_name" type="text" class="form-control" name="name"
                                       value="{{$user->name}}"
                                       required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                            <label for="email" class="control-label">E-Mail</label>

                                <input id="email" type="text" class="form-control" name="email"
                                       value="{{$user->email}}"
                                       required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
                            <label for="password" class=" control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-md-6">
                            <label for="password_confirmation" class=" control-label">Confirm Password</label>

                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autofocus>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>


                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="roles" class="col-md-4 control-label">Roles</label>

                            <div class="col-md-6">

                                <select id="role" name="roles[]" multiple style="width:700px">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{in_array($role->id, $userRoles) ? "selected" : null}}>
                                            {{$role->display_name}}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('roles'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('roles') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a class="btn btn-link" href="{{ url('admin/roles') }}">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
