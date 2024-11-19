@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">


    <div class="row profile-body">
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Services</h6>

                        <form class="forms-sample" id="myForm" method="post" action="{{route('store.services')}}">
                            @csrf

                            <!--<div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Icon</label>
                                <input type="file" name="services_photo" class="form-control">

                            </div>-->
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Icon</label>
                                <input type="text" name="services_photo" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Title</label>
                                <input type="text" name="services_title" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Description</label>
                                <!--<input type="text" name="services_description" class="form-control">-->
                                <textarea for="exampleInputEmail1" class="form-control"
                                    name="services_description"></textarea>

                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                services_title: {
                    required: true,
                },
                services_description: {
                    required: true,
                },

            },
            messages: {
                services_title: {
                    required: 'Please Enter Services Title',
                },
                services_description: {
                    required: 'Please Enter Services description',
                },


            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endsection