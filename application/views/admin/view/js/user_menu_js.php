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