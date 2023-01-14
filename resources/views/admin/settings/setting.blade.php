@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">updata</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-5 col-md-3 pe-0">
            <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active " id="v-website-tab" data-bs-toggle="tab" href="#v-website" role="tab"
                    aria-controls="v-home" aria-selected="true"><span class="input-group"><i data-feather="home"
                            class="me-2"></i>Website Title</span></a>
                <a class="nav-link " id="v-profile-tab" data-bs-toggle="tab" href="#v-profile" role="tab"
                    aria-controls="v-map" aria-selected="false"><span class="input-group"><i data-feather="home"
                            class="me-2"></i>Contact</a>
                <a class="nav-link " id="v-map-tab" data-bs-toggle="tab" href="#v-map" role="tab"
                    aria-controls="v-profile" aria-selected="false"><span class="input-group"><i data-feather="map"
                            class="me-2"></i>Map</a>
            </div>
        </div>
        <div class="col-7 col-md-9 ps-0">
            <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
                <form action="{{ route('admin.setting.websitename') }}" method="post">
                    @csrf
                    <div class="tab-pane fade show active" id="v-website" role="tabpanel" aria-labelledby="v-website-tab">
                        <div class="row">
                            <div class="col grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <span> <i data-feather="globe" class="me-2 "></i>
                                            Website Name
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group date  mb-2">
                                            <span class="input-group-text">Website Name:</span>
                                            <input type="text" name="website_title" value="{{ option('website_title') }}"
                                                class="form-control @error('website_title') is-invalid @enderror" />
                                            </div>
                                            @error('website_title')
                                                <span class="text-danger">{{ $message }}</span> <br>
                                            @enderror

                                        <button type="submit" class="btn btn-primary btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="save"></i>
                                            Save
                                        </button>
                                        {{-- @include('admin.settings.inc.social-media') --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tab-pane fade" id="v-profile" role="tabpanel" aria-labelledby="v-profile-tab">
                    <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header">
                                    <span> <i data-feather="home" class="me-2 "></i>
                                        Contact
                                    </span>
                                </div>
                                <div class="card-body">

                                    @include('admin.settings.inc.contact')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="v-logo" role="tabpanel" aria-labelledby="v-logo-tab">
                    <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header">
                                    <span> <i data-feather="aperture" class="me-2 "></i>
                                        Logo
                                    </span>
                                </div>
                                <div class="card-body">

                                    @include('admin.settings.inc.logo')

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="tab-pane fade" id="v-map" role="tabpanel" aria-labelledby="v-map-tab">
                    <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header">
                                    <span> <i data-feather="map" class="me-2 "></i>
                                        Map
                                    </span>
                                </div>
                                <div class="card-body">

                                    @include('admin.settings.inc.map')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}"
        {{-- <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" /> --}} rel="stylesheet" />
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/ace-builds/ace.js') }}"></script>
    <script src="{{ asset('assets/plugins/ace-builds/theme-chaos.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('assets/js/simplemde.js') }}"></script>
    <script src="{{ asset('assets/js/ace.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>
@endpush
