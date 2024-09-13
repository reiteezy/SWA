<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file-text bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Promo Execution Report</h5>
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
                        <li class="breadcrumb-item"><a href="#!">PER List</a>
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
                                    <?php if ($this->session->userdata('priv_per') == 1): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#perFormModal"><i class="feather icon-plus"></i>Add New
                                        PER</button>
                                    <?php endif; ?>
                                </div> -->
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="pertable" class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th style="width: 10%;">Control Number</th>
                                                    <th>Document Date</th>
                                                    <th>Subsidiary</th>
                                                    <th>Promo Tittle</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($per_datas as $data):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $data->PER_ID; ?></td>
                                                    <td><?php echo $data->DOCUMENT_DATE; ?></td>
                                                    <td><?php echo $data->SUB_DESCRIPT; ?></td>
                                                    <td><?php echo $data->PER_PROMO_TITLE; ?></td>
                                                    <td><button type="button" class=" btn waves-effect waves-light btn-primary btn-icon"
                                                            id="viewPerButton" title="View"
                                                            data-per-id="<?php echo $data->PER_ID?>" data-toggle="modal"
                                                            data-target="#viewPerFormModal"><i class="icofont icofont-eye-alt" style="padding-left: 5px;"></i></button>
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
    </div>
</div>

<a href="#" data-toggle="modal"
data-target="#perFormModal" class="float">
<i class="fa fa-plus my-float"></i>
</a>

