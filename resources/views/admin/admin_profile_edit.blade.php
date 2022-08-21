@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                        <hr>
                        <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="name" name="name" value="{{ $editData->name }}" placeholder="Name">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="username" name="username" value="{{ $editData->username }}" placeholder="Username">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" id="email" name="email" value="{{ $editData->email }}" placeholder="Email">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label">Profile image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="profile_image" name="profile_image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="showImage" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($editData->profile_image)) ? url('upload/admin_images/'.$editData->profile_image) : url('upload/user.jpg') }}" alt="Profile image">
                                </div>
                            </div>
                            <!-- end row -->
                            <hr>
                            <input type="submit" class="btn btn-round btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#profile_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>

@endsection
