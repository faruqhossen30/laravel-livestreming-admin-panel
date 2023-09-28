@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Withdraw Setting</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{route('withdrawsetting.edit', $withdrawsetting->id)}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="aperture"></i>
                           Change Withdraw Setting
                        </a>
                        <a href="{{route('withdrawsetting.edit', $withdrawsetting->id)}}" type="button" class="btn btn-sm btn-danger btn-icon-text">
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
                                    <td>Status</td>
                                    <td>: {{$withdrawsetting->status }}</td>
                                </tr>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>Diamond Rate</td>
                                    <td>: {{$withdrawsetting->diamond_rate}}%</td>
                                </tr>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>Normal Withdraw Commission</td>
                                    <td>: {{$withdrawsetting->normar_widthraw_commission}}%</td>
                                </tr>
                                <tr>
                                    {{-- <th>1</th> --}}
                                    <td>Urgent Withdraw Commission</td>
                                    <td>: {{$withdrawsetting->urgent_widthraw_commission}}%</td>
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
