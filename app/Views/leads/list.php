<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<style>
    .simple-pagination ul {
        margin: 0 0 20px;
        padding: 0;
        list-style: none;
        text-align: left;
    }

    .simple-pagination li {
        display: inline-block;
        margin-right: 5px;

    }

    .simple-pagination li a,
    .simple-pagination li span {
        color: #666;
        padding: 8px 12px;
        text-decoration: none;
        background-color: #FFF;
        border-radius: 5px;
    }

    .simple-pagination .current {
        color: #1F3960;
        background-color: #fff;
        border: 1px;
        /* border-style: solid; */
    }

    .simple-pagination .prev.current,
    .simple-pagination .next.current {
        background: #fff;
    }

    .swiper-wrapper {
        position: relative;
        width: 100%;
        /* height: 63px !important; */
        height: 45px !important;
    }
</style>


<?php

function gantiformat($nomorhp)
{
    $nomorhp = trim($nomorhp);
    $nomorhp = strip_tags($nomorhp);
    $nomorhp = str_replace(" ", "", $nomorhp);
    $nomorhp = str_replace("(", "", $nomorhp);
    $nomorhp = str_replace(".", "", $nomorhp);
    $nomorhp = str_replace("-", "", $nomorhp);

    if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
        if (substr(trim($nomorhp), 0, 3) == '+62') {
            $nomorhp = trim($nomorhp);
        } elseif (substr($nomorhp, 0, 1) == '0') {
            $nomorhp = '+62' . substr($nomorhp, 1);
        }
    }
    return $nomorhp;
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>

<?php
$now = date('Y/m/d');
$in30 = date('Y/m/d', strtotime($now . ' - 30 days'));
?>


<div class="d-lg-none d-flex align-items-center justify-content-between mb-lg-1 mb-3 pb-3 pt-0 mt-0 ">
    <div class="col-10 p-0">
        <p class="mb-0 text-muted" style="font-size:12px;">Welcome Back !</p>
        <h5 class="mb-0 text-primary d-lg-block d-none"><?= user()->fullname; ?></h5>
        <h5 class="mb-0 text-primary d-lg-none d-block"><?= user()->fullname; ?></h5>
    </div>

    <div class="col-2 d-lg-none d-sm-block d-block px-0  ">
        <a href="#" type="button" class="btn btn-light bg-white rounded  w-100 d-flex justify-content-center align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasBottom"><i class="ti-filter "></i> </a>
    </div>



    <!-- <div class="d-flex p-0">

        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $days; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>getleads/90">Last 90 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>getleads/30">Last 30 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>getleads/7">Last 7 Days</a>
                <a type="button" class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRange" aria-controls="offcanvasRange">Custom Range</a>
            </div>
        </div>
    </div> -->
</div>


<!-- <div class="card my-3 d-lg-none d-block" style="background-image: url(' <?= base_url() ?>document/app_image/images/bg-earnings.png'); background-repeat : no-repeat; background-size : cover;">
    <div class="col p-4">
        <div class="row">
            <div class="col-8">
                <h6 class="text-white small">Total Income</h6>
                <h4 class="text-white"> <strong>
                        Rp.
                        <?php
                        $booking = 0;
                        foreach ($leadsBooking->getResultArray() as $cb) :
                            $booking += $cb['booking'];
                        endforeach;

                        $reserve = 0;
                        foreach ($leadsReserve->getResultArray() as $cr) :
                            $reserve += $cr['reserve'];
                        endforeach;

                        echo $reserve + $booking;

                        ?>

                    </strong></h4>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a href="<?= base_url(); ?>reportleads/30" type="button" class="rounded-circle bg-white text-center pt-1" style="width:30px; height:30px;">
                    <i class="ti-angle-right text-primary small"></i>
                </a>
            </div>
        </div>

        <hr style="border-width:1;color:#fff; background-color:#fff;">

        <h6 class="text-white small">Total Deals :
            <?= $leadsDeal->getNumRows(); ?>
        </h6>
    </div>
</div> -->


