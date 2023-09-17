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
                    <div class="d-flex justify-content-between">
                        <form action="" method="get" class="d-flex">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <input type="text" class="form-control mx-1" name="username" placeholder="Mobile">
                            <select name="" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <div>
                                <button type="button" class="btn btn-primary btn-icon-text mx-1">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Diamond
                                    </th>
                                    <th>
                                        To
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($deposits as $item)
                                    <tr>
                                        <td>
                                            {{$deposits->firstItem() + $loop->index}}
                                            {{-- {{$serial++}} --}}
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            {{ $item->diamond }}
                                        </td>
                                        <td>
                                            {{-- {{ $item->user->name }} --}}
                                        </td>
                                        <td>
                                            {{ $item->to_account }}
                                        </td>
                                        <td class="text-muted">
                                            <span class="d-flex align-items-center">
                                            {{ $item->created_at->format('d M Y') }}</span>
                                        <span class="d-flex align-items-center px-1"> <i class="btn-icon-prepend"
                                                data-feather="clock" style="width:12px"></i>
                                            {{ $item->created_at->format('g:i A') }}</span>
                                        </td>
                                        <td>
                                            @if ($item->status == false)
                                            <a href="{{route('deposit.edit', $item->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a>
                                            <form action="{{route('deposit.destroy', $item->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete label ?')" class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                            @else
                                            <span><i data-feather="check-circle" class="text-success"></i></span>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{$deposits->links()}}
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
