@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Today's Transction</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Comission: {{$totalComission}}</span>
                        <span>Total Transaction: {{count($transactions)}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 30%"> Sender </th>
                                    <th style="width: 30%"> Receiver </th>
                                    <th style="width: 10%"> Diamond </th>
                                    <th style="width: 10%"> Commission</th>
                                    <th style="width: 10%"> Time </th>
                                    {{-- <th> Action </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial=0;
                                @endphp
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{$serial++}}</td>
                                        <td>{{ $transaction['sender'] }}</td>
                                        <td>{{ $transaction['receiver'] }}</td>
                                        <td>{{ $transaction['diamond'] }}</td>
                                        <td>{{ $transaction['commission'] }}</td>
                                        {{-- <td>{{ $transaction['createdAt'] }}</td> --}}
                                        <td>{{ \Carbon\Carbon::parse($transaction['createdAt'])->diffForHumans() }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="py-2">
                        {{$transactions->links()}}
                    </div> --}}
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