<div class="swiper-wrapper d-lg-none d-block mb-3">

    <div class="swiper-container">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/all" type="button" class=" col px-0 btn  <?= ($title == "Last 30 Days") ? 'btn-primary' : 'btn-light bg-white'; ?> rounded mr-1 small" <?= ($title == "Last 30 Days" || $title == "Last 90 Days" || $title == "Last 7 Days") ? 'autofocus' : ''; ?>> All </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/new" type="button" class="col px-0 btn  <?= ($title == "New") ? 'btn-primary' : 'btn-light bg-white'; ?> rounded mr-1 small" <?= ($title == "New") ? 'autofocus' : ''; ?>> New </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/close" type=" button" class="col px-0 btn <?= ($title == "Close") ? 'btn-primary' : 'btn-light bg-white'; ?>  rounded mr-1 small" <?= ($title == "Close") ? 'autofocus' : ''; ?>> Close </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/pending" type="button" class="col px-0 btn <?= ($title == "Pending") ? 'btn-primary' : 'btn-light bg-white'; ?>  rounded mr-1 small" <?= ($title == "Pending") ? 'autofocus' : ''; ?>> Pending </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/contacted" type="button" class="col px-0 btn <?= ($title == "Contacted") ? 'btn-primary' : 'btn-light bg-white'; ?>  rounded mr-1 small" <?= ($title == "Contacted") ? 'autofocus' : ''; ?>> Contacted </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/visit" type="button" class="col px-0 btn <?= ($title == "Visit") ? 'btn-primary' : 'btn-light bg-white'; ?> rounded mr-1 small" <?= ($title == "Visit") ? 'autofocus' : ''; ?>> Visit </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>leads/deal" type="button" class="col px-0 btn <?= ($title == "Deal") ? 'btn-primary' : 'btn-light bg-white'; ?> rounded mr-1 small" <?= ($title == "Deal") ? 'autofocus' : ''; ?>> Deal </a>
            </div>
        </div>

    </div>

</div>


<!-- <div class="swiper-wrapper d-lg-none d-block mb-3">

    <div class="swiper-container">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="<?= base_url(); ?>leads/new" class="card rounded">
                    <div class=" d-flex align-items-center justify-content-between p-3 ">

                        <div class="text-lg-left ">
                            <h6 class="text-muted font-semibold mb-1 " style="font-size:10px;">New</h6>
                            <h4 class="fw-bold fs-6 mb-0 "><?= $new->getNumRows(); ?></h4>
                        </div>

                        <i class="ti-import text-success d-lg-none d-block btn-inverse-success p-2 rounded" style="font-size: 11px;"></i>

                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url(); ?>leads/close" class="card rounded">
                    <div class=" d-flex align-items-center justify-content-between p-3 ">

                        <div class="text-lg-left ">
                            <h6 class="text-muted font-semibold mb-1" style="font-size:10px;">Close</h6>
                            <h4 class="fw-bold fs-6 mb-0 "><?= $close->getNumRows(); ?></h4>
                        </div>

                        <i class="ti-trash text-muted d-lg-none d-block btn-inverse-secondary p-2 rounded" style="font-size: 12px; "></i>

                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url(); ?>leads/pending" class="card rounded">
                    <div class=" d-flex align-items-center justify-content-between p-3 ">

                        <div class="text-lg-left ">
                            <h6 class="text-muted font-semibold mb-1" style="font-size:10px;">Pending</h6>
                            <h4 class="fw-bold fs-6 mb-0"><?= $pending->getNumRows(); ?></h4>
                        </div>

                        <i class="ti-time text-primary d-lg-none d-block btn-inverse-primary p-2  rounded ml-1" style="font-size: 12px; width:29px; height:29px;"></i>

                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url(); ?>leads/contacted" class="card rounded ">
                    <div class=" d-flex align-items-center justify-content-between p-3 ">

                        <div class="text-lg-left ">
                            <h6 class="text-muted font-semibold mb-1" style="font-size:10px;">Contacted</h6>
                            <h4 class="fw-bold fs-6 mb-0"><?= $contacted->getNumRows(); ?></h4>
                        </div>

                        <i class="ti-comment-alt text-warning d-lg-none p-2 d-block btn-inverse-warning rounded ml-2" style="font-size: 13px; width:29px; height:29px;"></i>

                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url(); ?>leads/visit" class="card rounded">
                    <div class=" d-flex align-items-center justify-content-between p-3 ">

                        <div class="text-lg-left ">
                            <h6 class="text-muted font-semibold mb-1" style="font-size:10px;">Visit</h6>
                            <h4 class="fw-bold fs-6 mb-0"><?= $visit->getNumRows(); ?></h4>
                        </div>

                        <i class="ti-location-pin text-info d-lg-none d-block btn-inverse-info rounded p-2" style="font-size: 13px;"></i>

                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url(); ?>leads/deal" class="card rounded ">
                    <div class=" d-flex align-items-center justify-content-between p-3 ">

                        <div class="text-lg-left ">
                            <h6 class="text-muted font-semibold mb-1 " style="font-size:10px;">Deal</h6>
                            <h4 class="fw-bold fs-6 mb-0"><?= $deal->getNumRows(); ?></h4>
                        </div>

                        <i class="ti-crown text-danger d-lg-none d-block btn-inverse-danger rounded p-2" style="font-size: 13px;"></i>

                    </div>
                </a>
            </div>
        </div>

    </div>

