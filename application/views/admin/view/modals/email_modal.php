<div class="modal fade" id="emailSupplierModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compose Email</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body compose-modal">
                <form action="<?php echo base_url('EmailController/send_email'); ?>" method="post" id="emailForm"
                    enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="composeFrom">From:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="composeFrom" name="from" type="email" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="composeTo">To:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="composeTo" name="to" type="email" required />
                            <div class="add-bcc">
                                <div class="d-flex gap-2">
                                    <a class="btn" data-bs-toggle="collapse" href="#collapseCc" role="button"
                                        aria-expanded="false" aria-controls="collapseCc">Cc</a>
                                    <a class="btn" data-bs-toggle="collapse" href="#collapseBcc" role="button"
                                        aria-expanded="false" aria-controls="collapseBcc">Bcc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse row mb-3" id="collapseCc">
                        <label class="col-sm-2 col-form-label" for="composeCc">Cc:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="composeCc" name="cc" type="email" />
                        </div>
                    </div>
                    <div class="collapse row mb-3" id="collapseBcc">
                        <label class="col-sm-2 col-form-label" for="composeBcc">Bcc:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="composeBcc" name="bcc" type="email" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="composeSubject">Subject:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="composeSubject" name="subject" type="text" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="composeMessage">Message:</label>
                        <div class="col-sm-10">
                            <div id="toolbar1">
                                <button class="ql-bold" type="button">Bold</button>
                                <button class="ql-italic" type="button">Italic</button>
                                <button class="ql-underline" type="button">Underline</button>
                                <button class="ql-list" value="ordered" type="button">List</button>
                                <button class="ql-list" value="bullet" type="button">Bullet</button>
                                <button class="ql-link" type="button">Link</button>
                                <button class="ql-image" type="button">Image</button>
                            </div>
                            <!-- <div id="editor1" style="height: 200px;"></div> -->
                            <textarea type="text" name="message" id="composeMessage"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="attachment">Attachment:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="attachment" name="attachment" />
                        </div>
                    </div>
                 
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary custom-btn-db" id="submitEmailBtn"><i
                        class="icofont icofont-send-mail"></i> Send</button>
                <button type="button" class="btn btn-default" style="border: 1px solid #425870" data-dismiss="modal">Save as draft</button>
            </div>
            </form>
        </div>
    </div>
</div>