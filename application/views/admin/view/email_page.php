<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-mail bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Compose Email</h5>
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
                    <div class="card">
                        <div class="card-block email-card">
                            <div class="row">

                                <div class="col-lg-12 col-xl-3">
                                    <div class="user-body">
                                        <div class="p-20 text-center">
                                            <button data-toggle="modal" data-target="#emailSupplierModal" class="btn btn-danger waves-effect custom-btn-db">Compose</button>
                                        </div>
                                        <ul class="page-list nav nav-tabs flex-column" id="pills-tab" role="tablist">
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block active" data-toggle="pill"
                                                    href="#e-inbox" role="tab">
                                                    <i class="icofont icofont-inbox"></i> Inbox
                                                    <span class="label label-primary float-end">6</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                    href="#e-starred" role="tab">
                                                    <i class="icofont icofont-star"></i> Starred
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                    href="#e-drafts" role="tab">
                                                    <i class="icofont icofont-file-text"></i> Drafts
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                    href="#e-sent" role="tab">
                                                    <i class="icofont icofont-paper-plane"></i> Sent Mail
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section">
                                                <a class="nav-link waves-effect d-block" data-toggle="pill"
                                                    href="#e-trash" role="tab">
                                                    <i class="icofont icofont-ui-delete"></i> Trash
                                                    <span class="label label-info float-end">30</span>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>


                                <div class="col-lg-12 col-xl-9">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="e-inbox" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs waves-effect waves-light custom-btn-db custom-btn-db">
                                                        <i class="icofont icofont-exclamation-circle"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-success btn-xs waves-effect waves-light custom-btn-db custom-btn-db">
                                                        <i class="icofont icofont-inbox"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light custom-btn-db custom-btn-db">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            More
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mail-body-content">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-warning"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Google Inc</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Lorem ipsum
                                                                        dolor sit amet, consectetuer adipiscing elit</a>
                                                                </td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">08:01 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">John Doe</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Coming Up Next
                                                                        Week</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">13:02 PM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-info"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Sara Soudein</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SVG new updates
                                                                        comes for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">00:05 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Rinky Behl</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Photoshop
                                                                        updates are available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">10:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-warning"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Google Inc</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Lorem ipsum
                                                                        dolor sit amet, consectetuer adipiscing elit</a>
                                                                </td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">08:01 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">John Doe</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Coming Up Next
                                                                        Week</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">13:02 PM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-info"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Sara Soudein</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SVG new updates
                                                                        comes for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">00:05 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Rinky Behl</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Photoshop
                                                                        updates are available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">10:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="e-starred" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-star"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            More
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mail-body-content">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-warning"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Google Inc</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Lorem ipsum
                                                                        dolor sit amet, consectetuer adipiscing elit</a>
                                                                </td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">08:01 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">John Doe</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Coming Up Next
                                                                        Week</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">13:02 PM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-info"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Sara Soudein</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SVG new updates
                                                                        comes for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">00:05 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Rinky Behl</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Photoshop
                                                                        updates are available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">10:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="e-drafts" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <button type="button"
                                                        class="btn btn-success btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-inbox"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            More
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mail-body-content">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-warning"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Google Inc</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Lorem ipsum
                                                                        dolor sit amet, consectetuer adipiscing elit</a>
                                                                </td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">08:01 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">John Doe</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Coming Up Next
                                                                        Week</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">13:02 PM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-info"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Sara Soudein</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SVG new updates
                                                                        comes for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">00:05 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Rinky Behl</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Photoshop
                                                                        updates are available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">10:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="e-sent" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-exclamation-circle"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            More
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mail-body-content">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-warning"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Google Inc</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Lorem ipsum
                                                                        dolor sit amet, consectetuer adipiscing elit</a>
                                                                </td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">08:01 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">John Doe</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Coming Up Next
                                                                        Week</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">13:02 PM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-info"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Sara Soudein</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SVG new updates
                                                                        comes for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">00:05 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Rinky Behl</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Photoshop
                                                                        updates are available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">10:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="e-trash" role="tabpanel">
                                            <div class="mail-body">
                                                <div class="mail-body-header">
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs waves-effect waves-light custom-btn-db">
                                                        <i class="icofont icofont-exclamation-circle"></i>
                                                    </button>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icofont icofont-ui-folder"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group dropdown-split-primary">
                                                        <button type="button"
                                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split waves-effect waves-light custom-btn-db"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            More
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Another action</a>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Something else</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light custom-btn-db"
                                                                href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mail-body-content">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Rinky Behl</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Photoshop
                                                                        updates are available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">10:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Harry John</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">New upcoming
                                                                        data available</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">11:01 AM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i class="icofont icofont-star text-danger"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Hanry Joseph</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">SCSS current
                                                                        working for new updates</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">12:01 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-warning"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Google Inc</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Lorem ipsum
                                                                        dolor sit amet, consectetuer adipiscing elit</a>
                                                                </td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">08:01 AM</td>
                                                            </tr>
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">John Doe</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Coming Up Next
                                                                        Week</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">13:02 PM</td>
                                                            </tr>
                                                            <tr class="read">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="checkbox-fade fade-in-primary checkbox">
                                                                            <label class="form-label">
                                                                                <input type="checkbox" value>
                                                                                <span class="cr"><i
                                                                                        class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                            </label>
                                                                        </div>
                                                                        <i
                                                                            class="icofont icofont-star text-primary"></i>
                                                                    </div>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Liu Koi Yan</a>
                                                                </td>
                                                                <td><a href="email-read.html"
                                                                        class="email-name waves-effect">Charts waiting
                                                                        for you</a></td>
                                                                <td class="email-attch"><a href="#"><i
                                                                            class="icofont icofont-clip"></i></a></td>
                                                                <td class="email-time">07:15 AM</td>
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
                </div>
            </div>
        </div>
    </div>