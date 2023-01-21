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
                    <div>
                        <a href="{{route('paymentgateway.create')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                            Add Payment Gateway
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
                                        Number
                                    </th>
                                    <th>
                                        Bank
                                    </th>
                                    <th>
                                        Type
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
                                @foreach ($list as $item)
                                    <tr>
                                        <td>
                                            {{ $serial++ }}
                                        </td>
                                        <td>
                                            {{ $item->number }}
                                        </td>
                                        <td>
                                            {{ $item->bank }}
                                        </td>
                                        <td>
                                            {{ $item->type }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{route('paymentgateway.edit', $item->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a> --}}
                                            <form action="{{route('paymentgateway.destroy', $item->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete label ?')" class="btn btn-danger btn-xs btn-icon">
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
