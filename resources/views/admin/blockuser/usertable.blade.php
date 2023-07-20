@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->user_id}}</td>
                                        <td>{{$user->user->name}}</td>
                                        {{-- <td> {{ Str::limit($user->name, 25, ' (...)')}}</td> --}}
                                        <td><span class="text-muted">{{$user->created_at->format('d M Y, h:i:s A')}}</span></td>
                                        <td>
                                            {{-- <a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="eye"></i>
                                            </a> --}}
                                            <x-blockuseredit name='button' id="{{$user->id}}" value="{{$user->description}}"/>
                                            <x-blockusereditview name='button' id="{{$user->id}}" value="{{$user->description}}" />

                                        </td>
                                        <td>
                                            <form action="{{ route('user.deviceunblock', $user->user_id) }}" method="post">
                                                @csrf
                                                <button onclick="return confirm('Sure ! Active user ?')" type="submit"
                                                    class="btn btn-sm btn-icon-text btn-outline-danger">
                                                    <i class="btn-icon-prepend" data-feather="smartphone"></i>
                                                    UnBlock
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
@endpush
