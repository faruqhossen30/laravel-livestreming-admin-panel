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
                        <a href="{{route('agora.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="aperture"></i>
                           Change Agora
                        </a>
                        <a href="{{route('agora.edit', $agora->id)}}" type="button" class="btn btn-sm btn-danger btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="delete"></i>
                           Clear Data
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th>Title</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>Time</td>
                                    <td>: {{ $agora->created_at->format('d M Y, h:i:s A') }}</td>
                                </tr>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>App Name</td>
                                    <td>: {{$agora->project_name}}</td>
                                </tr>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>Ap ID</td>
                                    <td>: {{$agora->app_id}}</td>
                                </tr>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>Ap Certificate</td>
                                    <td>: {{$agora->app_certificate}}</td>
                                </tr>
                            </tbody>
                        </table>
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
