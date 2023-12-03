@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Gift</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('withdrawsetting.index') }}" type="button"
                            class="btn btn-sm btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="list"></i>
                            Withdrawsetting Setting
                        </a>
                    </div>
                    <hr>

                    <form action="{{ route('withdrawsetting.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label">Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="1" @if ($withdrawsetting->status == 1 ) selected @endif>Active</option>
                                <option value="0" @if ($withdrawsetting->status == 0 ) selected @endif>Deactive</option>
                            </select>
                        </div>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span> <br>
                        @enderror

                        <div class="mb-3">
                            <label for="diamond_rate" class="form-label">Diamond Rate</label>
                            <input name="diamond_rate" type="number" class="form-control @error('diamond_rate') is-invalid @enderror"
                                id="diamond_rate" autocomplete="off" placeholder="0.01" step="0.01" value="{{$withdrawsetting->diamond_rate}}">
                            @error('diamond_rate')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="normar_widthraw_commission" class="form-label">Normal Width Commission</label>
                            <input name="normar_widthraw_commission" type="number" class="form-control @error('normar_widthraw_commission') is-invalid @enderror"
                                id="normar_widthraw_commission" autocomplete="off" placeholder="10%" step="0.01" value="{{$withdrawsetting->normar_widthraw_commission}}">
                            @error('normar_widthraw_commission')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="urgent_widthraw_commission" class="form-label">Urgent Withdraw Commission</label>
                            <input name="urgent_widthraw_commission" type="number" class="form-control @error('urgent_widthraw_commission') is-invalid @enderror"
                                id="urgent_widthraw_commission" autocomplete="off" placeholder="20%" step="0.01" value="{{$withdrawsetting->urgent_widthraw_commission}}">
                            @error('urgent_widthraw_commission')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="minimum_widthraw" class="form-label">Minum Withdraw Diamond</label>
                            <input name="minimum_widthraw" type="number" class="form-control @error('minimum_widthraw') is-invalid @enderror"
                                id="minimum_widthraw" autocomplete="off" placeholder="1,000" step="0.01" value="{{$withdrawsetting->minimum_widthraw}}">
                            @error('minimum_widthraw')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="maximum_widthraw" class="form-label">Maximum Withdraw Diamond</label>
                            <input name="maximum_widthraw" type="number" class="form-control @error('maximum_widthraw') is-invalid @enderror"
                                id="maximum_widthraw" autocomplete="off" placeholder="50,000" step="0.01" value="{{$withdrawsetting->maximum_widthraw}}">
                            @error('maximum_widthraw')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="next_widthraw" class="form-label">Next Withdray Day</label>
                            <input name="next_widthraw" type="number" class="form-control @error('next_widthraw') is-invalid @enderror"
                                id="next_widthraw" autocomplete="off" placeholder="50,000" step="0.01" value="{{$withdrawsetting->next_widthraw}}">
                            @error('next_widthraw')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Description</h4>
                                    <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{$withdrawsetting->description}}</textarea>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/ace-builds/ace.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/ace-builds/theme-chaos.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('admin/assets/js/simplemde.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ace.js') }}"></script>
@endpush
