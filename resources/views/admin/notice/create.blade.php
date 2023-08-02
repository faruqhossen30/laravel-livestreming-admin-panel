@extends('admin.layout.master')
@section('content')
<nav class="page-breadcrumb d-flex justify-content-between align-items-center">
    <ol class="breadcrumb pt-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Notice / Create</li>
    </ol>
    <a href="{{ route('notice.index') }}" type="button" class="btn btn-xs btn-outline-primary  btn-icon-tex">
        <i class="btn-icon-prepend" data-feather="plus"></i>
        Notice List</a>
</nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('notice.store') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="mb-3">
                            <x-input-text label="Title" name="title" value="{{old('title')}}" placeholder="Title" />
                        </div>

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Description</h4>
                                    <textarea class="form-control" name="description" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/ace-builds/ace.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/ace-builds/theme-chaos.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('admin/assets/js/simplemde.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ace.js') }}"></script>
@endpush
