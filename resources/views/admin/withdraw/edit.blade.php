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
                        <a href="{{route('deposit.index')}}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Deposit List
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-12 py-2">
                            <ul class="list-group">
                                <li class="list-group-item">Name: {{$deposit->user->name}}</li>
                                <li class="list-group-item">Method: {{$deposit->method}}</li>
                                <li class="list-group-item">From Account: {{$deposit->from_account}}</li>
                                <li class="list-group-item">Received Account: {{$deposit->to_account}}</li>
                                <li class="list-group-item">Transction ID: {{$deposit->transaction_id}}</li>
                                <li class="list-group-item">Time: {{$deposit->transaction_id}}</li>
                              </ul>
                        </div>
                      </div>


                    <form action="{{ route('deposit.update', $deposit->id) }}" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input name="amount" type="number" value="{{$deposit->amount}}" class="form-control @error('amount') is-invalid @enderror"
                                id="amount" autocomplete="off" placeholder="10000">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Approve </button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

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
