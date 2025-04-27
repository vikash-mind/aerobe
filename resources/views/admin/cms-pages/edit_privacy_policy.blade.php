@extends('admin.layouts.master')

@section('title')
    Privacy Policy Page
@endsection

@section('page-title')
    Privacy Policy Page
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.cookie-preference-page.update', $cookiePreferencePage->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Privacy Policy Information</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            <div class="row col-lg-8">
                                <div class="row col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="header_heading">Header Heading</label>
                                        <input id="header_heading" name="header_heading" placeholder="Enter Header Heading" type="text" class="form-control" value="{{ $cookiePreferencePage->header_heading }}" required>
                                    </div>
                                </div>
                            
                                <div class="row col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="header_title">Header Title</label>
                                        <input id="header_title" name="header_title" placeholder="Enter Header Title" type="text" class="form-control" value="{{ $cookiePreferencePage->header_title }}" required>
                                    </div>
                                </div>
                               
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="header_image" class="form-label">Header Image</label>
                                        <input class="form-control" type="file" name="header_image" id="header_image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if ($cookiePreferencePage->header_image && file_exists(public_path('assets/uploads/cookie-preference-page/' . $cookiePreferencePage->header_image)))
                                            <img src="{{ asset('assets/uploads/cookie-preference-page/' . $cookiePreferencePage->header_image) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                        @endif
                                    </div>
                                </div>

                                <div class="row col-lg-12">
                                    <div class="mb-3">
                                        <label for="header_desc" class="form-label">Header Description <span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="header_desc" placeholder="Enter Header Description" id="header_desc">{{ $cookiePreferencePage->header_desc }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Page Data</h5>
                                </div>
                            </div>
                        </div>
                   
                        <div class="p-4 border-top">
                            <div class="row col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="cookie_preference_desc">Privacy Policy Description</label>
                                    <textarea class="form-control" id="cookie_preference_desc" placeholder="Enter Privacy Policy Description" name="cookie_preference_desc" rows="4">{{ $cookiePreferencePage->cookie_preference_desc }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Meta Data</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                   
                        <div class="p-4 border-top">
                           
                                <div class="row col-sm-8">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_title">Meta Title</label>
                                            <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $cookiePreferencePage->meta_title }}">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                            <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $cookiePreferencePage->meta_keywords }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-sm-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $cookiePreferencePage->meta_description }}</textarea>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
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
                        width: 100,
                        height: 100,
                        class: 'rounded',
                        src: tmppath
                    }).appendTo(previewContainer); // Append inside .mb-3 div
                } else {
                    previewImage.attr('src', tmppath); // Update existing preview
                }
            });
        });
    </script>

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("cookie_preference_desc"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Enter Privacy Policy Description',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragÃ©e', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflÃ©',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'MultiLevelList',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        });

    </script>
@endsection
@extends('admin.layouts.master')
@section('title')
    Websetting
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Web Settings
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
    <form method="post" class="needs-validation" novalidate action="{{ route('admin.web-setting.update', $webSetting->id) }}" enctype="multipart/form-data">
   
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Website Information</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-top">
                            
                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="site_name">Site Name</label>
                                        <input id="site_name" name="site_name" placeholder="Enter Site Name" type="text" class="form-control" value="{{ $webSetting->site_name }}" required>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="site_logo" class="form-label">Site Logo</label>
                                            <input class="form-control" type="file" name="site_logo" id="site_logo">
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            @if ($webSetting->site_logo && file_exists(public_path('assets/uploads/websettings/' . $webSetting->site_logo)))
                                                <img src="{{ asset('assets/uploads/websettings/' . $webSetting->site_logo) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                            @else
                                                <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="site_favicon" class="form-label">Site Favicon</label>
                                            <input class="form-control" type="file" name="site_favicon" id="site_favicon">
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            @if ($webSetting->site_logo && file_exists(public_path('assets/uploads/websettings/' . $webSetting->site_favicon)))
                                                <img src="{{ asset('assets/uploads/websettings/' . $webSetting->site_favicon) }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                            @else
                                                <img src="{{ asset('assets/images/no-image.png') }}" class="rounded me-2" title="Site Logo" width="80" data-holder-rendered="true" />
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="facebook_url" class="form-label">Facebook URL</label>
                                            <input type="text" class="form-control" name="facebook_url" id="facebook_url" placeholder="Enter Facebook URL" value="{{ $webSetting->facebook_url }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="instagram_url" class="form-label">Instagram URL</label>
                                            <input type="text" class="form-control" id="instagram_url" name="instagram_url" placeholder="Enter Instagram URL" value="{{ $webSetting->instagram_url }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="twitter_url" class="form-label">Twitter URL</label>
                                            <input type="text" class="form-control" name="twitter_url" id="twitter_url" placeholder="Enter Twitter URL" value="{{ $webSetting->twitter_url }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="youtube_url" class="form-label">Youtube URL</label>
                                            <input type="text" class="form-control" name="youtube_url" id="youtube_url" placeholder="Enter Youtube URL" value="{{ $webSetting->youtube_url }}">
                                        </div>
                                    </div>
                               
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="linkedin_url" class="form-label">Linkedin URL</label>
                                            <input type="text" class="form-control" name="linkedin_url" id="linkedin_url" placeholder="Enter Linkedin URL" value="{{ $webSetting->linkedin_url }}">
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pininterest_url" class="form-label">Pininterest URL</label>
                                            <input type="text" class="form-control" name="Pininterest URL" id="pininterest_url" placeholder="Enter Facebook URL" value="{{ $webSetting->pininterest_url }}">
                                        </div>
                                    </div> -->
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label for="footer_shortdesc" class="form-label">Footer Short Description <span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="footer_shortdesc" placeholder="Enter Footer Short Desc" id="footer_shortdesc">{{ $webSetting->footer_shortdesc }}</textarea>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="copyright_text">Copyright Text</label>
                                        <textarea class="form-control" name="copyright_text" id="copyright_text" placeholder="Enter Copyright Text" rows="4">{{ $webSetting->copyright_text }}</textarea>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label for="opening_hours" class="form-label">Opening Hours<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="opening_hours" id="opening_hours" placeholder="Enter Opening Hours">{{ $webSetting->opening_hours }}</textarea>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label for="customers_in_countries" class="form-label">Customers In Countries<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customers_in_countries" id="customers_in_countries" placeholder="Enter Customers In Countries" value="{{ $webSetting->customers_in_countries }}">
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="mb-3">
                                        <label for="offices_in_countries" class="form-label">Offices In Countries<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="offices_in_countries" id="offices_in_countries" placeholder="Enter Offices In Countries" value="{{ $webSetting->offices_in_countries }}">
                                    </div>
                                </div>
                           
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Meta Data</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                   
                        <div class="p-4 border-top">
                           
                                <div class="row col-sm-8">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_title">Meta Title</label>
                                            <input id="meta_title" name="meta_title" placeholder="Enter Meta Title" type="text" class="form-control" value="{{ $webSetting->meta_title }}">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                            <input id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $webSetting->meta_keywords }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-sm-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" rows="4">{{ $webSetting->meta_description }}</textarea>
                                    </div>
                                </div>
                          
                        </div>
                    </div>

                    <div class="card">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Mail Details</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                            </div>
                        </div>
                  
                        <div class="p-4 border-top">
                           
                                <div class="row col-lg-8">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="from_name">From Name</label>
                                            <input id="from_name" name="from_name" placeholder="Enter From Name" value="{{ $webSetting->from_name }}" type="text" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="from_email">From Email</label>
                                            <input id="from_email" name="from_email" placeholder="Enter From Email" type="text" value="{{ $webSetting->from_email }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="to_name">To Name</label>
                                            <input id="to_name" name="to_name" placeholder="Enter To Name" type="text" value="{{ $webSetting->to_name }}" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="to_email">To Email</label>
                                            <input id="to_email" name="to_email" placeholder="Enter To Email" type="text" value="{{ $webSetting->to_email }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-8">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mail_mailer">Mail Mailer</label>
                                            <input id="mail_mailer" name="mail_mailer" placeholder="Enter Mail Mailer" type="text" value="{{ $webSetting->mail_mailer }}" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mail_host">Mail Host</label>
                                            <input id="mail_host" name="mail_host" placeholder="Enter Mail Host" type="text" value="{{ $webSetting->mail_host }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mail_port">Mail Port</label>
                                            <input id="mail_port" name="mail_port" placeholder="Enter Mail Port" type="text" value="{{ $webSetting->mail_port }}" class="form-control">
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mail_username">Mail Username</label>
                                            <input id="mail_username" name="mail_username" placeholder="Enter Mail Username" value="{{ $webSetting->mail_username }}" type="text" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mail_password">Mail Password</label>
                                            <input id="mail_password" name="mail_password" placeholder="Enter Mail Password" value="{{ $webSetting->mail_password }}" type="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mail_encryption">Mail Encryption</label>
                                            <input id="mail_encryption" name="mail_encryption" placeholder="Enter Mail Encryption" value="{{ $webSetting->mail_encryption }}" type="text" class="form-control">
                                        </div>
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
