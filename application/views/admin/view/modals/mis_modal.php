<div class="modal fade" id="misConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="assignSignatoriesModalLabel">Transaction Confirmation</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>SWA ID</label>
                    </span>
                    <input type="text" id="swaId" name="swa_id" class="form-control" readonly="readonly">
                </div>
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>Transaction Number</label>
                    </span>
                    <input type="text" id="transactNo" name="transactNo" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>Date</label>
                    </span>
                    <input type="date" id="transactDate" name="transactDate" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>Amount</label>
                    </span>
                    <input type="text" id="transactAmount" name="transactAmount" class="form-control">
                    <div id="validationMessageNo" style="color: red;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="save-mis-tn">Submit</button>
            </div>
        </div>
    </div>
</div>