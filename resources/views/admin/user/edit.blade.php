@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </nav>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">


                    <div class="d-flex flex-column">
                        <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                            <div class="me-3">
                                <img src="{{ $user->avatar ? asset('uploads/avatar/' . $user->avatar) : 'https://via.placeholder.com/35x35' }}"
                                    class="rounded-circle" style="width: 50px;height:50px;object-fit:cover" alt="user">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="fw-normal text-body mb-1">{{$user->name}} </h6>
                                    <p class="text-muted tx-12">
                                        @if ($user->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Deactive</span>
                                        @endif
                                    </p>
                                </div>
                                <p class="text-muted tx-13">{{ $user->created_at->format('d M Y, h:i:s A') }}</p>
                            </div>
                        </a>
                    </div>



                    <div class="my-2 d-grid gap-2">
                        <x-sendgiftmodal :user="$user" id="{{ $user->id }}" />

                        <a href="{{ route('user.stoplive', $user->id) }}" type="button"
                            class="btn btn-icon-text btn-outline-danger">
                            <i class="btn-icon-prepend" data-feather="video-off"></i>
                            Stop Live
                        </a>


                        <button type="button" class="btn btn-icon-text btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="btn-icon-prepend" data-feather="unlock"></i>
                            Change Password
                        </button>


                        @if ($user->status)
                            <a onclick="return confirm('Sure ! Stop user ?')" href="{{ route('user.deactive', $user->id) }}"
                                type="button" class="btn btn-icon-text btn-outline-danger">
                                <i class="btn-icon-prepend" data-feather="user-x"></i>
                                Deactive User
                            </a>
                        @else
                            <a onclick="return confirm('Sure ! Active user ?')" href="{{ route('user.active', $user->id) }}"
                                type="button" class="btn btn-icon-text btn-outline-success">
                                <i class="btn-icon-prepend" data-feather="user-check"></i>
                                Active User
                            </a>
                        @endif

                        @if ($blockuser == null)
                            <form action="{{ route('user.deviceblock', $user->id) }}" method="post" class="d-grid">
                                @csrf
                                <button onclick="return confirm('Sure ! Active user ?')" type="submit"
                                    class="btn btn-icon-text btn-outline-danger">
                                    <i class="btn-icon-prepend" data-feather="smartphone"></i>
                                    Device Block
                                </button>
                            </form>
                        @else
                            <form action="{{ route('user.deviceunblock', $user->id) }}" method="post" class="d-grid">
                                @csrf
                                <button onclick="return confirm('Sure ! Active user ?')" type="submit"
                                    class="btn btn-icon-text btn-outline-success">
                                    <i class="btn-icon-prepend" data-feather="smartphone"></i>
                                    Device Unblock
                                </button>
                            </form>
                        @endif
                    </div>


                    <!-- Button trigger modal -->







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
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">


                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-start align-items-center">
                            {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                            <span><i data-feather="user"></i></span>
                            <span class="px-2"> ID : {{ $user->id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-start align-items-center">
                            {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                            <span><i data-feather="user"></i></span>
                            <span class="px-2"> Name : {{ $user->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-start align-items-center">
                            {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                            <span><i data-feather="user"></i></span>
                            <span class="px-2"> Mobile : {{ $user->mobile }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-start align-items-center">
                            {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
                            <span><i data-feather="user"></i></span>
                            <span class="px-2"> Created : {{ $user->created_at->format('d M Y, h:i:s A') }}</span>
                        </li>
                    </ul>

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
