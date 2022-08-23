@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password Page</h4>
                        <br>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p class="mb-1">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <hr>

                        <form action="{{ route('admin.password.store') }}" method="POST">

                            @csrf

                            <div class="row mb-3">
                                <label for="old_password" class="col-sm-2 col-form-label">Old password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="old_password" name="old_password" placeholder="Old password">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="new_password" class="col-sm-2 col-form-label">New password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="new_password" name="new_password" placeholder="New password">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm new password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
                                </div>
                            </div>
                            <!-- end row -->
                            <hr>
                            <input type="submit" class="btn btn-round btn-info waves-effect waves-light" value="Change Password">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
