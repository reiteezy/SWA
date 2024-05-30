<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>System Users</h5>
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
                                <div class="card-header">
                                    <h5>Users List</h5>
                                   
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="simpletable" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <th>Username</th>
                                                    <th>User Class</th>
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($users as $user):
                              ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="http://172.16.161.34:8080/hrms<?php echo substr($user->EMP_PHOTO, 2); ?>" alt="user image"
                                                                class="img-radius img-40 align-top m-r-15">
                                                            <div class="d-inline-block">
                                                                <h6><?php echo $user->EMP_NAME; ?></h6>
                                                                <p class="text-muted m-b-0">
                                                                    <?php echo $user->EMP_POS; ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $user->USERNAME; ?></td>
                                                    <td><?php echo $user->CLASS; ?></td>
                                                    <td><?php echo str_repeat('*', strlen($user->PASSWORD)); ?></td>
                                                    <td>
                                                        <?php  if($user->STATUS == '1'){ ?>
                                                        <label
                                                            class="user-status form-label badge badge-inverse-success"
                                                            data-user-id="<?php echo $user->ID?>">Active</label>
                                                        <?php } else { ?>
                                                        <label class="user-status form-label badge badge-inverse-danger"
                                                            data-user-id="<?php echo $user->ID?>">Inactive</label>
                                                        <?php } ?>
                                                    </td>
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