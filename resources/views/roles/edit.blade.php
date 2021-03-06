@extends('layouts.main');
@section('content');
<div class="app-title">
  <div>
    <h1><i class="fa fa-pencial"></i> Edit Role </h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Role Management</a></li>
  </ul>
</div>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

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
                              action="{{ url('roles/'.$role->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
   
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="display_name" class="col-md-4 control-label">Display Name</label>

                                <div class="col-md-12">
                                    <input id="display_name" type="text" class="form-control" name="display_name"
                                           value="{{$role->display_name}}"
                                           required autofocus>

                                    @if ($errors->has('display_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-12">
                                    <textarea rows="4" cols="50" name="description" id="description"
                                              class="form-control">{{$role->description}}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
                                <label for="permission" class="col-md-4 control-label">Permissions</label>

                                <div class="col-md-6">
                                    @foreach ($permissions as $permission)
                                        <input type="checkbox" value="{{$permission->id}}"
                                               {{in_array($permission->id, $rolePermissions) ? "checked" : null}} name="permissions[]">
                                        {{$permission->display_name}}<br>
                                    @endforeach

                                    @if ($errors->has('permissions'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="float-right">
                                        <a class="btn btn-secondary" href="{{ url('admin/roles') }}">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>                                   
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
