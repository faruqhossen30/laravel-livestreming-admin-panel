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
                        <a href="{{ route('user.index') }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            User List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('user.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="forName" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" id="forName" autocomplete="off"
                                placeholder="Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <x-countryselect />
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Country code</label>
                            <x-countryselect />
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="forMobile" class="form-label">Mobile number <span class="text-secondary">(Don't use 0)</span></label>
                            <input type="text" name="number" value="{{ old('number') }}"
                                class="form-control @error('number') is-invalid @enderror" id="fornumber" autocomplete="off"
                                placeholder="192000000000">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="text" value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                autocomplete="off" placeholder="*****">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>

                        <button type="submit" id="submitBUtton" class="btn btn-primary me-2">Submit</button>
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
