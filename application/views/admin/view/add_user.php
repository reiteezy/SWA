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
                        <li class="breadcrumb-item"><a href="#!">System Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add New User</a>
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


                            <div class="card">
                                <div class="card-header">
                                    <h5>Add New User</h5>
                                    <span></span>
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="" novalidate>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10" style="position: relative">
                                               <input type="search" required autocomplete="off" id="emp_name"
                                                        name="emp_name" class="form-control"
                                                        placeholder="Family name, first name...">
                                                    <div id="dropdown"
                                                        style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999;"
                                                        class="dropdown-content"></div>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">User Class</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="user_class" id="user_class">
                                                    <option value="" disabled selected>Select class</option>
                                                    <?php
                                      foreach ($classes as $class):
                                      ?>
                                                    <option value="<?php echo $class->CID?>"><?php echo $class->CLASS?>
                                                    </option>
                                                    <?php  
                                      endforeach;
                                      ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Class Description</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" class="form-control" id="class_description"
                                                    name="class_description" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Position</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" class="form-control" id="emp_pos" name="emp_pos" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Employee ID</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" class="form-control" id="emp_id" name="emp_id" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Department</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" class="form-control" id="emp_dept" name="emp_dept" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Business Unit</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" class="form-control" id="emp_bu" name="emp_bu" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Default Username</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" class="form-control" id="username" name="username" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Default Password</label>
                                            <div class="col-sm-10">
                                                <input disabled type="password" class="form-control" id="password"
                                                    name="password" placeholder="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <input type="text" readonly="readonly" id="emp_photo" name="emp_photo"
                                            class="form-control" hidden>

                                        <div id="validationMessage" style="color: red;"></div>
                                        <div id="validationUser" style="color: red;"></div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>