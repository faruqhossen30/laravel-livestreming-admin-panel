@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead class="mt-4">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                ordering: true,
                searchBuilder: {
                    columns: [0,1,2]
                },
                ajax: {
                    url: "{{ URL::to('/admin/user') }}"
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    }, {
                        data: 'name',
                        name: 'name',
                    }, {
                        data: 'mobile',
                        name: 'mobile',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'created_at',
                        name: 'date',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]
            });

            $('#example').on('click', '.deleteButton', function() {
                var id = $(this).attr('id');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var deleteConfirm = confirm("Are you sure?");
                var url = '{{ route('adminuser.delete', ':id') }}';
                url = url.replace(':id', id);

                console.log(id);
                console.log(url);

                if (deleteConfirm == true) {
                    // AJAX request
                    $.ajax({
                        // url: "{{ route('user.destroy', '+id+') }}",
                        url: url,
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN
                        },
                        success: function(response) {
                            location.reload();
                        }


                    });
                }

            });
        });
    </script>
@endpush
