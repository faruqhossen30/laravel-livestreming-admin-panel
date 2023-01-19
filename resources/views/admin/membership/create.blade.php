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
                        <a href="{{ route('membership.index') }}" type="button"
                            class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Membership List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('membership.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label">Label Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" id="exampleInputname1"
                                autocomplete="off" placeholder="Name (VIP )">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span> <br>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputprice1" class="form-label">Price</label>
                            <input name="price" type="number" value="{{ old('price') }}"
                                class="form-control  @error('price') is-invalid @enderror" id="exampleInputprice1"
                                autocomplete="off" placeholder="price">

                            @error('price')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <h6 class="card-title">Image</h6>
                            <input type="file" id="myDropify" name="icon">
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
    
    <link href="{{ asset('admin/assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush

@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/dropify.js') }}"></script>
@endpush