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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td> {{ Str::limit($user->name, 25, ' (...)') }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>
                                            @if ($user->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td><span
                                                class="text-muted">{{ $user->created_at->format('d M Y, h:i:s A') }}</span>
                                        </td>
                                        <td>

                                            {{-- <button type="button" class="btn btn-success btn-sm">Gift</button> --}}
                                            {{-- <button type="button" class="btn btn-success btn-sm">Block</button> --}}
                                            {{-- <button type="button" class="btn btn-success btn-sm">Device Block</button> --}}

                                            <x-sendgiftmodal id="{{ $user->id }}" value={{ $user }} />
                                            <a href="{{ route('user.edit', $user->id) }}" type="button"
                                                class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="eye"></i>
                                            </a>


                                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete user ?')"
                                                    class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
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
    <script src="{{ asset('admin/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>
@endpush
