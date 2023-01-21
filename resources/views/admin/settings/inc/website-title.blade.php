<form action="{{ route('admin.setting.websitename') }}" method="post">
    @csrf
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <span> <i data-feather="chrome" class="me-2 "></i>
                        Website Name
                    </span>
                </div>
                <div class="card-body">
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">Website Name:</span>
                        <input type="text" name="website_title" value="{{ option('website_title') }}"
                            class="form-control @error('website_title') is-invalid @enderror" />
                    </div>
                    @error('website_title')
                        <span class="text-danger">{{ $message }}</span> <br>
                    @enderror

                    <button type="submit" class="btn btn-primary btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="save"></i>
                        Save
                    </button>
                    {{-- @include('admin.settings.inc.social-media') --}}

                </div>
            </div>
        </div>
    </div>
</form>