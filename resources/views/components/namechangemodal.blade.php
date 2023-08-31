<button type="button" class="btn btn-icon-text btn-outline-success" data-bs-toggle="modal"
    data-bs-target="#nameChange{{ $user->id }}">
    <i data-feather="user"></i>
   Name Change
</button>


<div class="modal fade" id="nameChange{{ $user->id }}" tabindex="-1" aria-labelledby="nameChange{{ $user->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nameChange{{ $user->id }}Label">Name Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

            <form action="{{ route('user.changeName', $user->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="row mb-3">
                            <label for="forNameInput" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="forNameInput" >
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Update Name</button>
                </div>
            </form>
        </div>
    </div>
</div>
