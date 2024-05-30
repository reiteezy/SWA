<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Stock Withdrawal Advice</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/dash"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">SWA List</a>
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
                                <div class="card-header">
                                    <h5>SWA List</h5>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="scr-vtr-dynamic" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Control Number</th>
                                                    <th>Document Date</th>
                                                    <th>Supplier Name</th>
                                                    <th>MIS Status</th>
                                                    <th>Accounting Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($swa_datas as $data):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $data->SWA_ID; ?></td>
                                                    <td><?php echo $data->DOCUMENT_DATE; ?></td>
                                                    <td><?php echo $data->NAME; ?></td>
                                                    <td> <?php  if($data->SWA_MIS_STATUS == 'cancelled'){ ?>
                                                        <label
                                                            class="user-status form-label badge badge-inverse-danger"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Cancelled</label>
                                                        <?php } else { ?>
                                                        <label class="user-status form-label badge badge-inverse-warning"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Pending</label>
                                                        <?php } ?></td>
                                                    <td> <?php  if($data->SWA_ACCTG_STATUS == 'pending'){ ?>
                                                        <label
                                                            class="user-status form-label badge badge-inverse-danger"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Pending</label>
                                                        <?php } else { ?>
                                                        <label class="user-status form-label badge badge-inverse-success"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Received</label>
                                                        <?php } ?></td>
                                                    <td><a href="#!"><i
                                                                class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue"></i></a><a
                                                            href="#!"><i
                                                                class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>

                                                    </td>
                                                </tr>
                                                <?php  
                              endforeach;
                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">
        </div>
    </div>
</div>