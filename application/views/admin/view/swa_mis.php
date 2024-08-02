<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-check bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>MIS Confirmation</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/index"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">MIS Confirmation</a>
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
                                    <h5>MIS Confirmation</h5>
                                </div> -->

                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0" id="mistable">
                                            <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th>Control No.</th>
                                                    <th>Date</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                    <th>Transaction No. 1</th>
                                                    <th>Transaction No. 2</th>
                                                    <th>Transaction No. 3</th>
                                                    <!-- <th>Status</th> -->
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- <pre><?php #print_r($swa_datas)?></pre> -->
                                               
                                                <?php  
                              $count = 1;
                              foreach ($swa_datas as $data): 
                              ?>
                             
                                                <tr>
                                                    <!-- <td><?php #echo $count++; ?></td> -->
                                                    <td style="text-align: center;"><?php echo $data->SWA_ID; ?></td>
                                                    <td><?php echo date("F j, Y", strtotime($data->DOCUMENT_DATE)); ?>
                                                    </td>
                                                    <td><?php echo $data->LOCATION; ?></td>
                                                    <td><?php echo $data->DESCRIPTION; ?></td>
                                                    <td><?php echo $data->SWA_TRANS_NO1;?></td>
                                                    <td><?php echo $data->SWA_TRANS_NO2; ?></td>
                                                    <td><?php echo $data->SWA_TRANS_NO3; ?></td>
                                                    <!-- <td>
                                                        <?php  #if ($data->SWA_MIS_STATUS == 'cancelled') { ?>
                                                        <span class="form-label badge badge-inverse-danger mis-status"
                                                            sid="<?php #echo $data->SWA_ID?>">Cancelled</span>
                                                        <?php #} elseif ($data->SWA_MIS_STATUS == 'pending') { ?>
                                                        <span class="form-label badge badge-inverse-warning mis-status"
                                                            sid="<?php #echo $data->SWA_ID?>">Pending</span>
                                                        <?php #} elseif ($data->SWA_MIS_STATUS == 'confirmed') { ?>
                                                        <span class="form-label badge badge-inverse-success mis-status"
                                                            sid="<?php #echo $data->SWA_ID?>">Confirmed</span>
                                                        <?php #}  ?>
                                                    </td> -->
                                                    <td style="text-align: center;">
                                                        <!-- <button type="button" class="mis_status action-btn-c-red"
                                                            id="<?php #echo $data->SWA_ID; ?>"
                                                            sid="<?php #echo $data->SWA_ID; ?>"
                                                            sstatus="<?php #echo $data->SWA_MIS_STATUS; ?>"
                                                            title="Cancel"
                                                            <?php #echo !empty($data->SWA_TRANS_NO1) ? 'disabled' : ''; ?>><i
                                                                class="icon feather icon-slash f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Cancel</span></button> -->
                                                        <button type="button" class="mis-confirm-btn action-btn-c-green"
                                                            data-swa-id="<?php echo $data->SWA_ID; ?>"
                                                            data-toggle="modal" title="Confirm"
                                                            data-target="#misConfirmModal"><i
                                                                class="icon feather icon-check-square f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Confirm</span></button>

                                                        <!-- <button type="button" class="mis_status" id="<?php #echo $data->SWA_ID?>"
                                        style="background: transparent; border: none;"
                                        sid="<?php #echo $data->SWA_ID; ?>"
                                        sstatus="<?php #echo  $data->SWA_MIS_STATUS ?>" title="Receive"><img
                                            src="<?php #echo base_url('')?>assets/backend/img/icons/received.png"
                                            alt="Receive" style="width: 25px;"></button>
                                    <button type="button" class="mis-confirm-btn"
                                        style="background: transparent; border: none;"
                                        data-swa-id="<?php #echo $data->SWA_ID; ?>" data-toggle="modal" title="Confirm"
                                        data-target="#misConfirmModal"><img
                                            src="<?php #echo base_url('')?>assets/backend/img/icons/confirm.png"
                                            alt="View" style="width: 20px;"></button> -->

                                                    </td>
                                                </tr>
                                                <?php  
                              endforeach;     ?>


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
<!------------------------ USER TYPE MODAL------------------>
