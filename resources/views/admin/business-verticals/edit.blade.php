@extends('admin.layouts.master')
@section('title')
    Edit Business Vertical
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Edit Business Vertical
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.business-vertical.update', $businessVertical->id) }}" enctype="multipart/form-data">
   
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Edit Business Vertical Information  <a href="{{ route('admin.business-vertical.index') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Business Vertical Listing</button></a></h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>

                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-8">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="label">Name</label>
                                        <input id="label" name="label" placeholder="Enter Name" type="text" class="form-control" value="{{ $businessVertical->label }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="link">Link</label>
                                        <input id="link" name="link" placeholder="Enter Url" type="text" class="form-control" value="{{ $businessVertical->link }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="logo" id="logo">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        @if ($businessVertical->logo && file_exists(public_path('assets/uploads/business-verticals/' . $businessVertical->logo)))
                                            <img src="{{ asset('assets/uploads/business-verticals/' . $businessVertical->logo) }}" class="rounded me-2" title="Logo" width="80" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Logo" width="80" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>
                         
                                <div class="col-lg-6 mb-3">
                                    <label for="input9" class="form-label">Status</label>
                                    <select id="input9" class="form-select" name="status">
                                        <option value="1" @if($businessVertical->label == 1) selected @endif>Active</option>
                                        <option value="0" @if($businessVertical->label == 0) selected @endif>Inactive</option>
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
                <button class="btn btn-primary" type="submit">Update</button>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </form>
    @endsection
  

    @section('scripts')
 
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        
        <script type="text/javascript">
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000);
        </script>

@endsection
