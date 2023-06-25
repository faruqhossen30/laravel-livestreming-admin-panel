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

<div class="row">
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
                    <h5>{{$activUser}}</h5>
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
                    <h5>{{$deactiveUser}}</h5>
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
                    <h5>{{$todayUser}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

@endsection

@push('plugin-scripts')
  <script src="{{ asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>
@endpush
