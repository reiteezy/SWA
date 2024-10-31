<div class="modal fade" id="misConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="assignSignatoriesModalLabel">Transaction Confirmation</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label class="form-label col-sm-2 col-form-label sm-label">SWA ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="swaId" name="swa_id" class="form-control" readonly="readonly">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-2 col-form-label sm-label">Transaction No</label>
                    <div class="col-sm-10">
                        <input type="text" id="transactNo" name="transactNo" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-2 col-form-label sm-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" id="transactDate" name="transactDate" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-2 col-form-label sm-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="text" id="transactAmount" name="transactAmount" class="form-control">
                        <div id="validationMessageNo" style="color: red;"></div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                    id="save-mis-tn">Submit</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>