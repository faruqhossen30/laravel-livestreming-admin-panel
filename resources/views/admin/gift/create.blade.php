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
                        <a href="{{route('gift.index')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Gift List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('gift.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label">Gift Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputname1"
                                autocomplete="off" placeholder="Heart">
                        </div>
                        <div class="mb-3">
                            <label for="diamond" class="form-label">Diamond</label>
                            <input name="diamond" type="number" value="{{old('diamond')}}" class="form-control @error('diamond') is-invalid @enderror"
                                id="diamond" autocomplete="off" placeholder="10000">
                            @error('diamond')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="commission" class="form-label">Commission</label>
                            <input name="commission" type="number" value="{{old('commission')}}" class="form-control @error('commission') is-invalid @enderror"
                                id="commission" autocomplete="off" placeholder="10000">
                            @error('commission')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="img_url" class="form-label">img_url</label>
                            <input name="img_url" type="text" value="{{old('img_url')}}" class="form-control @error('img_url') is-invalid @enderror"
                                id="img_url" autocomplete="off" placeholder="www.google.com">
                            @error('img_url')
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
