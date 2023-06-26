@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gift List</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('helpline.create') }}" type="button"
                            class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="aperture"></i>
                            Change Helpline Info
                        </a>
                        <a href="{{ route('flush.helpline', $helpline->id) }}" type="button"
                            class="btn btn-sm btn-danger btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="refresh-ccw"></i>
                            Flush Data
                        </a>
                    </div>

                    <div class="card my-2">
                        <div class="card-body">
                            <h5>Helpline Info</h5>
                            <p>{{$helpline->info}}</p>
                        </div>
                    </div>

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
