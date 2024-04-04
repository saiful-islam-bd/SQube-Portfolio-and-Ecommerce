@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Main Team Member</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <select name="landing_main_team_id" class="form-select mb-3"
                        aria-label="Default select example">
                        <option selected="{{ $teams->id }}">{{ $teams->landing_team_name }}</option>

                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->landing_team_name }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="breadcrumb-title pe-3">Edit Sub-Team</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sub-Team</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" method="post" action="{{ route('update.landing.sub_team') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $sub_teams->id }}">
                                    <input type="hidden" name="old_img" value="{{ $teams->landing_sub_team_image }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sub-Team Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="landing_team_name" class="form-control"
                                                value="{{ $sub_teams->landing_sub_team_name }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sub-Team Designation</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="landing_team_designation" class="form-control"
                                                value="{{ $sub_teams->landing_sub_team_designation }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sub-Team Paragraph</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="landing_team_paragraph" class="form-control"
                                                value="{{ $sub_teams->landing_sub_team_paragraph }}" />
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Landing Slider Image </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="landing_sub_team_image" class="form-control"
                                                id="image" />
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ asset($sub_teams->landing_sub_team_image) }}" alt="Admin"
                                                style="width:100px; height: 100px;">
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                            </div>

                            </form>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    landing_sub_team_name: {
                        required: true,
                    },
                    landing_sub_team_designation: {
                        required: true,
                    },
                    landing_sub_team_paragraph: {
                        required: true,
                    },
                },
                messages: {
                    landing_sub_team_name: {
                        required: 'Please Enter Sub-Team Name',
                    },
                    landing_sub_team_designation: {
                        required: 'Please Enter Sub-Team Designation',
                    },
                    landing_sub_team_paragraph: {
                        required: 'Please Enter Sub-Team Paragraph',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