</div> -->



<div class="card">
    <div class="card-body">

        <!-- search -->

        <div class="d-flex col-12 p-0">
            <div class="col-12 px-0 "> <!-- pr-2 -->
                <form action="<?= base_url(); ?>search_leads" method="post" class=" d-lg-none  d-sm-block d-block  form-inline mb-4 mt-0  navbar-search">
                    <div class="input-group ">
                        <input type="text" class="form-control rounded-left small bg-light border-0" placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
                        <div class="input-group-append">
                            <button class="btn btn-light bg-light border-0 rounded-right px-3" type="submit">
                                <i class="icon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- <div class="col-2 d-lg-none d-sm-block d-block px-0  ">
                <a href="#" type="button" class="btn rounded bg-primary w-100 d-flex justify-content-center align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasBottom"><i class="ti-filter text-white"></i> </a>
            </div> -->

        </div>



        <!-- end of search -->


        <div class=" d-flex align-items-center justify-content-between pb-3 ">
            <div class=" p-0">


                <form action="<?= base_url(); ?>search_leads" method="post" class=" d-lg-block d-none  form-inline mt-0  navbar-search">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control rounded-left small bg-light border-0" placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
                        <div class="input-group-append">
                            <button class="btn btn-light bg-light border-0 rounded-right px-3" type="submit">
                                <i class="icon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- <a href="#" type="button" class=" btn btn-sm btn-primary shadow-sm mr-1 d-lg-block d-none " style="font-size:12px;"><?= $title . ' - ' . $leads->getNumrows(); ?></a> -->
                <!-- <a href="<?= base_url(); ?>add_leads" type="button" class=" btn btn-sm btn-primary shadow-sm mr-1 " style="font-size:12px;">Add Leads </a> -->
            </div>
            <div class="d-flex p-0">
                <!-- <div class="row d-flex justify-content-end text-end align-items-center mr-0">
                    <p class="mb-0 pb-0" style="font-size: 10px; color:green;">Periode</p>
                    <span style="font-size: 10px;" class="mb-0 pb-0"><?= $in30 . ' - ' . $now; ?></span>
                </div> -->

                <!-- <span class="small d-lg-none d-block text-muted"><i class="mdi mdi-calendar"></i><?= $days; ?></span> -->


                <div class="d-lg-flex d-none">
                    <a href="<?= base_url() ?>leads/all" type="button" class="col btn btn-sm <?= ($title == "Last 30 Days") ? 'btn-primary' : 'btn-light'; ?> rounded mr-1"> All </a>
                    <a href="<?= base_url() ?>leads/new" type="button" class="col btn btn-sm  <?= ($title == "New") ? 'btn-primary' : 'btn-light'; ?> rounded mr-1"> New </a>
                    <a href="<?= base_url() ?>leads/close" type=" button" class="col  btn btn-sm <?= ($title == "Close") ? 'btn-primary' : 'btn-light'; ?>  rounded mr-1"> Close </a>
                    <a href="<?= base_url() ?>leads/pending" type="button" class="col btn btn-sm <?= ($title == "Pending") ? 'btn-primary' : 'btn-light'; ?>  rounded mr-1"> Pending </a>
                    <a href="<?= base_url() ?>leads/contacted" type="button" class="col btn btn-sm <?= ($title == "Contacted") ? 'btn-primary' : 'btn-light'; ?>  rounded mr-1"> Contacted </a>
                    <a href="<?= base_url() ?>leads/visit" type="button" class="col btn btn-sm <?= ($title == "Visit") ? 'btn-primary' : 'btn-light'; ?> rounded mr-1"> Visit </a>
                    <a href="<?= base_url() ?>leads/deal" type="button" class="col btn btn-sm <?= ($title == "Deal") ? 'btn-primary' : 'btn-light'; ?> rounded mr-1"> Deal </a>
                    <a href="#" type="button" class="btn btn-sm rounded bg-primary w-100 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="ti-filter text-white"></i> </a>
                </div>

                <!-- <div class="dropdown flex-md-grow-1 flex-xl-grow-0 d-lg-block d-none">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                        <i class="mdi mdi-calendar"></i><?= $days; ?>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="<?= base_url(); ?>getleads/90">Last 90 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>getleads/30">Last 30 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>getleads/7">Last 7 Days</a>
                        <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
                    </div>
                </div> -->
                <!-- <button type="button" class="btn btn-sm btn-light bg-white d-flex align-items-center rounded border" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-ellipsis-v text-primary " aria-hidden="true"></i>
                </button> -->
            </div>
        </div>

        <!-- flashdata -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>


        <div class="table-responsive">
            <table class="table  table-hover">
                <!-- table-striped -->
                <?php if (!empty($leads->getResultArray())) : ?>
                    <thead>
                        <tr>
                            <th class="d-sm-table-cell d-none">
                                No
                            </th>
                            <th>
                                Name
                            </th>
                            <th class="text-lg-left text-right">
                                Category
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Date In
                            </th>
                            <th class="d-none">
                                Address
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Project
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Source
                            </th>
                            <th class="d-sm-table-cell d-none">
                                Whatsapp
                            </th>
                        </tr>
                    </thead>
                <?php endif; ?>

                <tbody class="list-wrapper">

                    <?php $no = 1; ?>
                    <?php

                    foreach ($leads->getResultArray() as $row) :

                    ?>

                        <tr class="list-item" onclick="location.href='<?= base_url(); ?>leads/<?= $row['id']; ?>'">
                            <td class="d-sm-table-cell d-none">
                                <?= $no++; ?>
                            </td>
                            <td style="width:100px;">

                                <?php
                                $str = $row['nama_leads'];
                                if (strlen($str) > 15) {
                                    $str = substr($str, 0, 15) . ' ...';
                                }
                                echo $str;
                                ?>
                            </td>
                            <td class="text-lg-left text-right">
                                <label class="badge badge-<?php

                                                            if ($row['kategori_status'] == 'New') {
                                                                echo 'success';
                                                            } elseif ($row['kategori_status'] == 'Cold') {
                                                                echo 'info';
                                                            } elseif ($row['kategori_status'] == 'Warm') {
                                                                echo 'warning';
                                                            } elseif ($row['kategori_status'] == 'Hot') {
                                                                echo 'danger';
                                                            } elseif ($row['kategori_status'] == 'Pending') {
                                                                echo 'secondary';
                                                            } elseif ($row['kategori_status'] == 'Invalid') {
                                                                echo 'secondary';
                                                            } elseif ($row['kategori_status'] == 'Close') {
                                                                echo 'secondary';
                                                            } elseif ($row['kategori_status'] == 'Reserve') {
                                                                echo 'reserve';
                                                            } elseif ($row['kategori_status'] == 'Booking') {
                                                                echo 'booking';
                                                            }

                                                            ?>" style="font-size: 10px;"><?= $row['kategori_status']; ?></label>
                            </td>

                            <td class="d-sm-table-cell d-none">
                                <?php
                                $row['time_stamp_new'];
                                $dt_cnv_tmstp = date('d M Y', strtotime($row['time_stamp_new']));
                                echo $dt_cnv_tmstp;
                                ?>
                            </td>
                            <td class="d-none">
                                <?= $row['alamat']; ?>
                            </td>
                            <td class="d-sm-table-cell d-none">
                                <?php foreach ($project->detail($row['project'])->getResultarray() as $prj) {
                                    echo $prj['project'];
                                } ?>
                            </td>
                            <td class="d-sm-table-cell d-none">
                                <?= $row['sumber_leads']; ?>
                            </td>

                            <?php
                            $hp = $row['nomor_kontak'];
                            $nomor = gantiformat($hp);
                            ?>

                            <td class="d-sm-table-cell d-none">
                                <a type="button" href="https://wa.me/<?php echo $nomor; ?>" class="btn py-2 btn-sm btn-success border-0 " style="font-size:10px; background:#198754;">Whatsapp</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>

            </table>
            <?php if (empty($leads->getResultArray())) : ?>
                <div class="col-12 d-flex justify-content-center">
                    <img src="<?= base_url() ?>document/app_image/images/empty.png" class="d-lg-none d-block py-5" alt="" style="width:60%;">
                    <img src="<?= base_url() ?>document/app_image/images/empty.png" class="d-lg-block d-none py-5" alt="" style="width:20%;">
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (!empty($leads->getResultArray())) : ?>
    <div id="pagination-container" class="my-4"></div>
