<button type="button" class="btn btn-primary btn-icon btn-xs" data-bs-toggle="modal" data-bs-target="#viewModal{{$attributes['id']}}">
    <i data-feather="eye"></i>
  </button>


  <div class="modal fade" id="viewModal{{$attributes['id']}}" tabindex="-1" aria-labelledby="viewModal{{$attributes['id']}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewModal{{$attributes['id']}}Label">Block User Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            {{$attributes['value']}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
