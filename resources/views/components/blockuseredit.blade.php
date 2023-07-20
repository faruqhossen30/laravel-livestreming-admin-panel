<button type="button" class="btn btn-primary btn-icon btn-xs" data-bs-toggle="modal"
    data-bs-target="#exampleModal{{ $attributes['id'] }}">
    <i data-feather="edit"></i>
</button>


<div class="modal fade" id="exampleModal{{ $attributes['id'] }}" tabindex="-1"
    aria-labelledby="exampleModal{{ $attributes['id'] }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal{{ $attributes['id'] }}Label">Block User details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{route('blockuser.update', $attributes['id'])}}" method="post">
                @csrf
                @method('PUt')
                <div class="modal-body">
                    <label for="forDescription">Description</label>
                    <textarea name="description" id="Description" class="form-control" cols="30" rows="10">{{$attributes['value']}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
