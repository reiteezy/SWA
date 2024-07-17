<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>User Type</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/dash"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">User Class</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add</a>
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
                                    <h5>Add New Class</h5>
                                    <span></span>
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="" novalidate>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Class Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter class name">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Class Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="password"
                                                    name="password" placeholder="Enter description">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        
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