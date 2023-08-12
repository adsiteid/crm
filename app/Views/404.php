<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM Diamondland</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/document/app_image/logo/favicon.jpg" />

</head>


<style>
    .list:hover {
        background-color: #1F3960;
    }

    .fab {
        background-color: transparent;
        height: 50px;
        width: 50px;
        border-radius: 32px;
        transition: height 300ms;
        transition-timing-function: ease;
        position: fixed;
        right: 30px;
        bottom: 30px;
        /* tinggi tombol */
        text-align: center;
        overflow: hidden;
        z-index: 10;
    }

    .fab:hover {
        height: 150px;
        /* tinggi icon muncul */
    }

    .fab:hover .mainop {
        transform: rotate(180deg);
    }

    .mainop {
        margin: auto;
        width: 50px;
        height: 50px;
        position: absolute;
        bottom: 0;
        right: 0;
        transition: transform 300ms;
        background-color: #1F3960;
        border-radius: 100px;
        z-index: 6;
    }



    .mainop i {
        margin-top: 10px;
        font-size: 32px;
        color: #fff;
    }

    .minifab {
        position: relative;
        width: 48px;
        height: 48px;
        border-radius: 24px;
        z-index: 5;
        background-color: blue;
        transition: box-shadow 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }



    .op {
        background-color: #1F3960;
    }
</style>


<style>
    .table thead th,
    .jsgrid .jsgrid-table thead th {
        border-top: 0;
        border-bottom-width: 0px;
        font-weight: 600;
        font-size: .8rem;
    }
</style>


<div class="d-lg-none w-100 " style="
    background: #f5f7ff;
    height: 16rem;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 0px 0px 15px 15px; 
">

    <div class=" d-flex justify-content-between px-4 pt-3">
        <h4 class="text-primary pt-2"> <?= $title; ?></h4>

        <div class="d-flex">
            <div class="dropdown dropdown-animated scale-left" class="d-flex">
                <a href="javascript:void(0);" data-toggle="dropdown">
                    <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="  ml-2">
                        <path d="M8.62504 20.8265V21.7218C8.62504 22.0746 8.6994 22.4238 8.84389 22.7497C8.98837 23.0756 9.20014 23.3717 9.46711 23.6211C9.73408 23.8706 10.051 24.0684 10.3998 24.2034C10.7486 24.3384 11.1225 24.4079 11.5 24.4079C11.8776 24.4079 12.2514 24.3384 12.6003 24.2034C12.9491 24.0684 13.266 23.8706 13.533 23.6211C13.7999 23.3717 14.0117 23.0756 14.1562 22.7497C14.3007 22.4238 14.375 22.0746 14.375 21.7218V20.8265M17.25 13.6637C17.25 16.3497 19.1667 20.8265 19.1667 20.8265H3.83337C3.83337 20.8265 5.75004 17.2451 5.75004 13.6637C5.75004 10.7377 8.36821 8.29166 11.5 8.29166C14.6319 8.29166 17.25 10.7377 17.25 13.6637Z" stroke="#1F3960" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <ellipse cx="16.5" cy="7.00704" rx="7.5" ry="7.00704" fill="#E24848" />
                    </svg>
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list overflow-auto" style="height: 300px; width:350px;" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    <?php
                    foreach ($new->getResultArray() as $row) :
                    ?>
                        <a class="dropdown-item preview-item " href="<?= base_url(); ?>leads/<?= $row['id']; ?>">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal"><?= $row['nama_leads']; ?></h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    <?php
                                    $date_new = $row['time_stamp_new'];
                                    $tanggal_convert = date('d/m/Y', strtotime($date_new));
                                    echo $tanggal_convert;
                                    ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>
                <!-- <div class="dropdown-menu pop-notification">
                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                        <p class="text-dark font-weight-semibold m-b-0">
                            <i class="anticon anticon-bell "></i>
                            <span class="m-l-10">Notification</span>

                        </p>
                        <a class="btn-sm btn-default btn" href="<?= base_url() ?>leads/new">
                            <small>View All</small>
                        </a>
                    </div>
                    <div class="relative">
                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px; ">
                            <a href="data_leads.php?id=id" class="dropdown-item p-15 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <div class="mb-0 text-dark">Nama Leads</div>
                                        <div class="my-0 text-muted"><small>New Leads</small></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- TOGGLE MOBILE -->

            <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                <a href="javascript:void(0);"> <!-- data-toggle="dropdown" -->
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-3">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28 8V10.6667H4V8H28ZM28 24H20V21.3333H28V24ZM12 17.3333H28V14.6667H12V17.3333Z" stroke-width="1" fill="#1F3960" />
                    </svg>
                </a>

                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">Agit Agustian</p>
                                <p class="m-b-0 opacity-07">Admin</p>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a type="button" class="dropdown-item d-block p-h-15 p-v-10" data-toggle="modal" data-target="#logoutModal">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Logout</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- sidebar-dark sidebar-icon-only -->