<?php endif; ?>


<!-- OFFCANVAS BOTTOM -->

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button> -->

<div class="offcanvas offcanvas-bottom bg-light" style="height:43%;" tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">

        <a href="<?= base_url(); ?>getleads/90" type=" button" class="btn btn-light bg-white w-100 mb-2">Last 90 Days</a>
        <a href="<?= base_url(); ?>getleads/30" type="button" class="btn btn-light bg-white  w-100 mb-2">Last 30 Days</a>
        <a href="<?= base_url(); ?>getleads/7" type="button" class="btn btn-light bg-white w-100 mb-2">Last 7 Days</a>
        <a href="#" type="button" class="btn btn-light bg-white w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRange" aria-controls="offcanvasRange">Custom Range</a>

    </div>
</div>



<div class="offcanvas offcanvas-bottom bg-light" style="height:43%;" tabindex="-1" id="offcanvasRange" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>range_list" method="post">
            <div class="row">
                <div class="col-12">
                    <label class="mb-1">Date Start</label>
                    <input type="date" class="form-control border-0 w-100 mb-3" name="date_start">
                </div>
                <div class="col-12">
                    <label class="mb-1">Date End</label>
                    <input type="date" class="form-control border-0 w-100 mb-3" name="date_end">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                </div>

            </div>
        </form>

    </div>
</div>

<!-- END OF OFFCANVAS BOTTOM -->



<!-- Pagination -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

<script>
    var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 10;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&laquo;",
            nextText: "&raquo;",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
            }
        }

    );
</script>

<!-- End of Pagination -->

<!-- DATEPICKER -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>range_list" method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <label class="mb-1">Date Start</label>
                            <input type="date" class="form-control w-100 mb-3" name="date_start">
                        </div>
                        <div class="col">
                            <label class="mb-1">Date End</label>
                            <input type="date" class="form-control w-100 mb-3" name="date_end">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>






<script type="text/javascript">
    $('input[name="daterange"]').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            },
            startDate: <?= $now; ?>,
            endDate: <?= $now; ?>
        },
        function(start, end, label) {
            alert("A new date range was chosen: " + start.format('YYYY/MM/DD') + ' to ' + end.format('YYYY/MM/DD'));
        });
</script>


<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3.5,
        // slidesPerView: 2.5,
        spaceBetween: 6,
        // spaceBetween: 10,
        freeMode: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>





<!-- END OF DATEPICKER -->



<?php $this->endSection(); ?>