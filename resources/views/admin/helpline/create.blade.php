@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Gift</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{route('helpline.index')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="arrow-left-circle"></i>
                           Go Back
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('helpline.store') }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="mb-3">
                            <label for="info" class="form-label">Info</label>
                                <textarea name="info" class="form-control" id="" cols="30" rows="10"></textarea>
                            @error('info')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-styles')
@endpush

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
