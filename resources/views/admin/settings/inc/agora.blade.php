<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="box" class="me-2 "></i>
                    Agor API Credential
                </span>
            </div>
            <form action="{{route('agora.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="input-group  mb-1">
                        <span class="input-group-text"><i data-feather="lock"></i><span class="ml-1">APP
                                ID</span></span>
                        <input type="text" name="appid" value="" class="form-control " data-target="#home" />
                    </div>

                    <div class="input-group  mb-1">
                        <span class="input-group-text"><i data-feather="lock"></i>TOKEN</span>
                        <input type="text" name="token" value="" class="form-control "
                            data-target="#phone" />
                    </div>

                    <div class="input-group  mb-1">
                        <span class="input-group-text"><i data-feather="lock"></i>Chanel</span>
                        <input type="text" name="chanel" value="" class="form-control" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="save"></i>
                        Save
                    </button>


                </div>
            </form>
        </div>
    </div>
</div>
