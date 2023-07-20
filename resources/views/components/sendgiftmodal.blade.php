<button type="button" class="btn btn-primary btn-icon btn-xs" data-bs-toggle="modal"
    data-bs-target="#giftModal{{ $attributes['id'] }}">
    <i data-feather="gift"></i>
</button>


<div class="modal fade" id="giftModal{{ $attributes['id'] }}" tabindex="-1"
    aria-labelledby="giftModal{{ $attributes['id'] }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="giftModal{{ $attributes['id'] }}Label">Block User details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

                <div class="modal-body">
                    <form action="{{route('deposit.store')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <p>Id: 123</p>
                                <p>Name: Jamal Mia</p>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="user_id" value="1">
                                <label for="forDimondInput">Diamond</label>
                                <input type="number" name="diamond" class="form-control">
                                <div>
                                    <label for="">Payment Method</label>
                                    <select name="payment_method" class="form-control" id="">
                                        <option value="bkash">Bkash</option>
                                        <option value="rocket">Rocket</option>
                                        <option value="due">Due</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="my-2">
                            <button type="submit" class="btn btn-success btn-sm">Deposit</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
