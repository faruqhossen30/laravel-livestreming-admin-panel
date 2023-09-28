<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="gift" class="me-2 "></i>
                    Widthdraw Rate
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('withdrawsettins.store') }}" method="post">
                    @csrf
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">On/Off</i></span>
                        <Select class="form-control" name="status">
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </Select>
                    </div>
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">Withdraw Rate</i></span>
                        <input type="number" name="diamond_rate" value="{{$withdrawsetting->diamond_rate}}" class="form-control " />
                    </div>
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">Normal Withdraw Commission</i></span>
                        <input type="number" name="normar_widthraw_commission" value="{{$withdrawsetting->normar_widthraw_commission}}" class="form-control " />
                    </div>
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">Urgent Withdraw Commission</i></span>
                        <input type="number" name="urgent_widthraw_commission" value="{{$withdrawsetting->urgent_widthraw_commission}}" class="form-control " />
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
