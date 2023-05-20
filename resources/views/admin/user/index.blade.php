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
                    <div class="d-flex justify-content-between">
                        <form action="" method="get" class="d-flex">
                            <input type="text" class="form-control" name="id" placeholder="ID Search">
                            <input type="text" class="form-control mx-1" name="username" placeholder="Mobile">
                            <select name="" id="" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                            </select>
                            <div>
                                <button type="button" class="btn btn-primary btn-icon-text mx-1">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- <div>
                        <a href="{{route('gift.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                            Create gift
                        </a>
                    </div> --}}
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        S.N
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Diamond
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{$users->firstItem() + $loop->index}}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                           {{$user->mobile}}
                                        </td>
                                        <td>
                                            <span class="text-primary text-xs" width="16px"><i data-feather="gift"></i></span>
                                            {{ $user->diamond }}
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-success btn-sm">Gift</button>
                                            <button type="button" class="btn btn-success btn-sm">Block</button>
                                            <button type="button" class="btn btn-success btn-sm">Device Block</button>
                                            <a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="eye"></i>
                                            </a>

                                            <a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a>

                                            <form action="{{route('user.destroy', $user->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete user ?')" class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{$users->links()}}
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
