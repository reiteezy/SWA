<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-users bg-c-yellow"></i>
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
                            <a href="<?php echo base_url() ?>AdminController/index"><i class="feather icon-home"></i></a>
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
                                <!-- <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addUserModal"><i class="feather icon-plus"></i>Add New
                                        User</button>
                                </div> -->
                                <div class="card-block" style="padding-bottom: 50px;">
                                    <div class="table-responsive">
                                        <table id="usertable" class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%">Employee Name</th>
                                                    <th>Username</th>
                                                    <th>User Class</th>
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($users as $user):
                              ?>
                                                <tr>

                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="http://172.16.161.34:8080/hrms<?php echo substr($user->EMP_PHOTO, 2); ?>"
                                                                alt="user image"
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
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="user_status" data-user-id="<?php echo $user->ID; ?>"
                                                                <?php echo ($user->STATUS == 1) ? 'checked' : ''; ?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" id="<?php echo $user->ID?>"
                                                            class="viewUserButton  btn waves-effect waves-light btn-primary btn-icon"
                                                            data-user-id="<?php echo $user->ID; ?>" data-toggle="modal"
                                                            data-target="#viewUserModal" title="View"
                                                            style="margin-left: 5px;">
                                                            <i class="icofont icofont-eye-alt" style="padding-left: 5px;"></i></button>
                                                        <button type="button" class="editUserButton  btn waves-effect waves-light btn-primary btn-icon" style="border:none; background-color: #02838d;" 
                                                            title="edit" data-user-id="<?php echo $user->ID; ?>"
                                                            data-user-empname="<?php echo $user->EMP_NAME; ?>"
                                                            data-user-name="<?php echo $user->USERNAME; ?>"
                                                            data-user-class="<?php echo $user->CLASS; ?>"
                                                            data-user-descript="<?php echo $user->CLASS_DESCRIPT; ?>"
                                                            data-user-password="<?php echo $user->PASSWORD; ?>"
                                                            data-class-id="<?php echo $user->CID; ?>"
                                                            data-toggle="modal" data-target="#editUserModal"
                                                            style="margin-left: 5px;">
                                                            <i class="icofont icofont-edit" style="padding-left: 5px;"></i>
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
                        </div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" data-toggle="modal"
data-target="#addUserModal" class="float">
<i class="fa fa-plus my-float"></i>
</a>