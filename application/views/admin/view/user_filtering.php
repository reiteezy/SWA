<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-users bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>User Filtering</h5>
                        <span>Stock Withdrawal Advice System</span>
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
                        <li class="breadcrumb-item"><a href="#!">User Filtering</a>
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
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addUserModal"><i class="feather icon-plus"></i>Add New
                                        User</button> -->
                                </div>
                                <div class="card-block" style="padding-bottom: 50px;">
                                    <div class="table-responsive">
                                        <table id="usertable" class="table table-hover m-b-0">
                                            <thead>
                                                <tr>

                                                    <th>Username</th>
                                                    <th>User Class</th>
                                                    <th style="width: 15%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($users as $user):
                              ?>
                                                <tr>
                                                    <td><?php echo $user->USERNAME; ?></td>
                                                    <td><?php echo $user->CLASS; ?></td>

                                                    <td>
                                                        <button type="button"
                                                            class=" btn waves-effect waves-light btn-primary btn-icon assign-subsidiary-btn"
                                                            data-user-id="<?php echo $user->ID; ?>" data-toggle="modal"
                                                            data-target="#assignSubsidiaryModal"
                                                            data-username="<?php echo $user->USERNAME;?>">
                                                            <i class="icofont icofont-tag" style="padding-left: 5px;"></i>
                                                        </button>
                                                        <!-- <button type="button"
                                                            class="action-btn-c-red assigned-subsidiary-btn"
                                                            data-class-id="<?php echo $user->ID; ?>" data-toggle="modal"
                                                            data-target="#assignedSubsidiaryModal"
                                                            data-username="<?php echo $user->USERNAME;?>">
                                                            <i class="feather icon-tag f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Assigned</span>
                                                        </button> -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="assignSubsidiaryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="selectedUsername"></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- <div class="form-group"> -->
                        <input type="hidden" class="form-control" name="user_id" id="userId"> 
                    <!-- </div> -->
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#assigntable" role="tab">Tag Subsidiary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#assignedtable" role="tab">Tagged Subsidiaries</a>
                            </li>
                        </ul>
                        <div class="tab-content tabs card-block">
                            <div class="tab-pane active" id="assigntable" role="tabpanel">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0" id="assignTable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <!-- <th>#</th> -->
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                
                                foreach ($untagged as $row):
                                ?>
                                                <tr>
                                                    <!-- <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="subsidiary-assign-checkbox"
                                                                id="subsidiary_<?php echo $row['ID']; ?>">
                                                            <label class="form-check-label1"
                                                                for="subsidiary_<?php echo $row['ID']; ?>"></label>
                                                        </div>
                                                    </td> -->
                                                    <!-- <td><?php #echo $count++; ?></td> -->
                                                    <td><?php echo $row['CODE']; ?></td>
                                                    <td><?php echo $row['DESCRIPTION']; ?></td>
                                                    <td>
                                                        <button type="button" id="tagSubsidiaryBtn" class=" btn waves-effect waves-light btn-primary btn-icon" data-sub-id="<?php echo $row['ID']; ?>">
                                                        <i class="icofont icofont-tag" style="padding-left: 5px;"></i>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect "
                                        data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        id="saveTagBtn">Save</button>
                                </div>
                            </div>
                            <div class="tab-pane" id="assignedtable" role="tabpanel">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0" id="assignedTable"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                $count = 1;
                                $this->db->order_by('creation_date', 'ASC'); 
                                $subsidiary = $this->db->get('sub_tbl')->result_array();
                                foreach ($subsidiary as $row):
                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row['CODE']; ?></td>
                                                    <td><?php echo $row['DESCRIPTION']; ?></td>
                                                </tr>
                                                <?php  
                                endforeach;
                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect "
                                        data-dismiss="modal">Close</button>

                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var saveTagBtn = $('#saveTagBtn');
    $(document).on('click', '#tagSubsidiaryBtn', function() {
        // var subId = $(this).data('sub-id');
        // console.log("clicked. sub id is", subId);
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to tag to user?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                var userId = $('input[name="user_id"]').val();
                var subId = $(this).data('sub-id');
                console.log(userId);
                console.log(subId);
                $.ajax({
                    url: '<?php echo base_url() ?>UserController/tag_subsidiary',
                    type: 'POST',
                    data: {
                        sub_id: subId,
                        user_id: userId,
                    },
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            // location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $(".subsidiary-assign-checkbox").on("change", function() {
        var selectedDescriptions = [];

        $(".form-check-input1").each(function() {
            if ($(this).is(":checked")) {
                var description = $(this).data("description");
                selectedDescriptions.push(description);
            }
        });
    });

    //assign username on modal -
    var usernameSpan = $('#selectedUsername');
    var userIdField = $('#userId');

    $(".assign-subsidiary-btn").on("click", function() {
        var username = $(this).data("username");
        var userId = $(this).data("user-id");
        console.log(userId);
        usernameSpan.text(username);
        userIdField.val(userId);
        $.ajax({
                    url: '<?php echo base_url() ?>UserController/get_user_untagged_subsidiaries' + userId,
                    type: 'GET',
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            // location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });

    });



    var usernameSpan1 = $('#selectedUsername1');

    $(".assigned-subsidiary-btn").on("click", function() {
        var username = $(this).data("username");
        usernameSpan1.text(username);
    });


    $('#usertable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });

    $('#assignTable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        },
        info: false,
        ordering: false
    });

    $('#assignedTable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        },
        info: false,
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