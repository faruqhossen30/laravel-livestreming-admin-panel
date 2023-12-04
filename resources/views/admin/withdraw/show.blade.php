@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Withdraw</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('withdraw.index') }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Withdraw List
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-12 py-2">
                            <ul class="list-group">
                                <li class="list-group-item">ID: {{ $withdraw->user->id }}</li>
                                <li class="list-group-item">Name: {{ $withdraw->user->name }}</li>
                                <li class="list-group-item">Taka: ৳ {{ $withdraw->amount }}</li>
                                <li class="list-group-item">Method: {{ $withdraw->payment_method }}</li>
                                <li class="list-group-item">Type: {{ $withdraw->withdraw_type }}</li>
                                <li class="list-group-item">Account Number: {{ $withdraw->account }}</li>
                                <li class="list-group-item">Diamond: {{ $withdraw->diamond }}</li>
                                <li class="list-group-item">Diamond: Commission {{ $withdraw->diamond_commission }}</li>
                                <li class="list-group-item">Total Diamond: {{ $withdraw->total_diamond }}</li>

                                <li class="list-group-item">Withdraw Rate: {{ $withdraw->withdraw_rate }}
                                    {{ intval($withdraw->withdraw_rate) * 1000 }}</li>
                                <li class="list-group-item">Withdraw Commission: {{ $withdraw->withdraw_commission }}%</li>
                                <li class="list-group-item">Time:

                                    <span class="px-1"> <i class="btn-icon-prepend" data-feather="clock"
                                            style="width:12px"></i>
                                        {{ $withdraw->created_at->format('g:i A') }}
                                    </span>
                                    <span>
                                        {{ $withdraw->created_at->format('d M Y') }}
                                    </span>
                                </li>
                                @if ($withdraw->status == 'complete')
                                    <li class="list-group-item text-success">Status: {{ $withdraw->status }}</li>
                                @endif
                                @if ($withdraw->status == 'cancle')
                                    <li class="list-group-item text-danger">Status: {{ $withdraw->status }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    @if ($withdraw->status == 'pending')
                        <form action="{{ route('withdraw.update', $withdraw->id) }}" method="POST" class="forms-sample">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <select class="form-control" name="status" id="">
                                    <option @if ($withdraw->status == 'pending') selected @endif value="pending">Pending
                                    </option>
                                    <option @if ($withdraw->status == 'complete') selected @endif value="complete">Complete
                                    </option>
                                    <option @if ($withdraw->status == 'cancle') selected @endif value="cancle">Cancle</option>
                                </select>
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="note" class="form-label">Note (Optional)</label>
                                <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Approve </button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>
                    @endif



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
