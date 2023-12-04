@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Withdraws</li>
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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name</th>
                                    <th> ID</th>
                                    <th> Taka</th>
                                    <th> Diamond</th>
                                    <th> Type</th>
                                    <th> Bank</th>
                                    <th> Account</th>
                                    <th> Status</th>
                                    <th> Time</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraws as $item)
                                    <tr>
                                        <td>
                                            {{ $withdraws->firstItem() + $loop->index }}
                                            {{-- {{$serial++}} --}}
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            {{ $item->user->id }}
                                        </td>
                                        <td>
                                            ৳ {{ $item->amount }}
                                        </td>
                                        <td>
                                            {{ $item->diamond }}
                                        </td>
                                        <td>
                                            {{ $item->withdraw_type }}
                                        <td>
                                            {{ $item->payment_method }}
                                        </td>
                                        <td>
                                            {{ $item->account }}
                                        </td>
                                        @if ($item->status == 'pending')
                                            <td class="text-warning"> {{ ucwords($item->status) }} </td>
                                        @endif
                                        @if ($item->status == 'cancle')
                                            <td class="text-danger"> {{ ucwords($item->status) }} </td>
                                        @endif
                                        @if ($item->status == 'complete')
                                            <td class="text-success"> {{ ucwords($item->status) }} </td>
                                        @endif
                                        <td class="text-muted" style="font-size: 10px">
                                            <span>
                                                {{ $item->created_at->format('d M Y') }}</span>
                                            <span class="px-1"> <i class="btn-icon-prepend" data-feather="clock"
                                                    style="width:12px"></i>
                                                {{ $item->created_at->format('g:i A') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('withdraw.show', $item->id) }}" type="button"
                                                class="btn btn-success btn-icon btn-xs">
                                                <i data-feather="eye"></i>
                                            </a>
                                            {{-- <form action="{{route('withdraw.destroy', $item->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete label ?')" class="btn btn-danger btn-xs btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form> --}}
                                            {{-- @if ($item->status == false)

                                            @else
                                            <span><i data-feather="check-circle" class="text-success"></i></span>
                                            @endif --}}

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $withdraws->links() }}
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
