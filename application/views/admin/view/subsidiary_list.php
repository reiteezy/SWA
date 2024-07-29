<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-building bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Subsidiary</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Subsidiary</a>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addSubModal"><i class="feather icon-plus"></i>Add New
                                        Subsidiary</button>
                                    <!-- <h5>Subsidiary List</h5> -->
                                </div>
                                <!-- <div class="card-block" style="padding-top: 50px;">
                                </div> -->
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="subtable" class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($subsidiaries as $subsidiary):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $subsidiary->CODE; ?></td>
                                                    <td><?php echo $subsidiary->DESCRIPTION; ?></td>
                                                    <td><button type="button" class="editSubsidiaryButton action-btn-c-green" title="edit"
                                                            data-sub-id="<?php echo $subsidiary->ID; ?>"
                                                            data-sub-code="<?php echo $subsidiary->CODE; ?>"
                                                            data-sub-descript="<?php echo $subsidiary->DESCRIPTION; ?>"
                                                            data-toggle="modal" data-target="#editSubsidiaryModal">
                                                            <i class="icon feather icon-edit f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Update</span>
                                                        </button>
                                                        <button type="button" class="deleteButton action-btn-c-red"
                                                            data-delete-url="<?php echo base_url() ?>SubsidiaryController/del_subsidiary/<?php echo $subsidiary->ID; ?>"><i
                                                                class="feather icon-trash-2 f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Delete</span>
                                                        </button>
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