<body class="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-lg-flex flex-row d-none">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/"><img src="<?= base_url(); ?>/document/app_image/logo/logo-diamondland-1.png" class="mr-2" alt="logo" /></a>
                <!-- <a class="navbar-brand brand-logo-mini d-none" href="index.html"><img src="<?= base_url(); ?>/document/app_image/logo/favicon.jpg" alt=" logo" /></a> -->
                <a class="navbar-brand brand-logo-mini overflow-visible object-fit-contain" style="width:50px;" href="/"><img src="<?= base_url(); ?>/document/app_image/logo/logo-diamondland-1.png" alt=" logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <!-- search  -->
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li>
                        <form action="<?= base_url(); ?>search_leads" method="post" class=" d-lg-block d-none form-inline ">
                            <div class="input-group input-group-sm mt-2 mr-3 ">
                                <input type="text" class="form-control rounded-left bg-light pl-3 " placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded-right" type="submit">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count bg-danger" <?php ($new->getNumRows() == '') ? 'd-none' : 'd-block' ?>></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list overflow-auto" style="height: 300px; width:300px;" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <?php
                            foreach ($new->getResultArray() as $row) :
                            ?>
                                <a class="dropdown-item preview-item " href="<?= base_url(); ?>leads/<?= $row['id']; ?>">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="ti-info-alt mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal"><?= $row['nama_leads']; ?></h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            <?php
                                            $date_new = $row['time_stamp_new'];
                                            $tanggal_convert = date('d/m/Y', strtotime($date_new));
                                            echo $tanggal_convert;
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                            <!-- <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a> -->
                            <!-- <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a> -->
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url(); ?>/document/image/profile/<?= user()->user_image; ?>" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li> -->
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="<?= base_url(); ?>/assets/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="<?= base_url(); ?>/assets/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="d-lg-block d-none nav-item <?php if ($title == 'Dashboard') {
                                                                echo "active";
                                                            } ?>">
                        <a class="nav-link  " href="<?= base_url(); ?>">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>



                    <li class="nav-item <?php if ($title == 'leads') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="ti-id-badge menu-icon"></i>
                            <span class="menu-title">Leads</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu rounded-bottom">
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/new">New</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/close">Close</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/pending">Pending</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/contacted">Contacted</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/visit">Visit</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/deal">Deal</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="d-lg-block d-none nav-item <?php if ($title == 'report') {
                                                                echo "active";
                                                            } ?>">
                        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Report</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="report">
                            <ul class="nav flex-column sub-menu rounded-bottom">
                                <!-- <li class="nav-item"> <a class="nav-link" href="/report/chart">Chart All</a></li> -->
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_report">Leads Report</a></li>
                                <?php if (in_groups('admin')) : ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_subholding">Subholding Report</a></li>
                                <?php endif; ?>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_project">Project Report</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_source">Source Report</a></li>
                                <?php if (in_groups('admin')) : ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/sales">Sales Report</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="d-lg-block d-none nav-item <?php if ($title == 'list_project') {
                                                                echo "active";
                                                            } ?>">
                        <a class="nav-link" href="<?= base_url(); ?>list_project">
                            <i class="ti-gallery menu-icon"></i>
                            <span class="menu-title">Project</span>
                        </a>
                    </li>

                    <li class="nav-item <?php if ($title == 'user') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">User</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu rounded-bottom">
                                <?php if (in_groups('admin')) : ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>user/admin"> Admin </a></li>
                                <?php endif; ?>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>user/agent"> Sales </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item <?php if ($title == 'List Event') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url(); ?>list_event">
                            <i class="ti-calendar menu-icon"></i>
                            <span class="menu-title">Event</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu rounded-bottom">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                            </ul>
                        </div>
                    </li> -->


                    <li class="nav-item <?php if ($title == 'absen') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="/edit">
                            <i class="ti-check-box menu-icon"></i>
                            <span class="menu-title">Absen</span>
                        </a>
                    </li>

                    <li class="nav-item <?php if ($title == 'MSDP') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url(); ?>msdp/list_msdp">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">MSDP</span>
                        </a>
                    </li>




                    <li class="d-lg-block d-none nav-item <?php if ($title == 'edit') {
                                                                echo "active";
                                                            } ?>">
                        <a class="nav-link" data-toggle="collapse" href="#edit" aria-expanded="false" aria-controls="edit">
                            <i class="ti-pencil-alt menu-icon"></i>
                            <span class="menu-title">Add Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse  " id="edit">
                            <ul class="nav flex-column sub-menu rounded-bottom">
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_leads">Add Leads </a></li>
                                <?php if (in_groups('admin')) : ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_project">Add Project </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_user">Add User</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_event">Add Event </a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>msdp">Form MSDP </a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>




            <!-- SIDEBAR MOBILE -->

            <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> -->

            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">User Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body sidebar">
                    <ul class="nav">
                        <li class="d-lg-block d-none nav-item <?php if ($title == 'Dashboard') {
                                                                    echo "active";
                                                                } ?>">
                            <a class="nav-link  " href="<?= base_url(); ?>">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>



                        <li class="nav-item <?php if ($title == 'leads') {
                                                echo "active";
                                            } ?>">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                                <i class="ti-id-badge menu-icon"></i>
                                <span class="menu-title">Leads</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu rounded-bottom">
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/new">New</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/close">Close</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/pending">Pending</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/contacted">Contacted</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/visit">Visit</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/deal">Deal</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class=" nav-item <?php if ($title == 'report') {
                                                    echo "active";
                                                } ?>">
                            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
                                <i class="icon-bar-graph menu-icon"></i>
                                <span class="menu-title">Report</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="report">
                                <ul class="nav flex-column sub-menu rounded-bottom">
                                    <!-- <li class="nav-item"> <a class="nav-link" href="/report/chart">Chart All</a></li> -->
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_report">Leads Report</a></li>
                                    <?php if (in_groups('admin')) : ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_subholding">Subholding Report</a></li>
                                    <?php endif; ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_project">Project Report</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/leads_source">Source Report</a></li>
                                    <?php if (in_groups('admin')) : ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report/sales">Sales Report</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                        <li class="d-lg-block d-none nav-item <?php if ($title == 'list_project') {
                                                                    echo "active";
                                                                } ?>">
                            <a class="nav-link" href="<?= base_url(); ?>list_project">
                                <i class="ti-gallery menu-icon"></i>
                                <span class="menu-title">Project</span>
                            </a>
                        </li>

                        <li class="nav-item <?php if ($title == 'user') {
                                                echo "active";
                                            } ?>">
                            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                                <i class="icon-head menu-icon"></i>
                                <span class="menu-title">User</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="auth">
                                <ul class="nav flex-column sub-menu rounded-bottom">
                                    <?php if (in_groups('admin')) : ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>user/admin"> Admin </a></li>
                                    <?php endif; ?>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>user/agent"> Sales </a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item <?php if ($title == 'List Event') {
                                                echo "active";
                                            } ?>">
                            <a class="nav-link" href="<?= base_url(); ?>list_event">
                                <i class="ti-calendar menu-icon"></i>
                                <span class="menu-title">Event</span>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu rounded-bottom">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                            </ul>
                        </div>
                    </li> -->


                        <li class="nav-item <?php if ($title == 'absen') {
                                                echo "active";
                                            } ?>">
                            <a class="nav-link" href="/edit">
                                <i class="ti-check-box menu-icon"></i>
                                <span class="menu-title">Absen</span>
                            </a>
                        </li>

                        <li class="nav-item <?php if ($title == 'MSDP') {
                                                echo "active";
                                            } ?>">
                            <a class="nav-link" href="<?= base_url(); ?>msdp/list_msdp">
                                <i class="icon-paper menu-icon"></i>
                                <span class="menu-title">MSDP</span>
                            </a>
                        </li>


                        <li class="d-lg-block d-none nav-item <?php if ($title == 'edit') {
                                                                    echo "active";
                                                                } ?>">
                            <a class="nav-link" data-toggle="collapse" href="#edit" aria-expanded="false" aria-controls="edit">
                                <i class="ti-pencil-alt menu-icon"></i>
                                <span class="menu-title">Add/Edit Data</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse  " id="edit">
                                <ul class="nav flex-column sub-menu rounded-bottom">
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_leads">Add Leads </a></li>
                                    <?php if (in_groups('admin')) : ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_project">Add Project </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_user">Add User</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_event">Add Event </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>msdp">Form MSDP </a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item <?php if ($title == 'absen') {
                                                echo "active";
                                            } ?>">
                            <a class="nav-link" href="<?= base_url(); ?>/logout">
                                <i class="ti-power-off text-primary mr-3"></i>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>



            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">


                    <!-- KONTEN -->

                    <div class="container-fluid bg-white justify-content-center rounded  ">
                        <div class="row d-flex justify-content-center">
                            <div class="row d-flex justify-content-center mb-0 p-0 ">
                                <img class="col-lg-6 col-12 p-0 " src="<?= base_url() ?>/document/app_image/notfound/notfound-6.gif">
                            </div>
                            <div class="col-12 mb-4 mt-0 p-0">
                                <h4 class="d-flex justify-content-center  col-12">404 NOT FOUND</h4>
                            </div>
                        </div>
                    </div>

                    <!-- AKHIR KONTEN -->



                    
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->

    <!-- Logout Modal-->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Continue logout this session ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <nav class=" bg-white fixed-bottom py-3 d-lg-none d-block">
        <div class="container-fluid">

            <div class="row d-flex align-items-center">

                <a href="<?= base_url("/") ?>" class="col d-flex justify-content-center">
                    <span class="icon-holder">
                        <i class="icon-grid menu-icon"></i>
                    </span>
                </a>
                <a href="<?= base_url("/report/leads_report") ?>" class="col d-flex justify-content-center">
                    <span class="icon-holder">
                        <i class="icon-bar-graph menu-icon"></i>
                    </span>
                </a>
                <a class="col d-flex justify-content-center p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <span class=" rounded px-3 mx-3  " style="background-color:#1F3960">
                        <div id="addIcon" class="material-icons py-2" style="font-size: 20px; color:#fff;">+</div>
                    </span>
                </a>
                <a href="<?= base_url("/leads/new") ?>" class="col d-flex justify-content-center">
                    <span class="icon-holder">
                        <i class="ti-id-badge menu-icon " style="font-size: large;"></i>
                    </span>
                </a>

                <a href="<?= base_url("/list_project") ?>" class="col d-flex justify-content-center">
                    <span class="icon-holder">
                        <i class="ti-gallery menu-icon"></i>
                    </span>
                </a>

            </div>

        </div>
    </nav>



    <!-- FLOAT BUTTON -->
    <div class="mainopShadow d-lg-block d-none"></div>
    <div class="fab d-lg-block d-none">
        <div class="mainop button_float d-flex justify-content-center align-items-center">
            <div id="addIcon" class="material-icons" style="font-size: 30px; color:#fff;">+</div>
        </div>

        <div id="sheets" type="button" class="minifab op btn btn-primary p-3" onclick="location.href='<?= base_url(); ?>add_leads'">
            <i class="ti-id-badge menu-icon"></i>
        </div>
        <div id=" sheets" class="minifab op btn btn-primary p-3 " type="button" onclick="location.href='<?= base_url(); ?>add_user'">
            <i class="icon-head menu-icon" style="color:#fff;"></i>
        </div>
    </div>






    <!-- ADD EDIT DATA OFF CANVAS BUTTON -->
    <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button> -->

    <div class="offcanvas offcanvas-bottom bg-light" style="height:55%;" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Add Data</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            <a href="<?= base_url(); ?>add_leads" type="button" class="btn btn-light bg-white w-100 mb-2">Add Leads</a>
            <a href="<?= base_url(); ?>add_user" type="button" class="btn btn-light bg-white w-100 mb-2">Add User</a>
            <a href="<?= base_url(); ?>add_project" type="button" class="btn btn-light bg-white  w-100 mb-2">Add Project</a>
            <a href="<?= base_url(); ?>add_event" type="button" class="btn btn-light bg-white  w-100 mb-2">Add Event</a>
            <a href="<?= base_url(); ?>msdp" type="button" class="btn btn-light bg-white w-100 mb-2">MSDP</a>
            <a href="<?= base_url(); ?>add_event" type="button" class="btn btn-light bg-white w-100 mb-2">Absen</a>
        </div>
    </div>

    <div class="my-5"></div>


    <!-- plugins:js -->
    <script src="<?= base_url(); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url(); ?>/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>/assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url(); ?>/assets/js/template.js"></script>
    <script src="<?= base_url(); ?>/assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url(); ?>/assets/js/dashboard.js"></script>
    <script src="<?= base_url(); ?>/assets/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>