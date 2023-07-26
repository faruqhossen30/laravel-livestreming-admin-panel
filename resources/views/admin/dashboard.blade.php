@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Dashboard</h4>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center ">
                                        <span class="fs-1"><i data-feather="users"></i></span>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <h5>Total User</h5>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <h5>{{ $activUser }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center ">
                                        <span class="fs-1"><i data-feather="user-x"></i></span>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <h5>Deactive User</h5>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <h5>{{ $deactiveUser }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center ">
                                        <span class="fs-1"><i data-feather="user-plus"></i></span>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <h5>Today Create</h5>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <h5>{{ $todayUser }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div> --}}

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body p-2 d-flex align-items-center justify-content-start bg-success">

                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                        <i data-feather="user-check" class="text-success"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-white fs-3">{{ $activUser }}</p>
                                        <p class="text-white fs-6">Active Users</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body p-2 d-flex align-items-center justify-content-start bg-warning">

                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                        <i data-feather="user-minus" class="text-warning"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-white fs-3">{{ $deactiveUser }}</p>
                                        <p class="text-white fs-6">Deactive Users</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body p-2 d-flex align-items-center justify-content-start bg-danger">

                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                        <i data-feather="smartphone" class="text-danger"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-white fs-3">{{ $blockUsers }}</p>
                                        <p class="text-white fs-6">Device Block</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body p-2 d-flex align-items-center justify-content-start bg-primary">

                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                        <i data-feather="user" class="text-primary"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-white fs-3">{{ $todayUser }}</p>
                                        <p class="text-white fs-6">Today Users</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body p-2" style="background-color: #21ABF5;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="card-body p-2">
                                        <img class="rounded-circle" src="{{ asset('admin/assets/images/user.png') }}"
                                            style="width: 60px;height:60px;border:1px solid #fff">
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-white fs-3">{{ $todayUser }}</p>
                                        <p class="text-white fs-6">Today Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>
@endpush
