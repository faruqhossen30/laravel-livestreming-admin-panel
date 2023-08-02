<button type="button" class="btn btn-icon-text btn-outline-success" data-bs-toggle="modal"
    data-bs-target="#giftModal{{ $user->id }}">
    <i data-feather="gift"></i>
    Deposit Gift
</button>


<div class="modal fade" id="giftModal{{ $user->id }}" tabindex="-1" aria-labelledby="giftModal{{ $user->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="giftModal{{ $user->id }}Label">Deposit diamond</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

            <form action="{{ route('deposit.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="row mb-3">
                            <label for="exampleInputDiamond2" class="col-sm-3 col-form-label">Diamond</label>
                            <div class="col-sm-9">
                                <input type="number" name="diamond" class="form-control" id="exampleInputDiamond2" placeholder="10000">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="labelForPaymentMethod" class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                                <select name="payment_method" class="form-control" id="">
                                    <option value="bkash">Bkash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="due">Due</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="labelForFromAccount" class="col-sm-3 col-form-label">From</label>
                            <div class="col-sm-9">
                                <input type="text" name="from_account" class="form-control" id="labelForFromAccount" placeholder="From Account">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="labelFortoAccount" class="col-sm-3 col-form-label">To</label>
                            <div class="col-sm-9">
                                <input type="text" name="to_account" class="form-control" id="labelFortoAccount" placeholder="To Account">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="labelFortransactionAccount" class="col-sm-3 col-form-label">Transaction ID</label>
                            <div class="col-sm-9">
                                <input type="text" name="transaction_id" class="form-control" id="labelFortransactionAccount" placeholder="sdfsdf">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="labelFordescriptionount" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Deposit</button>
                </div>
            </form>
        </div>
    </div>
</div>
