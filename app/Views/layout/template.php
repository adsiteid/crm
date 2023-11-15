<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM ADSITE.ID</title>
    <link href="<?= base_url() ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/adsite/skydash/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/adsite/skydash/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/adsite/skydash/vendors/css/vendor.bundle.base.css">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/adsite/skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/adsite/skydash/vendors/iconly/bold.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/adsite/skydash/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/adsite/skydash/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>document/app_image/logo/logo-adsite-2.png" />

</head>


<style>
    .list:hover {
        background-color: #0B1460;
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
        background-color: #0B1460;
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
        background-color: #0B1460;
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


<?php if ($title == "Dashboard") : ?>


    <div class="d-lg-none w-100 " style="
 background: #F5F7FF;
    height: 15rem;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 0px 0px 30px 30px; 
">
    <?php endif; ?>

    <?php if ($title !== "Dashboard") : ?>


        <div class="d-lg-none w-100 " style="
    background: #F5F7FF;
    height: 15rem;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 0px 0px 30px 30px; 
">
        <?php endif; ?>




        <div class=" d-flex justify-content-between px-4 pt-3">



            <h4 class="text-primary pt-2"> <?= $title; ?></h4>


            <div class="d-flex">
                <div class="dropdown dropdown-animated scale-left" class="d-flex">
                    <a href="javascript:void(0);" data-toggle="dropdown">
                        <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="  ml-2">


                            <path d="M8.62504 20.8265V21.7218C8.62504 22.0746 8.6994 22.4238 8.84389 22.7497C8.98837 23.0756 9.20014 23.3717 9.46711 23.6211C9.73408 23.8706 10.051 24.0684 10.3998 24.2034C10.7486 24.3384 11.1225 24.4079 11.5 24.4079C11.8776 24.4079 12.2514 24.3384 12.6003 24.2034C12.9491 24.0684 13.266 23.8706 13.533 23.6211C13.7999 23.3717 14.0117 23.0756 14.1562 22.7497C14.3007 22.4238 14.375 22.0746 14.375 21.7218V20.8265M17.25 13.6637C17.25 16.3497 19.1667 20.8265 19.1667 20.8265H3.83337C3.83337 20.8265 5.75004 17.2451 5.75004 13.6637C5.75004 10.7377 8.36821 8.29166 11.5 8.29166C14.6319 8.29166 17.25 10.7377 17.25 13.6637Z" stroke="#0B1460" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />


                            <?php if ($notifNew->getNumRows() > 0) : ?>
                                <ellipse cx="16.5" cy="7.00704" rx="7.5" ry="7.00704" fill="#E24848" />
                            <?php endif; ?>
                        </svg>


                    </a>

                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list overflow-auto" style="height: 300px; width:350px;" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <?php
                        foreach ($notifNew->getResultArray() as $row) :
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

                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28 8V10.6667H4V8H28ZM28 24H20V21.3333H28V24ZM12 17.3333H28V14.6667H12V17.3333Z" stroke-width="1" fill="#0B1460" />

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

        <body class="sidebar-light sidebar-icon-only">
            <script src="<?= base_url() ?>vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <div class="container-scroller">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-lg-flex flex-row d-none">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="/"><img src="<?= base_url(); ?>/document/app_image/logo/logo-adsite.png" class="mr-2" alt="logo" /></a>
                        <!-- <a class="navbar-brand brand-logo-mini d-none" href="index.html"><img src="<?= base_url(); ?>/document/app_image/logo/favicon.jpg" alt=" logo" /></a> -->
                        <a class="navbar-brand brand-logo-mini overflow-visible object-fit-contain" style="width:50px;" href="/"><img src="<?= base_url(); ?>/document/app_image/logo/logo-adsite-3.png" alt=" logo" /></a>
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
                                        <input type="text" class="form-control rounded-left border-0 bg-light pl-3 " placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
                                        <div class="input-group-append">
                                            <button class="btn btn-light border-0 rounded-right" type="submit">
                                                <i class="icon-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                    <i class="icon-bell mx-0"></i>
                                    <span class="count bg-danger <?= ($notifNew->getNumRows() > 0) ? 'd-block' : 'd-none'; ?>"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list overflow-auto" style="height: 300px; width:300px;" aria-labelledby="notificationDropdown">
                                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                                    <?php
                                    foreach ($notifNew->getResultArray() as $row) :
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
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                    <?php if (user()->user_image !== 'default.jpg') : ?>
                                        <img src="<?= base_url(); ?>/document/image/profile/user/<?= user()->user_image; ?>" alt="profile" />
                                    <?php endif; ?>
                                    <?php if (user()->user_image == 'default.jpg') : ?>
                                        <img src="<?= base_url(); ?>/document/image/profile/default.jpg" alt="profile" />
                                    <?php endif; ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">


                                    <a href="<?= base_url(); ?>edit_user_id" class="dropdown-item">
                                        <i class="ti-settings text-primary"></i>
                                        Edit Profile
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
                                <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">Credit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="setting-content">
                            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                                <!-- content to do list -->


                                <div class="col px-4">
                                    ...
                                </div>



                            </div>
                            <!-- To do section tab ends -->
                            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                                <!-- CT -->

                                <div class="col px-4">
                                    ...
                                </div>

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

                            <li class="d-lg-block d-none nav-item <?php if ($title == 'Leads' || $title == 'New') {
                                                                        echo "active";
                                                                    } ?>">
                                <a class="nav-link" href="<?= base_url(); ?>leads/all">
                                    <i class="ti-id-badge menu-icon"></i>
                                    <span class="menu-title">Leads</span>
                                </a>
                            </li>


                            <li class="d-lg-block d-none nav-item <?php if ($title == "Leads Report" || $title == "Project Report" || $title == "Report") {
                                                                        echo "active";
                                                                    } ?> <?php echo $title == 'Leads Report' ? "active" : ""; ?>">
                                <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="Report">
                                    <i class="icon-bar-graph menu-icon"></i>
                                    <span class="menu-title">Report</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="report">
                                    <ul class="nav flex-column sub-menu rounded-bottom">
                                        <!-- <li class="nav-item"> <a class="nav-link" href="/report/chart">Chart All</a></li> -->
                                        <li class="nav-item "> <a class="nav-link " href="<?= base_url(); ?>reportleads/30">Leads Report</a></li>

                                        <li class="nav-item "> <a class="nav-link " href="<?= base_url(); ?>report_project/30">Project Report</a></li>
                                        <li class="nav-item "> <a class="nav-link " href="<?= base_url(); ?>report_source/30">Source Report</a></li>


                                        <li class="nav-item "> <a class="nav-link pb-4" href="<?= base_url(); ?>report_sales_filter/30">Sales Report</a></li>

                                        <!-- <li class="nav-item "> <a class="nav-link " href="<?= base_url(); ?>export_leads/30">Export Leads</a></li> -->

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




                            <li class="nav-item <?php if ($title == 'User') {
                                                    echo "active";
                                                } ?>">
                                <a class="nav-link" href="<?= base_url(); ?>user/agent">
                                    <i class="icon-head menu-icon"></i>
                                    <span class="menu-title">Group</span>
                                </a>
                            </li>


                            <li class="nav-item <?php if ($title == "List Event") {
                                                    echo "active";
                                                } ?>">
                                <a class="nav-link  " href="<?= base_url(); ?>list_event/30">
                                    <i class="ti-calendar menu-icon"></i>
                                    <span class="menu-title">Event</span>
                                </a>
                            </li>


                            <li class="nav-item <?php if ($title == 'Submission') {
                                                    echo "active";
                                                } ?>">
                                <a class="nav-link" href="<?= base_url(); ?>submission/30">
                                    <i class="icon-paper menu-icon"></i>
                                    <span class="menu-title">Submission</span>
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
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>create/groups">Add Group </a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_project">Add Project </a></li>
                                        <?php if (in_groups('admin')) : ?>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_user">Add User</a></li>
                                        <?php endif; ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_event">Add Event </a></li>


                                        <!-- <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>msdp">Form MSDP </a></li> -->

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


                               
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>edit_user_id">
                                        <i class="ti-settings menu-icon"></i>
                                        <span class="menu-title">Edit Profile</span>
                                    </a>
                                </li>


                                <!-- <li class="nav-item <?php if ($title == 'leads') {
                                                                echo "active";
                                                            } ?>">
                                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                                        <i class="ti-id-badge menu-icon"></i>
                                        <span class="menu-title">Leads</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="ui-basic">
                                        <ul class="nav flex-column sub-menu rounded-bottom">
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/all">All</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/new">New</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/close">Close</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/pending">Pending</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/contacted">Contacted</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/visit">Visit</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>leads/deal">Deal</a></li>
                                        </ul>
                                    </div>
                                </li> -->
                                <!-- <li class=" nav-item <?php if ($title == 'Report') {
                                                                echo "active";
                                                            } ?>">
                                    <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="Report">
                                        <i class="icon-bar-graph menu-icon"></i>
                                        <span class="menu-title">Report</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="report">
                                        <ul class="nav flex-column sub-menu rounded-bottom">
                                            <li class="nav-item"> <a class="nav-link " href="<?= base_url(); ?>reportleads/30">Leads Report</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report_project/30">Project Report</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report_source/30">Source Report</a></li>
                                            <?php if (!in_groups('sales')) : ?>
                                                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>report_sales_filter/30">Sales Report</a></li>
                                            <?php endif; ?>
                                            <li class="nav-item "> <a class="nav-link " href="<?= base_url(); ?>export_leads/30">Export Leads</a></li>
                                        </ul>
                                    </div>
                                </li> -->
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
                                    <a class="nav-link" href="<?= base_url(); ?>user/agent">
                                        <i class="icon-head menu-icon"></i>
                                        <span class="menu-title">Group</span>
                                    </a>
                                </li>

                                <li class="nav-item <?php if ($title == 'List Event') {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>list_event/30">
                                        <i class="ti-calendar menu-icon"></i>
                                        <span class="menu-title">Event</span>
                                    </a>
                                </li>



                                <li class="nav-item <?php if ($title == 'Submission') {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>submission/30">
                                        <i class="icon-paper menu-icon"></i>
                                        <span class="menu-title">Submission</span>
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

                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_project">Add Project </a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_user">Add User</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>add_event">Add Event </a></li>

                                            <!-- <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>msdp">Form MSDP </a></li> -->

                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item ">
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

                            <?= $this->renderSection('content'); ?>

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
                        <a href="<?= base_url("/reportleads/30") ?>" class="col d-flex justify-content-center">
                            <span class="icon-holder">
                                <i class="icon-bar-graph menu-icon"></i>
                            </span>
                        </a>
                        <a class="col d-flex justify-content-center p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            <span class="px-3 mx-3  " style="border-radius:15px; background: rgb(0,83,158); background: linear-gradient(0deg, rgba(0,83,158,1) 0%, rgba(32,30,92,1) 93%);">
                                <div id="addIcon" class="material-icons py-2" style="font-size: 20px; color:#fff;">+</div>
                            </span>
                        </a>
                        <a href="<?= base_url("/leads/all") ?>" class="col d-flex justify-content-center">
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

            <div class="offcanvas offcanvas-bottom bg-light" style="height:35%;" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Add Data</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">

                    <a href="<?= base_url(); ?>add_leads" type="button" class="btn btn-light bg-white w-100 mb-2">Add Leads</a>
                    <a href="<?= base_url(); ?>add_event" type="button" class="btn btn-light bg-white  w-100 mb-2">Add Event</a>
                    <a href="<?= base_url(); ?>submission/30" type="button" class="btn btn-light bg-white w-100 mb-2">Submission</a>
                    <!-- <a href="<?= base_url(); ?>add_event" type="button" class="btn btn-light bg-white w-100 mb-2">Absen</a> -->
                </div>
            </div>

            <div class="my-5"></div>


            <!-- plugins:js -->
            <script src="<?= base_url() ?>vendor/adsite/skydash/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="<?= base_url() ?>vendor/adsite/skydash/vendors/chart.js/Chart.min.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/vendors/datatables.net/jquery.dataTables.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/dataTables.select.min.js"></script>

            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/off-canvas.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/hoverable-collapse.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/template.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/settings.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/dashboard.js"></script>
            <script src="<?= base_url() ?>vendor/adsite/skydash/js/Chart.roundedBarCharts.js"></script>
            <!-- End custom js for this page-->
        </body>

</html>