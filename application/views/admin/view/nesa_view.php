<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Near Expiry Stock Advise</h5>
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
                        <li class="breadcrumb-item"><a href="#!">NESA List</a>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card table-card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-auto">
                                            <?php #if ($this->session->userdata('priv_swaf') == 1): ?>
                                            <button type="button" class="btn btn-primary custom-btn-db"
                                                data-toggle="modal" data-target="#nesaFormModal"><i
                                                    class="feather icon-plus-square"></i>Add New
                                                NESA</button>
                                            <?php #endif; ?>
                                        </div>
                                        <div class="col-auto">
                                            <input type="search" required autocomplete="off" id="filter_vendor_code"
                                                name="filter_vendor_code" class="form-control"
                                                placeholder="Filter by vendor code"
                                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 180px;">
                                            <div id="dropdown"
                                                style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999; width: 180px;"
                                                class="dropdown-content"></div>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" name="datefilter" value="" placeholder="Filter by date"
                                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: auto;">
                                        </div>
                                        <!-- <div class="col-auto">
                                            <div class="generate-loader"></div> -->
                                    </div>

                                </div>
                            </div>

                            <div class="card table-card">

                                <div class="card-block">

                                    <div class="table-responsive">
                                        <table id="nesaTable" class="table table-hover m-b-0" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th style="width: 10%">#</th>
                                                    <th>Location</th>
                                                    <th>Supplier Code</th>
                                                    <th>Supplier Name</th>
                                                    <th>Course of Action</th>
                                                    <th>Document Date</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <button type="button" class="btn btn-primary custom-btn-db" style="display: none;"
                                        id="generatePdfButton"><i class="icofont icofont-file-pdf"></i> Generate
                                        PDF</button>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <a href="#" data-toggle="modal"
data-target="#swaFormModal" class="float">
<i class="fa fa-plus my-float"></i>
</a> -->