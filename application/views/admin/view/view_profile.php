<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>View Profile</h5>
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
                        <li class="breadcrumb-item"><a href="#!">View Profile</a>
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
                                    <!-- <h5>Add New User</h5>
                                    <span></span> -->
                                </div>
                                <div class="card-block">
                                    <?php  
                $this->db->select('users_tbl.*, class_tbl.CLASS, class_tbl.DESCRIPTION');
                $this->db->from('users_tbl');
                $this->db->join('class_tbl', 'users_tbl.CLASS_ID = class_tbl.CID', 'left');
                $this->db->where('users_tbl.ID', $this->session->userdata('login_id'));
             
                 $user_info = $this->db->get()->result_array();
                foreach ($user_info as $info):
                ?>
                                    <table class="table" style="width: 100%; border-left: none; border-right: none;">
                                        <input type="hidden" name="user_id" id="userId" value="">
                                        <tr>
                                            <td>Employee Name:</td>
                                            <td><span><?php echo $info['EMP_NAME']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>User Class:</td>
                                            <td><span><?php echo $info['CLASS']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Description:</td>
                                            <td><span><?php echo $info['DESCRIPTION']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Username:</td>
                                            <td><span><?php echo $info['USERNAME']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Position:</td>
                                            <td><span><?php echo $info['EMP_POS']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Department:</td>
                                            <td><span><?php echo $info['EMP_DEPT']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Business Unit:</td>
                                            <td><span><?php echo $info['EMP_BU']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Employee ID:</td>
                                            <td><span><?php echo $info['EMP_ID']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td>
                                                <span
                                                    style="color: #1d8899;"><?php echo ($info['STATUS'] == 1) ? 'Active' : 'Inactive'; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td>
                                                <!-- <span
                                                    style="font-family: monospace; -webkit-text-security: disc; margin-right: 10px;"
                                                    id="passwordDisplay"><?php #echo $info['PASSWORD']; ?></span> -->
                                                <!-- <button id="togglePassword" type="button"
                                                    style="background: none; border: none; padding: 0;"> -->
                                                <!-- <i class="fa fa-eye"></i> -->
                                                <!-- </button> -->
                                                <!-- <button type="button" id="modalButton1" data-toggle="modal"
                                    data-target="#changePassModal" class="btn"
                                    style="margin-left: 10px; background-color: transparent; border: 3px solid #AED6F1; color: black; border-radius: 10px; padding: 5px 5px; font-size: 12px; box-shadow: none;">Change
                                    password</button> -->
                                                <button type="button" data-toggle="modal" data-target="#changePassModal"
                                                    class="btn btn-primary waves-effect waves-light  custom-btn-db">Change
                                                    Password</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#setupEmailModal"
                                                    class="btn btn-primary waves-effect waves-light  custom-btn-db">Setup
                                                    Email
                                                </button>
                                            </td>
                                        </tr>
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
<!-- 
<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" id="passForm" method="POST"
                    action="<?php echo base_url() ?>AdminController/update_password/<?php echo $info['ID']; ?>"
                    enctype="multipart/form-data">
                    <div class="card-block">

                        <div class="form-group">
                            <label for="new_password">New Password&nbsp;<span style="color: red;">*</span></label>
                            <div class="input-group">
                                <input value="<?php echo $info['ID']; ?>" type="hidden" name="user_id"
                                    class="form-control">
                                <input autocomplete="off" type="password" id="new_password" name="new_password"
                                    class="form-control">

                            </div>
                            <div id="passwordLengthValidation" style="color: red;"></div>

                            <div class="form-group">

                                <label for="confirm_password">Confirm Password&nbsp;<span
                                        style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input autocomplete="off" type="password" id="confirm_password"
                                        name="confirm_password" class="form-control">
                                </div>
                                <div id="passwordMatchValidation" style="color: red;"></div>

                                <div class="form-check">
                                    <input type="checkbox" id="togglePassword" class="form-check-input">
                                    <label for="togglePassword" class="form-check-label">Show Password</label>
                                </div>

                                <div class="modal-footer">

                                    <button type="button"
                                        class="btn btn-primary waves-effect waves-light  custom-btn-db"
                                        id="savePasswordButton">Save changes</button>
                                    <button type="button" class="btn btn-default waves-effect"
                                        data-dismiss="modal">Close</button>
                                </div>
                                <div id="validationMessage" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="passForm" method="POST"
                        action="<?php echo base_url() ?>AdminController/update_password/<?php echo $info['ID']; ?>"
                        enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">New Password</label>
                            <div class="col-sm-10">
                                <input value="<?php echo $info['ID']; ?>" type="hidden" name="user_id"
                                    class="form-control">
                                <input autocomplete="off" type="password" id="new_password" name="new_password"
                                    class="form-control">
                                <div id="passwordLengthValidation" style="color: red;"></div>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input autocomplete="off" type="password" id="confirm_password" name="confirm_password"
                                    class="form-control">
                                <div id="passwordMatchValidation" style="color: red;"></div>
                                <div id="validationMessage" style="color: red;"></div>
                            </div>

                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="togglePassword" class="form-check-input">
                            <label for="togglePassword" class="form-check-label" style="font-weight: normal !important;">Show Password</label>
                        </div>
                        <!-- <span id="validationMessage" class="messages" style="color: red"></span> -->
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                    id="savePasswordButton">Save changes</button>
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
            
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="setupEmailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Email Information</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="emailInfoForm" method="POST"
                        action="<?php echo base_url() ?>AdminController/add_email_info/<?php echo $info['ID']; ?>" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Email</label>
                            <div class="col-sm-10">
                                <input value="<?php echo $info['ID']; ?>" type="hidden" name="user_id"
                                    class="form-control">
                                <input type="text" class="form-control" name="email_add" id="email_add" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">App Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="app_email_pass" name="app_email_pass"
                                    placeholder="">
                                <div id="emailValidationMessage" style="color: red;"></div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="" style="padding-left: 15px; padding-right: 15px;">
                <p style="font-size: 14px;">Note: Make sure 2-step verification is enabled on your google account and set up a password app using this link <a
                        href="https://myaccount.google.com/apppasswords" class="link-underline-info" style="color: #277eff;" target="_blank" rel="noopener noreferrer"><u>Google App
                        Password</u></a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                    id="saveEmailInfoBtn">Save changes</button>
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
            <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>