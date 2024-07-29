<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-check bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Accounting Confirmation</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Accounting Confirmation</a>
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
                                <!-- <div class="card-header">
                                    <h5>Accounting Confirmation</h5>
                                </div> -->

                                <div class="card-block" style="padding-bottom: 50px;">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0" id="acctgtable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Control No.</th>
                                                    <th>Date</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                    <th>CRF/CV Number</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <?php #if ($noDataFound){ ?>
                                                <tr>
                                                    <td colspan="7" class="dataTables_empty text-center">No records
                                                        found</td>
                                                </tr>
                                                <?php #} else { ?> -->
                                                <?php  
                              $count = 1;
                             
                              foreach ($swa_datas as $data):
                              ?>
                                                <tr>
                                                    <td style="width: 5%;"><?php echo $count++ ?></td>
                                                    <td style="width: 10%;"><?php echo $data->SWA_ID; ?></td>
                                                    <!-- to be changed to actual control number-->
                                                    <td style="width: 10%;">
                                                        <?php echo date("F j, Y", strtotime($data->DOCUMENT_DATE)); ?>
                                                    </td>
                                                    <td><?php echo $data->LOCATION; ?></td>
                                                    <td><?php echo $data->DESCRIPTION; ?></td>
                                                    <td><?php echo $data->SWA_CRFCV_NO; ?></td>
                                                    <td>
                                                        <?php if(!empty($data->SWA_CRFCV_NO)) { ?>
                                                        <label class="form-label badge badge-inverse-success acctg-status"
                                                            sid="<?php echo $data->SWA_ID?>">Confirmed</label>
                                                        <?php } else { ?>
                                                        <label class="form-label badge badge-inverse-danger acctg-status"
                                                            sid="<?php echo $data->SWA_ID?>">Pending</label>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="acctg-confirm-btn action-btn-c-green" <?php echo (!empty($data->SWA_CRFCV_NO)) ? 'disabled' : '';?> title="Confirm"
                                                            data-swa-id="<?php echo $data->SWA_ID; ?>"
                                                            data-control-no="<?php echo $data->SWA_CONTROL_NO; ?>"
                                                            data-crfcv-no="<?php echo $data->SWA_CRFCV_NO; ?>"
                                                            data-toggle="modal" data-target="#acctgConfirmModal">
                                                        <i class="icon feather icon-check-square f-w-600 f-16 m-r-15" style="color: #fff"></i><span style="color: #fff; font-size: 13px; margin-left: -8px;">Confirm</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php  
                              endforeach;
                            #}
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
    </div>
</div>

