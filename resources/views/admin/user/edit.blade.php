@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update / User</li>
        </ol>
    </nav>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Password Change successfull !</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
      </div>
    @endif

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('user.index') }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Lable List
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('user.update', $user->id) }}" method="POST" class="forms-sample">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label">Gift Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                id="exampleInputname1" autocomplete="off" placeholder="Heart">
                        </div>
                        <div class="mb-3">
                            <label for="diamond" class="form-label">Diamond</label>
                            <input name="diamond" type="number" value="{{ $user->diamond }}"
                                class="form-control @error('diamond') is-invalid @enderror" id="diamond"
                                autocomplete="off" placeholder="10000">
                            @error('diamond')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="commission" class="form-label">Commission</label>
                            <input name="commission" type="number" value="{{ $user->commission }}"
                                class="form-control @error('commission') is-invalid @enderror" id="commission"
                                autocomplete="off" placeholder="10000">
                            @error('commission')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="img_url" class="form-label">img_url</label>
                            <input name="img_url" type="text" value="{{ $user->img_url }}"
                                class="form-control @error('img_url') is-invalid @enderror" id="img_url"
                                autocomplete="off" placeholder="www.google.com">
                            @error('img_url')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>User Control</h5>
                    <hr>
                    <div class="my-2">
                        <a href="{{ route('user.stoplive', $user->id) }}" type="button"
                            class="btn btn-icon-text btn-outline-danger">
                            <i class="btn-icon-prepend" data-feather="video-off"></i>
                            Stop Live
                        </a>
                    </div>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-icon-text btn-outline-warning" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="btn-icon-prepend" data-feather="unlock"></i>
                        Change Password
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('user.changepassword', $user->id) }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="text" name="password" class="form-control"
                                                id="exampleInputname1" autocomplete="off" placeholder="New password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
