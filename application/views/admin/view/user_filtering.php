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
                            <a href="<?php echo base_url() ?>AdminController/dash"><i class="feather icon-home"></i></a>
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
                                        <table id="usertable" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                 
                                                    <th>Username</th>
                                                    <th>User Class</th>
                                                    <!-- <th>Password</th>
                                                    <th>Status</th> -->
                                                    <th></th>
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
<script>
     $(document).ready(function() {
    $('#usertable').DataTable({
            lengthChange: false,
            language: {
                search: '',
                searchPlaceholder: 'Search...'
            }
        });

        $('.dataTables_filter input[type="search"]').css({
            'width': '300px',
            'margin-right': '10px',
            'padding': '5px',
            'box-sizing': 'border-box'
        });
    });
</script>