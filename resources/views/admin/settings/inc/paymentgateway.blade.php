<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="gift" class="me-2 "></i>
                    paymentgateway
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('paymentgateway.store') }}" method="post">
                    @csrf
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">Bank</i></span>
                        <input type="text" name="bank" value="" class="form-control " />
                    </div>
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">type</i></span>
                        <input type="text" name="type" value="" class="form-control " />
                    </div>
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">number</i></span>
                        <input type="text" name="number" value="" class="form-control " />
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
