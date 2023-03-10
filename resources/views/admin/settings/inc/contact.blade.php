<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="home" class="me-2 "></i>
                    Contact
                </span>
            </div>
            <div class="card-body">
                <div class="input-group  mb-1" >
                    <span class="input-group-text"><i data-feather="home"></i></span>
                    <input type="text" name="address" value="{{ $site->address ?? '#' }}" class="form-control "
                        data-target="#home" />
                </div>
                
                <div class="input-group  mb-1" >
                    <span class="input-group-text"><i data-feather="phone"></i></span>
                    <input type="text" name="phone" value="{{ $site->phone ?? '#' }}" class="form-control "
                        data-target="#phone" />
                </div>
                
                <div class="input-group  mb-1" >
                    <span class="input-group-text"><i data-feather="phone"></i></span>
                    <input type="text" name="mobile" value="{{ $site->mobile ?? '#' }}" class="form-control "
                        data-target="#mobile" />
                </div>
                <div class="input-group  mb-1" >
                    <span class="input-group-text"><i data-feather="phone"></i></span>
                    <input type="text" name="mobile" value="{{ $site->mobile ?? '#' }}" class="form-control "
                        data-target="#mobile" />
                </div>
                
                
                <div class="input-group  mb-1" >
                    <span class="input-group-text"><i data-feather="mail"></i></span>
                    <input type="text" name="email" value="{{ $site->email ?? '#' }}" class="form-control "
                        data-target="#email" />
                </div>

            </div>
        </div>
    </div>
</div>