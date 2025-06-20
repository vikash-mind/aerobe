@extends('admin.layouts.master')

@section('title')
    Edit Top Menu
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
    Edit Top Menu
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.top-menu.update',$topMenu->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Edit Top Menu Information  <a href="{{ route('admin.top-menu.index') }}" style="float:right"><button type="button" class="btn btn-outline-primary waves-effect waves-light" fdprocessedid="ub8ltb">Top Menu Listing</button></a></h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>

                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="label">Name</label>
                                        <input id="label" name="label" placeholder="Enter Top Menu" type="text" class="form-control" value="{{$topMenu->label }}" required>
                                    </div>
                                </div>
                         
                                <div class="col-lg-6 mb-3">
                                    <label for="input9" class="form-label">Status</label>
                                    <select id="input9" class="form-select" name="status">
                                        <option value="1" @if($topMenu->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($topMenu->status == 0) selected @endif>Inactive</option>
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
                <button class="btn btn-primary" type="submit">Update Form Information</button>
            </div> <!-- end col -->
        </div> <!-- end row-->
    </form>
@endsection
  
@section('scripts')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 3000);
    </script>
@endsection
