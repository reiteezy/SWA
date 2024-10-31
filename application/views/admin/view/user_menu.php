<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user-check bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>User Menu</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Users List</a>
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
                                            <button type="button" class="btn btn-primary custom-btn-db"
                                                data-toggle="modal" data-target="#addTypeModal"><i
                                                    class="feather icon-plus-square"></i>Add New User
                                                Type</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="card table-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="classtable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th style="width: 40%;">Class</th>
                                                    <th style="width: 40%;">Description</th>
                                                    <th style="width: 16%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <?php
                              $count = 1;
                              foreach ($classes as $class):
                              ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $count++; ?></td>
                                                    <td><?php echo $class->CLASS; ?></td>
                                                    <td><?php echo $class->DESCRIPTION; ?></td>
                                                    <td style="text-align: center;">
                                                        <button type="button"
                                                            class="assign-privilege-btn btn waves-effect waves-light btn-primary btn-icon"
                                                            data-class-id="<?php echo $class->CID; ?>"
                                                            data-toggle="modal" data-target="#rightsModal"
                                                            data-user-description="<?php echo $class->DESCRIPTION; ?>"
                                                            data-user-class="<?php echo $class->CLASS; ?>"><i class="icofont icofont-unlock" style="padding-left: 5px;"></i></button>
                                                    </td>
                                                </tr>
                                                <?php
                              endforeach;
                              ?> -->
                                            </tbody>
                                        </table>
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