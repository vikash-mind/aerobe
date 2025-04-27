@extends('admin.layouts.master')

@section('title')
    Create User
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Create User
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Create User Information  <a href="{{ route('admin.user.index') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">User Listing</button></a></h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>

                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input id="name" name="name" placeholder="Enter User Name" type="text" class="form-control" value="" required>
                                    </div>
                                </div>
                           
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Email ID</label>
                                        <input id="email" name="email" placeholder="Enter Email ID" type="text" class="form-control" value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6 mb-3">
                                    <label for="password" class="form-label">Paasword</label>
                                    <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                        <span class="bx bx-lock-alt"></span>
                                        <input type="password"
                                            class="form-control"
                                            placeholder="Enter password" id="password-input" name="password"
                                            required autocomplete="password" value="">
                                        <button type="button"
                                            class="btn btn-link position-absolute h-100 end-0 top-0"
                                            id="password-addon">
                                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                        </button>
                                    </div>
                                </div>
                           
                                <div class="col-lg-6 mb-3">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                     <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                        <span class="bx bx-lock-alt"></span>
                                        <input type="password"
                                            class="form-control"
                                            placeholder="Enter Confirm Password" id="cpassword-input" name="cpassword"
                                            required autocomplete="cpassword" value="">
                                        <button type="button"
                                            class="btn btn-link position-absolute h-100 end-0 top-0"
                                            id="cpassword-addon">
                                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Role</label>
                                        <select id="input9" class="form-select" name="role_id">
                                            @if($userRoles->count() > 0)
                                                <option value="">Select Role</option>
                                                @foreach($userRoles as $userRole)
                                                    <option value="{{ $userRole->id }}">{{ $userRole->label }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                       
                                    </div>
                                </div>
                         
                                <div class="col-lg-6 mb-3">
                                    <label for="input9" class="form-label">Status</label>
                                    <select id="input9" class="form-select" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-4">
            <div class="col text-end">
                <button class="btn btn-primary" type="submit">Save Form Information</button>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </form>
@endsection
  
@section('scripts')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/pass-addon.init.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 3000);

        $(document).ready(function () {
                $('input[type=file]').on('change', function (event) {
                    let tmppath = URL.createObjectURL(event.target.files[0]);

                    // Find the next `.col-lg-2` div and place the image inside it
                    let previewContainer = $(this).closest('.col-lg-6').next('.col-lg-6').find('.mb-3');

                    // Check if an image preview already exists
                    let previewImage = previewContainer.find('img');
                    if (previewImage.length === 0) {
                        previewImage = $('<img/>', {
                            width: 150,
                            height: 120,
                            class: 'rounded',
                            src: tmppath
                        }).appendTo(previewContainer); // Append inside .mb-3 div
                    } else {
                        previewImage.attr('src', tmppath); // Update existing preview
                    }
                });
            });
    </script>
@endsection
