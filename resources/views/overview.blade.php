@extends('admin.layout.master')

@push('plugin-styles')
  <link href="{{ asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Dashboard</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
      <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span>
      <input type="text" class="form-control border-primary bg-transparent">
    </div>
    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="printer"></i>
      Print
    </button>
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Download Report
    </button>
  </div>
</div>


<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-2 d-flex align-items-center justify-content-start" style="background-color: #5cb85c;">

                            <div class="d-flex justify-content-start align-items-center">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                    <i data-feather="gift" class="text-success"></i>
                                </div>
                                <div class="ms-2">
                                    <p class="text-white fs-3">{{ $totalDiamond }}</p>
                                    <p class="text-white fs-6">Total Diamond</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-2 d-flex align-items-center justify-content-start bg-warning" >

                            <div class="d-flex justify-content-start align-items-center">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                    <i data-feather="gift" class="text-warning"></i>
                                </div>
                                <div class="ms-2">
                                    <p class="text-white fs-3">{{ $minusDiamond }}</p>
                                    <p class="text-white fs-6">Minus Diamond</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-2 d-flex align-items-center justify-content-start bg-primary" >

                            <div class="d-flex justify-content-start align-items-center">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px;height:60px;">
                                    <i data-feather="percent" class="text-primary"></i>
                                </div>
                                <div class="ms-2">
                                    <p class="text-white fs-3">{{ $totalComission }}</p>
                                    <p class="text-white fs-6">Today Comission</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>


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
