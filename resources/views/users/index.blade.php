@extends('layouts.main');
@section('content');
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            User Management
                        </div>
                        <div class="col-md-6">
                            @role('admin')
                            <a href="#" class="btn btn-success float-right" id="new-user">New User</a>
                            @endrole
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
                    <table class="table table-striped table-bordered table-condensed" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)

                            <tr class="list-users">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->roles))
                                    @foreach($user->roles as $role)
                                    <label class="label label-success">{{ $role->display_name }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td class="float-right">
                                    <a class="btn btn-info" id="edit-uder" href="{{ route('users.show',$user->id) }}">Show</a>
                                    <a class="btn btn-primary" id="edit-user" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                    <form action="{{ url('users/'.$user->id) }}" method="POST"
                                        style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
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

<!-- Modal -->
<div class="modal fade" id="UserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
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

            <form class="form-horizontal" id="users-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                            <label for="name" class="control-label">Name:</label>

                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                            <label for="email" class="control-label">Email:</label>

                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                                required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
                        <label for="password" class="control-label">Password:</label>
                        <input id="password" type="password" class="form-control" name="password" required autofocus>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-md-6">
                        <label for="password_confirmation" class="col-md-4 control-label">Confirm</label>

                        <input id="password_confirmation" type="password" placeholder="Confirm Password"
                            class="form-control" name="password_confirmation" required autofocus>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div> --}}
            </div>
            <div class="{{ $errors->has('roles') ? ' has-error' : '' }}">
                <label for="roles" class="control-label">Roles</label>
                    <select class="form-group form-control" id="role" name="roles[]" multiple>
                        @foreach ($roles as $key => $role)
                        <option value="{{$key}}">{{$role}}</option>
                        @endforeach
                    </select>


                    @if ($errors->has('roles'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roles') }}</strong>
                    </span>
                    @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>

        </div>
    </div>
</div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
  $('#users-table').DataTable();

  $('#new-user').click(function(){
    $('#UserModal').modal('show');
  })

  $('#users-form').submit(function (e) {
      e.preventDefault();
    var form_data = $(this).serialize();  

    $.ajax({
        url:"{{route('users.store')}}",
        type:"post",
        data:form_data,
        success:function(resp){
            if(resp.status == 1){
                toastr.success('users created successfuly');
            }
            setTimeout(function(){
                window.location.reload(true);
                oad(true);
            }, 1000);
        },
        error:function(err){
            console.log(err);
        }
    })
  })
  $('#edit-user').on('click', function(){
      $('#editModal').modal('show');
      
  })

});

</script>
@endpush
@endsection