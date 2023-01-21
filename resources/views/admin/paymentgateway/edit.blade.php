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
                        <a href="{{route('label.index')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Lable List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('label.update', $label->id) }}" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label">Label Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputname1"
                                autocomplete="off" placeholder="Name (Optional )">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputlabel1" class="form-label">Label</label>
                            <input name="label" type="text" value="{{$label->label}}" class="form-control  @error('label') is-invalid @enderror"
                                id="exampleInputlabel1" autocomplete="off" placeholder="label">

                            @error('label')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="diamond" class="form-label">diamond</label>
                            <input name="diamond" type="number" value="{{$label->diamond}}" class="form-control @error('diamond') is-invalid @enderror"
                                id="diamond" autocomplete="off" placeholder="10000">
                            @error('diamond')
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
