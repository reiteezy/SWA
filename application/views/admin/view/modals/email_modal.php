<div class="modal fade" id="emailSupplierModal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 bg-light">
                <h5 class="modal-title" id="composemodalTitle">Compose Email </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="emailForm" action="">
                    <div>
                        <div class="mb-3 position-relative">
                            <input type="text" class="form-control email-compose-input" id="from" name="from" value=""
                                placeholder="From" />
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="text" class="form-control email-compose-input" id="to" name="to" value=""
                                placeholder="To" />
                            <div class="position-absolute top-0 end-0">
                                <div class="d-flex">
                                    <button class="btn btn-link text-reset fw-semibold px-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#CcRecipientsCollapse"
                                        aria-expanded="false" aria-controls="CcRecipientsCollapse">
                                        Cc
                                    </button>
                                    <button class="btn btn-link text-reset fw-semibold px-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#BccRecipientsCollapse"
                                        aria-expanded="false" aria-controls="BccRecipientsCollapse">
                                        Bcc
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="CcRecipientsCollapse">
                            <div class="mb-3">
                                <!-- <label>Cc: </label> -->
                                <input type="text" class="form-control" id="cc" name="cc" placeholder="Cc recipients" />
                            </div>
                        </div>
                        <div class="collapse" id="BccRecipientsCollapse">
                            <div class="mb-3">
                                <!-- <label>Bcc: </label> -->
                                <input type="text" class="form-control" id="bcc" name="bcc"
                                    placeholder="Bcc recipients" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier" />
                        </div>
                        <textarea id="editor" name="message"></textarea>
                        <input type="file" id="attachments" name="attachments[]" multiple>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="sendBtn" class="btn btn-success custom-btn-db"><i class="icofont icofont-paper-plane"></i>Send </button>
                <button type="button" class="btn btn-ghost-danger" data-dismiss="modal">Discard </button>
            </div>
            </form>
        </div>
    </div>
</div>