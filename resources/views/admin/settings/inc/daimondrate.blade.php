<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="gift" class="me-2 "></i>
                    Daimond rate
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.daimondrate') }}" method="post">
                    @csrf
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">৳</i></span>
                        <input type="number" step="0.01" name="daimond_rate" value="{{ option('daimond_rate') }}" class="form-control " />
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="save"></i>
                        Save
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
