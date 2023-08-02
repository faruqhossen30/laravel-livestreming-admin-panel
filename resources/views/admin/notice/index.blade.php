@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb d-flex justify-content-between align-items-center">
        <ol class="breadcrumb pt-1">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Notice</li>
        </ol>
        <a href="{{ route('notice.create') }}" type="button" class="btn btn-xs btn-outline-primary  btn-icon-tex">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Notice</a>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        <Title></Title>
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$notice->title}}</td>
                                        <td>{{$notice->description}}</td>
                                        <td>{{$notice->created_at}}</td>
                                        <td>
                                            <a href="{{route('notice.edit', $notice->id)}}" type="button" class="btn btn-success btn-icon btn-xs">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="{{route('notice.edit', $notice->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a>
                                            <form action="{{route('notice.destroy', $notice->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete notice ?')" class="btn btn-danger btn-xs btn-icon">
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
