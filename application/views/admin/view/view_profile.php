<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>View Profile</h5>
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td>
                                                <span
                                                    style="font-family: monospace; -webkit-text-security: disc; margin-right: 10px;"
                                                    id="passwordDisplay"><?php echo $info['PASSWORD']; ?></span>
                                                <button id="togglePassword" type="button" onclick="togglePassword()"
                                                    style="background: none; border: none; padding: 0;">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <!-- <button type="button" id="modalButton1" data-toggle="modal"
                                    data-target="#changePassModal" class="btn"
                                    style="margin-left: 10px; background-color: transparent; border: 3px solid #AED6F1; color: black; border-radius: 10px; padding: 5px 5px; font-size: 12px; box-shadow: none;">Change
                                    password</button> -->
                                                <button type="button" id="modalButton1" data-toggle="modal"
                                                    data-target="#changePassModal" class="btn btn-primary"
                                                    style="width: 160px; margin-left: 10px;"><img
                                                        src="<?php echo base_url('')?>assets/backend/img/icons/key.png"
                                                        style="width: 15px; margin-right: 10px;">Change
                                                    Password</button>
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

<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="changePassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePassModalLabel"><img class="" src="<?= base_url('assets/backend/img/icons/changepass.png'); ?>"
            style="width: 20px; margin-right: 10px; ">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="passForm" method="POST"
                    action="<?php echo base_url() ?>admin/update_password/<?php echo $info['ID']; ?>"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" readonly="readonly" value="<?php echo $info['PASSWORD']; ?>"
                                id="password" name="password" class="form-control">
                            <input value="<?php echo $info['ID']; ?>" type="hidden" name="user_id" class="form-control">
                            <label for="currentpassword">Current Password&nbsp;<span
                                    style="color: red;">*</span></label>
                            <div class="input-group" style="position: relative;">
                                <input autocomplete="off" type="password" id="currentpassword" name="currentpassword"
                                    class="form-control"><button id="togglePassword1"
                                    class="btn btn-outline-secondary fa fa-eye toggle-password-icon" type="button"
                                    style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); box-shadow: none; background: none; border: 0; transition: transform 0.1s ease-in-out; "
                                    onmouseover="this.style.color='#007bff'" onmouseout="this.style.color='';"></button>
                            </div>
                            <div id="currentPasswordValidation" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password&nbsp;<span style="color: red;">*</span></label>
                            <div class="input-group">
                                <input autocomplete="off" type="password" id="new_password" name="new_password"
                                    class="form-control"><button id="togglePassword2"
                                    class="btn btn-outline-secondary fa fa-eye toggle-password-icon" type="button"
                                    style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); box-shadow: none; background: none; border: 0; transition: transform 0.1s ease-in-out; "
                                    onmouseover="this.style.color='#007bff'" onmouseout="this.style.color='';"></button>
                            </div>
                            <div id="passwordLengthValidation" style="color: red;"></div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password&nbsp;<span
                                        style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input autocomplete="off" type="password" id="confirm_password"
                                        name="confirm_password" class="form-control"><button id="togglePassword3"
                                        class="btn btn-outline-secondary fa fa-eye toggle-password-icon" type="button"
                                        style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); box-shadow: none; background: none; border: 0; transition: transform 0.1s ease-in-out; "
                                        onmouseover="this.style.color='#007bff'"
                                        onmouseout="this.style.color='';"></button>
                                </div>
                                <div id="passwordMatchValidation" style="color: red;"></div>
                                <div id="validationMessage" style="color: red;"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="width: 120px;"><img src="<?php echo base_url('')?>assets/backend/img/icons/cancel.png" style="width: 15px; margin-right: 10px;">Cancel</button>
                                    <button id="savePasswordButton" type="button" class="btn btn-success"
                                        style="width: 150px;"><img src="<?php echo base_url('')?>assets/backend/img/icons/save.png" style="width: 15px; margin-right: 10px;">Save
                                        Changes</button>
                                </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>