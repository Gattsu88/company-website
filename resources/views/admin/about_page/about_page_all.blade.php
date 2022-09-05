@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">About Page</h4>
                        <hr>
                        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{ $aboutPage->id }}">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title" name="title" value="{{ $aboutPage->title }}" placeholder="Title">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="short_title" name="short_title" value="{{ $aboutPage->short_title }}" placeholder="Short title">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short description</label>
                                <div class="col-sm-10">
                                    <textarea required="" class="form-control" name="short_description" rows="5">{{ $aboutPage->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="long_description" class="col-sm-2 col-form-label">Long description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description">{{ $aboutPage->long_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="about_image" class="col-sm-2 col-form-label">About image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="about_image" name="about_image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="showImage" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($aboutPage->about_image)) ? url($aboutPage->about_image) : url('upload/no_image.jpg') }}" alt="Slider image">
                                </div>
                            </div>
                            <!-- end row -->
                            <hr>
                            <input type="submit" class="btn btn-round btn-info waves-effect waves-light" value="Update About Page">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#about_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>

@endsection
