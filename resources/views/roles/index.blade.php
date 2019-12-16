@extends('layouts.main');
@section('content');
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Roles</a></li>
  </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Role Management
                        </div>
                        <div class="col-md-6">
                            <a href="#" id="create-role" class="btn btn-success float-right">New Role</a>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="panel-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <h5 class="card-header">User Roles </h5>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-condensed" id="role-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
        
                                @foreach ($roles as $key => $role)
        
                                    <tr class="list-users">
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td class="float-right">
                                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
        
                                            <form action="{{ url('roles/'.$role->id) }}" method="POST" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
        
                                                <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modals --}}
<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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

      <form class="form-horizontal" role="form" method="POST" action="{{ url('/roles') }}">
          {{ csrf_field() }}

          <div class="row">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
              <label for="name" class="control-label">Name</label>

                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                         required autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
          </div>
          <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }} col-md-6">
              <label for="display_name" class="control-label">Display Name:</label>

                  <input id="name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}"
                         required autofocus>

                  @if ($errors->has('display_name'))
                      <span class="help-block">
                      <strong>{{ $errors->first('display_name') }}</strong>
                  </span>
                  @endif
          </div>
          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-12">
              <label for="email" class="control-label">Description</label>

                  <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>

                  @if ($errors->has('description'))
                      <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
                  @endif
              </div>
        </div>
          <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }} col-md-12">
              <label for="permissions" class="control-label">Permissions</label><br>

                  @foreach ($permissions as $key => $permission)
                  <div class="row">
                      <div class="col-md-3">
                      <input type="checkbox"  value="{{$key}}" name="permissions[]"> {{$permission}}<br>
                    </div>
                </div>
                  @endforeach

                  @if ($errors->has('permissions'))
                      <span class="help-block">
                      <strong>{{ $errors->first('permissions') }}</strong>
                  </span>
                  @endif
          </div>



          <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
              </div>
          </div>

        </div>
        <div class="modal-footer">
          <a class="btn btn-secondary" href="{{ url('admin/roles') }}">
            Cancel
          </a>
          <button type="submit" class="btn btn-primary">
            Save
          </button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
@push('scripts')
<script>
$(document).ready(function() {
  $('#role-table').DataTable();

  $('#create-role').click(function(){
    $('#roleModal').modal('show');
  })
});

</script>    
@endpush
@endsection
