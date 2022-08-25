@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Home Slider Page</h4>
                        <hr>
                        <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title" name="title" value="{{ $homeSlider->title }}" placeholder="Title">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="short_title" name="short_title" value="{{ $homeSlider->short_title }}" placeholder="Short title">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="video_url" name="video_url" value="{{ $homeSlider->video_url }}" placeholder="Video URL">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="home_slide" class="col-sm-2 col-form-label">Slider image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="home_slide" name="home_slide">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="showImage" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($homeSlider->home_slide)) ? url('upload/home_slider/'.$homeSlider->home_slide) : url('upload/no_image.jpg') }}" alt="Slider image">
                                </div>
                            </div>
                            <!-- end row -->
                            <hr>
                            <input type="submit" class="btn btn-round btn-info waves-effect waves-light" value="Update Slider">
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
