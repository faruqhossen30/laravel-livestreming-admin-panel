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
                        <a href="{{route('agora.index')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Gift List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('agora.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label">Project Name</label>
                            <input type="text" name="project_name" value="{{old('project_name')}}" class="form-control @error('project_name') is-invalid @enderror" id="exampleInputname1"
                                autocomplete="off" placeholder="test-test@gmail.com">
                        </div>
                        @error('project_name')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror

                        <div class="mb-3">
                            <label for="app_id" class="form-label">App ID</label>
                            <input name="app_id" type="text"  class="form-control @error('app_id') is-invalid @enderror"
                                id="app_id" autocomplete="off" placeholder="app id">
                            @error('app_id')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="app_certificate" class="form-label">app_certificate</label>
                            <input name="app_certificate" type="text" value="{{old('app_certificate')}}" class="form-control @error('app_certificate') is-invalid @enderror"
                                id="app_certificate" autocomplete="off" placeholder="app_certificate">
                            @error('app_certificate')
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
