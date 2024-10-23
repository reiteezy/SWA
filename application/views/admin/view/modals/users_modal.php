 <!------------------------ USERS MODAL------------------>
 <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
     <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Add New User</h4>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="card-block">
                     <form id="addUserForm" role="form" method="POST"
                         action="<?php echo base_url() ?>UserController/new_user" enctype="multipart/form-data">
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Name</label>
                             <div class="col-sm-10" style="position: relative">
                                 <input type="search" required autocomplete="off" id="emp_name" name="emp_name"
                                     class="form-control" placeholder="Family name, first name...">
                                 <div id="dropdown"
                                     style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999; width: 96%;"
                                     class="dropdown-content"></div>
                                 <div id="validationNameAvailability" style="color: red;"></div>
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">User Class</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="user_class" id="user_class">
                                     <option value="" hidden selected>Select class</option>
                                     <?php
                                      foreach ($classes as $class):
                                      ?>
                                     <option value="<?php echo $class->CID?>"><?php echo $class->CLASS?>
                                     </option>
                                     <?php  
                                      endforeach;
                                      ?>
                                 </select>
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label"></label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="class_description" name="class_description"
                                     placeholder="" readonly="readonly">
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Position</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="emp_pos" name="emp_pos" placeholder=""
                                     readonly="readonly">
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Employee ID</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder=""
                                     readonly="readonly">
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Department</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="emp_dept" name="emp_dept" placeholder=""
                                     readonly="readonly">
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Business Unit</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="emp_bu" name="emp_bu" placeholder=""
                                     readonly="readonly">
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Default Username</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="username" name="username" placeholder="">
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Default Password</label>
                             <div class="col-sm-10">
                                 <input type="password" class="form-control" id="password" name="password"
                                     placeholder="">
                             </div>
                         </div>
                         <input type="text" readonly="readonly" id="emp_photo" name="emp_photo" class="form-control"
                             hidden>

                         <div id="validationMessage" style="color: red;"></div>
                         <div id="validationUser" style="color: red;"></div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                     id="saveNewUserButton">Save
                     <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                 </button>
             </div>
         </div>
     </div>
 </div>
 <!------------------------ END OF ADD USERS MODAL------------------>
 <!----------------------------MODAL for user view---------------------------------------------->
 <div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog">
     <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title"></h4>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-sm-4">
                             <div class="container d-flex justify-content-center align-items-center"
                                 style="height: 100%;">
                                 <?php $photo ; ?>
                                 <img id="userPhoto" src="" alt="user image" class="" alt="user image" class=""
                                     style="border: 2px solid #fff; -webkit-box-shadow: 0 5px 10px 0 rgba(43, 43, 43, 0.2); box-shadow: 0 5px 10px 0 rgba(43, 43, 43, 0.2); width: 200px;">
                             </div>
                         </div>

                         <div class="col-sm-8">
                             <input type="hidden" name="user_id" id="userId" value="">
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Employee Name:</div>
                                 <div class="col-sm-8"><span id="name"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Username:</div>
                                 <div class="col-sm-8"><span id="userName"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Class:</div>
                                 <div class="col-sm-8"><span id="class"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold"> Class Description:</div>
                                 <div class="col-sm-8"><span id="classDescript"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Position:</div>
                                 <div class="col-sm-8"><span id="empPos"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Department:</div>
                                 <div class="col-sm-8"><span id="empDept"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Business Unit:</div>
                                 <div class="col-sm-8"><span id="empBu"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Employee ID:</div>
                                 <div class="col-sm-8"><span id="empId"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Status:</div>
                                 <div class="col-sm-8"><span id="status" class="text-info"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Date Added:</div>
                                 <div class="col-sm-8"><span id="dateAdded"></span></div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col-sm-4 text-end fw-bold">Last Update:</div>
                                 <div class="col-sm-8"><span id="lastUpdate"></span></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 <!------------------------ END OF VIEW USERS MODAL------------------>
 <!------------------------ UPDATE USERS MODAL------------------>
 <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
     <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Update User</h4>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="card-block">
                     <form id="editUserForm" role="form" method="POST" action="" enctype="multipart/form-data">
                         <input type="hidden" id="user_id" name="user_id" value="">
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Name</label>
                             <div class="col-sm-10" style="position: relative">
                                 <input type="text" required autocomplete="off" name="update_empname"
                                     id="user_editempname" class="form-control" placeholder="" disabled>
                                 <div id="dropdown"
                                     style="position: absolute; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999;"
                                     class="dropdown-content"></div>
                                 <div id="validationNameAvailability" style="color: red;"></div>
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">User Class</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="update_userclass" id="user_editclass">
                                     <option class="user_editclass" value="" disabled selected></option>
                                     <?php
                                     $classes = $this->db->get('class_tbl')->result_array();
                                      foreach ($classes as $class):
                                      ?>
                                     <option value="<?php echo $class['CID']?>"><?php echo $class['CLASS']?>
                                     </option>
                                     <?php  
                                      endforeach;
                                      ?>
                                 </select>
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Class Description</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="update_classdescript"
                                     id="user_editdescript" disabled>
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Username</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="update_username" id="username_edit"
                                     placeholder="">
                                 <div id="usernameLengthValidation" style="color: red;"></div>
                                 <div id="uniqueUsernameValidation" style="color: red;"></div>
                             </div>

                         </div>

                         <div class="mb-3 row">
                             <label class="form-label col-sm-2 col-form-label sm-label">Password</label>
                             <div class="col-sm-10">
                                 <input type="password" class="form-control" name="update_password" id="password_edit"
                                     placeholder="">
                             </div>
                         </div>

                         <div id="validationMessage" style="color: red;"></div>
                         <div id="validationUser" style="color: red;"></div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                     id="saveEditButton">Update</button>
                 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 <!------------------------ END OF UPDATE USERS MODAL------------------>