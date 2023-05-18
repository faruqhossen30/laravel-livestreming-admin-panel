@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gift List</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{route('gift.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                            Create gift
                        </a>
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
                                        Image
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
                                @php
                                    $serial = 1;
                                @endphp
                                @foreach ($gifts as $gift)
                                    <tr>
                                        <td>
                                            {{ $serial++ }}
                                        </td>
                                        <td>
                                            {{ $gift->name }}
                                        </td>
                                        <td>
                                           <img src="{{$gift->img_url}}" alt="">
                                        </td>
                                        <td>
                                            <span class="text-primary text-xs" width="16px"><i data-feather="gift"></i></span>
                                            {{ $gift->diamond }}
                                        </td>
                                        <td>
                                            <a href="{{route('gift.edit', $gift->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a>
                                            <form action="{{route('gift.destroy', $gift->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete gift ?')" class="btn btn-danger btn-xs btn-icon">
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
@push('plugin-styles')
@endpush

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
