@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gift Transction List</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Sender
                                    </th>
                                    <th>
                                        Receiver
                                    </th>
                                    <th>
                                        Diamond
                                    </th>
                                    <th>Commission</th>
                                    <th>
                                        Time
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>
                                            {{$transactions->firstItem() + $loop->index}}
                                        </td>
                                        <td>
                                            {{ $transaction->sender->name }}-{{$transaction->sender_id}}
                                        </td>
                                        <td>
                                            {{ $transaction->receiver->name }} {{$transaction->receiver_id}}
                                        </td>
                                        <td>
                                            {{ $transaction->diamond }}
                                        </td>
                                        <td>
                                            {{ $transaction->commission }}
                                        </td>
                                        <td>
                                            {{ $transaction->created_at }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{route('gift.edit', $transaction->id)}}" type="button" class="btn btn-primary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </a> --}}
                                            <form action="{{route('transaction.destroy', $transaction->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure ! Delete transaction ?')" class="btn btn-danger btn-xs btn-icon">
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
                        {{$transactions->links()}}
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
