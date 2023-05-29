@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">updata</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{route('paymentgateway.index')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Paymentgateway List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('paymentgateway.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="forBank" class="form-label">Bank</label>
                            <input name="bank" type="text" value="{{old('bank')}}" class="form-control  @error('bank') is-invalid @enderror"
                                id="forBank" autocomplete="off" placeholder="bank">
                            @error('bank')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fornumber" class="form-label">Type</label>
                            <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
                                <option value="personal">Personal</option>
                                <option value="agent">Agent</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fornumber" class="form-label">number</label>
                            <input name="number" type="text" value="{{old('number')}}" class="form-control  @error('number') is-invalid @enderror"
                                id="fornumber" autocomplete="off" placeholder="number">
                            @error('number')
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
