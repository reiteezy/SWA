<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user-check bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>User Menu</h5>
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
                                <!-- <div class="card-header">
                                    <h5>Users List</h5>
                                </div> -->
                                <!-- <div class="card-block" style="padding-top: 50px;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addUserModal"><i class="feather icon-plus"></i>Add New
                                        User</button>
                                </div> -->
                                <div class="card-block" style="padding-bottom: 50px;">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="classtable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="width: 40%;">Class</th>
                                                    <th style="width: 40%;">Description</th>
                                                    <th style="width: 16%; text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              $count = 1;
                              foreach ($classes as $class):
                              ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $count++; ?></td>
                                                    <td><?php echo $class->CLASS; ?></td>
                                                    <td><?php echo $class->DESCRIPTION; ?></td>
                                                    <td style="text-align: center;">
                                                        <button type="button" class="assign-privilege-btn action-btn-c-green"
                                                            data-class-id="<?php echo $class->CID; ?>"
                                                            data-toggle="modal" data-target="#rightsModal"
                                                            data-user-description="<?php echo $class->DESCRIPTION; ?>"
                                                            data-user-class="<?php echo $class->CLASS; ?>"><i
                                                                class="icon feather icon-unlock f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Access</span></button>
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
</div>
</div>
<div class="modal fade" id="rightsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Menu</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <table class="table table-hover table-bordered" id="privilegetable">
                        <thead>
                            <tr>
                                <th>Program Description</th>
                                <th class="text-center">Access</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td style="background-color: #DCDCDC;">File Maintenance</td>
                                <td class="text-center" style="background-color: #DCDCDC;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="fileMaintenance">
                                        <label class="form-check-label1" name for="fileMaintenance"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Subsidiary</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="subsidiary">
                                        <label class="form-check-label1" name for="subsidiary"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Supplier</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="supplier">
                                        <label class="form-check-label1" name for="supplier"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Filtering</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="userFiltering">
                                        <label class="form-check-label1" name for="userFiltering"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #DCDCDC;">Stock Withdrawal Advice</td>
                                <td style="background-color: #DCDCDC;" class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swa">
                                        <label class="form-check-label1" name for="swa"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Stock Withdrawal Advice Form</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaForm">
                                        <label class="form-check-label1" name for="swaForm"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Stock Withdrawal Advice - View Only</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaVo">
                                        <label class="form-check-label1" name for="swaVo"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>SWA Confirmation - MIS</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaMis">
                                        <label class="form-check-label1" name for="swaMis"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Promo Execution Report</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="per">
                                        <label class="form-check-label1" name for="per"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Promo Execution Report - View Only</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="perVo">
                                        <label class="form-check-label1" name for="perVo"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>SWA Confirmation - Accounting</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaAcctg">
                                        <label class="form-check-label1" name for="swaAcctg"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>SWA Reports</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="swaReports">
                                        <label class="form-check-label1" name for="swaReports"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #DCDCDC;">System Manager</td>
                                <td class="text-center" style="background-color: #DCDCDC;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemManager">
                                        <label class="form-check-label1" name for="systemManager"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Type</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="userType">
                                        <label class="form-check-label1" name for="userType"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>System User</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemUser">
                                        <label class="form-check-label1" name for="systemUser"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>User Menu</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="userMenu">
                                        <label class="form-check-label1" name for="userMenu"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Menu Settings</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="menuSetting">
                                        <label class="form-check-label1" name for="menuSetting"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #DCDCDC;">System Utilities</td>
                                <td class="text-center" style="background-color: #DCDCDC;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemUtilities">
                                        <label class="form-check-label1" name for="systemUtilities"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>System Wallpaper</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="systemWallpaper">
                                        <label class="form-check-label1" name for="systemWallpaper"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>About the System</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="aboutSystem">
                                        <label class="form-check-label1" name for="aboutSystem"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>File Import</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input1" id="generateReport">
                                        <label class="form-check-label1" name for="generateReport"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="save-changes-button">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var selectedClassId = null;
    var selectedPrivileges = {};

    $(".assign-privilege-btn").on("click", function(event) {
        event.preventDefault();
        selectedClassId = $(this).data("class-id");
        console.log(selectedClassId);
        $.ajax({
            url: '<?php echo base_url() ?>AdminController/view_update_privilege/' +
                selectedClassId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#fileMaintenance').prop('checked', parseInt(data.classes
                    .fileMaintenance));
                $('#subsidiary').prop('checked', parseInt(data.classes.subsidiary));
                $('#supplier').prop('checked', parseInt(data.classes.supplier));
                $('#userFiltering').prop('checked', parseInt(data.classes.userFiltering));
                $('#swa').prop('checked', parseInt(data.classes.swa));
                $('#swaForm').prop('checked', parseInt(data.classes.swaForm));
                $('#swaVo').prop('checked', parseInt(data.classes.swaVo));
                $('#swaMis').prop('checked', parseInt(data.classes.swaMis));
                $('#per').prop('checked', parseInt(data.classes.per));
                $('#perVo').prop('checked', parseInt(data.classes.perVo));
                $('#swaAcctg').prop('checked', parseInt(data.classes.swaAcctg));
                $('#swaReports').prop('checked', parseInt(data.classes.swaReports));
                $('#systemManager').prop('checked', parseInt(data.classes.systemManager));
                $('#userType').prop('checked', parseInt(data.classes.userType));
                $('#systemUser').prop('checked', parseInt(data.classes.systemUser));
                $('#userMenu').prop('checked', parseInt(data.classes.userMenu));
                $('#menuSetting').prop('checked', parseInt(data.classes.menuSetting));
                $('#systemUtilities').prop('checked', parseInt(data.classes
                    .systemUtilities));
                $('#systemWallpaper').prop('checked', parseInt(data.classes
                    .systemWallpaper));
                $('#aboutSystem').prop('checked', parseInt(data.classes.aboutSystem));
                $('#generateReport').prop('checked', parseInt(data.classes.generateReport));
                // console.log(data);
                // $("#rightsModal").modal("show");
            }
        });
    });


    $(".form-check-input1").on("change", function() {
        var checkboxId = $(this).attr("id");
        var isChecked = $(this).prop("checked") ? 1 : 0;

        selectedPrivileges[checkboxId] = isChecked;

        if (checkboxId === 'subsidiary' || checkboxId === 'supplier' || checkboxId ===
            'userFiltering') {
            if (isChecked) {
                $('#fileMaintenance').prop('checked', true);
                selectedPrivileges['fileMaintenance'] = 1;
            } else {
                if (!$('#subsidiary').prop('checked') && !$('#supplier').prop('checked') && !$(
                        '#userFiltering').prop('checked')) {
                    $('#fileMaintenance').prop('checked', false);
                    selectedPrivileges['fileMaintenance'] = 0;
                }
            }
        } else if (checkboxId === 'fileMaintenance') {
            if (isChecked) {
                $('#subsidiary').prop('checked', true);
                $('#supplier').prop('checked', true);
                $('#userFiltering').prop('checked', true);
                selectedPrivileges['subsidiary'] = 1;
                selectedPrivileges['supplier'] = 1;
                selectedPrivileges['userFiltering'] = 1;
            } else {
                $('#subsidiary').prop('checked', false);
                $('#supplier').prop('checked', false);
                $('#userFiltering').prop('checked', false);
                selectedPrivileges['subsidiary'] = 0;
                selectedPrivileges['supplier'] = 0;
                selectedPrivileges['userFiltering'] = 0;
            }
        }
        if (checkboxId === 'swaVo' || checkboxId === 'swaMis' || checkboxId === 'perVo' ||
            checkboxId === 'swaAcctg' || checkboxId === 'per' || checkboxId === 'swaForm' ||
            checkboxId === 'swaReports') {
            if (isChecked) {
                $('#swa').prop('checked', true);
                selectedPrivileges['swa'] = 1;
            } else {
                if (!$('#swaVo').prop('checked') && !$('#swaMis').prop('checked') && !$('#perVo').prop(
                        'checked') && !$('#swaAcctg').prop('checked') && !$('#per').prop('checked') && !
                    $('#swaForm').prop('checked') && !$('#swaReports').prop('checked')) {
                    $('#swa').prop('checked', false);
                    selectedPrivileges['swa'] = 0;
                }
            }
        } else if (checkboxId === 'swa') {
            if (isChecked) {
                $('#swaVo').prop('checked', true);
                $('#swaMis').prop('checked', true);
                $('#perVo').prop('checked', true);
                $('#swaAcctg').prop('checked', true);
                $('#per').prop('checked', true);
                $('#swaForm').prop('checked', true);
                $('#swaReports').prop('checked', true);
                selectedPrivileges['swaVo'] = 1;
                selectedPrivileges['swaMis'] = 1;
                selectedPrivileges['perVo'] = 1;
                selectedPrivileges['swaAcctg'] = 1;
                selectedPrivileges['per'] = 1;
                selectedPrivileges['swaForm'] = 1;
                selectedPrivileges['swaReports'] = 1;
            } else {
                $('#swaVo').prop('checked', false);
                $('#swaMis').prop('checked', false);
                $('#perVo').prop('checked', false);
                $('#swaAcctg').prop('checked', false);
                $('#per').prop('checked', false);
                $('#swaForm').prop('checked', false);
                $('#swaReports').prop('checked', false);
                selectedPrivileges['swaVo'] = 0;
                selectedPrivileges['swaMis'] = 0;
                selectedPrivileges['perVo'] = 0;
                selectedPrivileges['swaAcctg'] = 0;
                selectedPrivileges['per'] = 0;
                selectedPrivileges['swaForm'] = 0;
                selectedPrivileges['swaReports'] = 0;
            }
        }
        if (checkboxId === 'userType' || checkboxId === 'systemUser' || checkboxId === 'userMenu' ||
            checkboxId === 'menuSetting') {
            if (isChecked) {
                $('#systemManager').prop('checked', true);
                selectedPrivileges['systemManager'] = 1;
            } else {
                if (!$('#userType').prop('checked') && !$('#systemUser').prop('checked') && !$(
                        '#userMenu').prop('checked') && !$('#menuSetting').prop('checked')) {
                    $('#systemManager').prop('checked', false);
                    selectedPrivileges['systemManager'] = 0;
                }
            }
        } else if (checkboxId === 'systemManager') {
            if (isChecked) {
                $('#userType').prop('checked', true);
                $('#systemUser').prop('checked', true);
                $('#userMenu').prop('checked', true);
                $('#menuSetting').prop('checked', true);
                selectedPrivileges['userType'] = 1;
                selectedPrivileges['systemUser'] = 1;
                selectedPrivileges['userMenu'] = 1;
                selectedPrivileges['menuSetting'] = 1;
            } else {
                $('#userType').prop('checked', false);
                $('#systemUser').prop('checked', false);
                $('#userMenu').prop('checked', false);
                $('#menuSetting').prop('checked', false);
                selectedPrivileges['userType'] = 0;
                selectedPrivileges['systemUser'] = 0;
                selectedPrivileges['userMenu'] = 0;
                selectedPrivileges['menuSetting'] = 0;
            }
        }
        if (checkboxId === 'systemWallpaper' || checkboxId === 'aboutSystem' || checkboxId ===
            'generateReport') {
            if (isChecked) {
                $('#systemUtilities').prop('checked', true);
                selectedPrivileges['systemUtilities'] = 1;
            } else {
                if (!$('#systemWallpaper').prop('checked') && !$('#aboutSystem').prop('checked') && !$(
                        '#generateReport').prop('checked')) {
                    $('#systemUtilities').prop('checked', false);
                    selectedPrivileges['systemUtilities'] = 0;
                }
            }
        } else if (checkboxId === 'systemUtilities') {
            if (isChecked) {
                $('#systemWallpaper').prop('checked', true);
                $('#aboutSystem').prop('checked', true);
                $('#generateReport').prop('checked', true);
                selectedPrivileges['systemWallpaper'] = 1;
                selectedPrivileges['aboutSystem'] = 1;
                selectedPrivileges['generateReport'] = 1;
            } else {
                $('#systemWallpaper').prop('checked', false);
                $('#aboutSystem').prop('checked', false);
                $('#generateReport').prop('checked', false);
                selectedPrivileges['systemWallpaper'] = 0;
                selectedPrivileges['aboutSystem'] = 0;
                selectedPrivileges['generateReport'] = 0;
            }
        }
    });

    var initialPrivileges = {
        ...selectedPrivileges
    };
    $("#save-changes-button").on("click", function() {
        var changesMade = Object.keys(selectedPrivileges).some(key => initialPrivileges[key] !==
            selectedPrivileges[key]);
        if (!changesMade) {
            Swal.fire({
                title: 'No changes made',
                text: 'Please make changes before saving.',
                icon: 'error',
            });
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to save the changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '<?php echo base_url() ?>AdminController/savePrivileges',
                    type: "POST",
                    data: {
                        classId: selectedClassId,
                        privileges: selectedPrivileges
                    },
                    success: function(response) {
                        console.log("Response: " + response);
                        var responseData = JSON.parse(response);

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        });

                        // $("#rightsModal").modal("hide");
                    },

                    error: function(error) {
                        console.log("Error: " + error);
                    }

                });
            }
        });
    });

    var modal = $('#rightsModal');
    var user_classSpan = $('#selectedUserClass');
    var user_descriptionSpan = $('#selectedUserDescription');

    $(".assign-privilege-btn").on("click", function() {
        var user_class = $(this).data("user-class");
        var user_description = $(this).data("user-description");

        user_classSpan.text(user_class);
        user_descriptionSpan.text(user_description);

    });


    $('#classtable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });
    $('#privilegetable').DataTable({
        lengthChange: false,
        searching: false,
        paging: false,
        ordering: false
    });

    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });

  
});
</script>