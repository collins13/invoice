@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12 cl-md-offset-2">
        <!-- First row -->
        <div class="row">
            <div class="col-md-2">
            <button class="btn btn-primary btn-block">Rate: <b>{{$profile->rate}} %</b></button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block">Tax: <b>{{$profile->tax}} %</b></button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#editTaxModal">Edit Tax | Rate</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addProfileModal">Add Profile</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addUserModal">Add User</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block">A.O.B</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Tax Modal -->
<div class="modal fade" id="editTaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tax and Rate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::model($profile, ['url' => ['/user/profile', $profile->id], 'method' => 'POST']) !!}
            <div class="form-group mb-2">
                {{ Form::text('rate', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group mb-2">
                    {{ Form::text('tax', null, ['class' => 'form-control']) }}
            </div>
            {{ Form::button('Edit Rate / Tax', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Profile Modal -->
<div class="modal fade" id="addProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-inline" action="/user/profile" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="mb-2">
                        <span>Company Logo</span>
                        <input type="file" name="companyLogo" class="form-control">
                    </div>
                </div>
                <div class="form-group mb-2">
                        <input type="text" name="rate" class="form-control" placeholder="RATE %">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" name="tax" class="form-control" placeholder="TAX %">
                    </div>
                <button type="submit" class="btn btn-primary">Save Profile</button>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="/user/profile" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="invoice@invoice.com">
                </div>
                <div class="form-group">
                    <select name="role" class="form-control">
                        <option value="1">Administrator</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div class="mb-2">
                    <input type="password" name="password" class="form-control" placeholder="PASSWORD">
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection