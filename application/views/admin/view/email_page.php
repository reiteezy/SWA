<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-mail bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Compose Email</h5>
                        <span>Stock Withdrawal Advise System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/index"><i
                                    class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Email</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card table-card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-auto">
                                    <button data-toggle="modal" data-target="#emailSupplierModal"
                                        class="btn btn-danger waves-effect custom-btn-db"><i
                                            class="feather icon-edit"></i>Compose</button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-block email-card">
                            <div class="row">

                                <div class="col-lg-12 col-xl-3">
                                    <div class="user-body">
                                        <div class="text-center">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="page-list nav nav-tabs flex-column" id="pills-tab" role="tablist">
                                            <!-- <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block active" data-toggle="pill"
                                                    href="#e-inbox" role="tab">
                                                    <i class="icofont icofont-inbox"></i> Inbox
                                                    <span class="label label-primary float-end">6</span>
                                                </a>
                                            </li> -->
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block active" data-toggle="pill"
                                                    href="#e-sent" role="tab">
                                                    <i class="icofont icofont-paper-plane"></i> Sent Mail
                                                    <span class="label label-info float-end">
                                                        <?php   
                                                        $sent_by = $this->session->userdata('login_empname');
                                                        $this->db->from('mail_tbl');
                                                        $this->db->where('sent_by', $sent_by);
                                                        $mailCount = $this->db->count_all_results(); echo $mailCount; ?></span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                    href="#e-drafts" role="tab">
                                                    <i class="icofont icofont-file-text"></i> Drafts
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                    href="#e-trash" role="tab">
                                                    <i class="icofont icofont-ui-delete"></i> Trash
                                                    <!-- <span class="label label-info float-end">30</span> -->
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="col-lg-12 col-xl-9">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="e-sent" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <!-- <button type="button"
                                                        class="btn btn-primary btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-exclamation-circle"></i>
                                                    </button> -->
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mail-body-content">
                                                    <div class="table-responsive">
                                                        <table class="table" id="e_sent_tbl">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="e-drafts" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <!-- <button type="button"
                                                        class="btn btn-success btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-inbox"></i>
                                                    </button> -->
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mail-body-content">
                                                    <p>not yet</p>
                                                    <!-- <div class="table-responsive">
                                                        <table class="table" id="e_drafts_tbl">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="e-trash" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mail-body-content">
                                                    <p>not yet</p>
                                                    <!-- <div class="table-responsive">
                                                        <table class="table" id="e_delete_tbl">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>