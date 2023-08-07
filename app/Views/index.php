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

<?php
$now = date('Y/m/d');
$in30 = date('Y/m/d', strtotime($now . ' - 30 days'));
?>




<div class="d-lg-none d-flex align-items-center justify-content-between mb-lg-1 pb-3 pt-0 mt-0 ">
    <div class="col-5 p-0">
        <p class="mb-0 text-muted" style="font-size:12px;">Welcome Back !</p>
        <h6 class="mb-0 text-primary d-lg-block d-none"><?= user()->fullname; ?></h6>
        <h6 class="mb-0 text-white d-lg-none d-block"><?= user()->fullname; ?></h6>
    </div>

    <div class="d-flex p-0">

        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $days; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>getleads/home/90">Last 90 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>getleads/home/30">Last 30 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>getleads/home/7">Last 7 Days</a>
                <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
            </div>
        </div>

        <!-- <btn type="button" class="btn btn-sm btn-light bg-white px-0 pt-2 d-flex align-items-center rounded border">
            <i class="fa fa-ellipsis-v text-primary " aria-hidden="true"></i>
        </btn> -->
    </div>
</div>


<!-- search -->

<form action="<?= base_url(); ?>search_leads" method="post" class=" d-lg-none d-sm-block d-block  form-inline mr-auto ml-md-3 mb-4 mt-3  navbar-search">
    <div class="input-group ">
        <input type="text" class="form-control rounded-left  small bg-white" placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
        <div class="input-group-append">
            <button class="btn btn-light border-none rounded-right px-3" type="submit">
                <i class="icon-search"></i>
            </button>
        </div>
    </div>
</form>

<!-- end of search -->


<div id="carouselExampleControls" class="carousel slide mb-3 d-lg-none d-block" data-ride="carousel">
    <div class="carousel-inner ">

        <?php
        foreach ($event->getResultArray() as $ev);
        ?>

        <?php

        if (!empty($ev)) :

            $date_start = date('d', strtotime($ev['date_start']));
            $date_end = date('d', strtotime($ev['date_end']));
            $mo_ye = date('M Y', strtotime($ev['date_start']));

        ?>

            <div type="button" class="carousel-item active p-1" onclick="location.href='<?= base_url(); ?>event/<?= $ev['id']; ?>'">
                <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                    <div class="row d-flex align-items-center">
                        <div class="col-3 p-0"> <img src="<?= base_url(); ?>document/image/event/<?= $ev['image'] ?>" alt="" class="col"> </div>
                        <div class="col-6 text-white border-right p-0">
                            <p class="mb-1" style="font-size:12px;"><?= $ev['event_name']; ?></p>
                            <h6 class="text-white mb-0" style="font-size:12px;"><?= $ev['project']; ?></h6>
                        </div>
                        <div class="col-3 text-white">
                            <div class="mb-0 p-0" style="font-size:15px; font-weight:600;"><?= $date_start; ?>-<?= $date_end; ?></div>
                            <div class="m-0 p-0" style="font-size:10px;"><?= $mo_ye; ?></div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>



        <?php

        if (empty($ev)) :

        ?>

            <div type="button" class="carousel-item active p-1">
                <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                    <div class="row d-flex align-items-center">
                        <div class="col-3 p-0"> <img src="<?= base_url(); ?>document/image/default2.jpg" alt="" class="col"> </div>
                        <div class="col-6 text-white border-right p-0">
                            <p class="mb-1" style="font-size:12px;">Tidak Ada Acara</p>
                            <h6 class="text-white mb-0" style="font-size:12px;">dijadwalkan</h6>
                        </div>
                        <div class="col-3 text-white">
                            <div class="mb-0 p-0" style="font-size:15px; font-weight:600;"> - </div>
                            <div class="m-0 p-0" style="font-size:10px;">-</div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>





        <?php
        foreach ($event->getResultArray() as $ev2) :

            $date_start2 = date('d', strtotime($ev2['date_start']));
            $date_end2 = date('d', strtotime($ev2['date_end']));
            $mo_ye2 = date('M Y', strtotime($ev2['date_start']));

        ?>
            <div type="button" class="carousel-item p-1" onclick="location.href='<?= base_url(); ?>event/<?= $ev2['id']; ?>'">
                <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                    <div class="row d-flex align-items-center">
                        <div class="col-3 p-0"> <img src="<?= base_url(); ?>document/image/event/<?= $ev2['image'] ?>" alt="" class="col"> </div>
                        <div class="col-6 text-white border-right p-0">
                            <p class="mb-1" style="font-size:12px;"><?= $ev2['event_name']; ?></p>
                            <h6 class="text-white mb-0" style="font-size:12px;"><?= $ev2['project']; ?></h6>
                        </div>
                        <div class="col-3 text-white">
                            <div class="mb-0 p-0" style="font-size:15px; font-weight:600;"><?= $date_start2; ?>-<?= $date_end2; ?></div>
                            <div class="m-0 p-0" style="font-size:10px;"><?= $mo_ye2; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <!--
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
        -->

</div>



<div class="row align-items-center px-lg px-2 mb-lg-0 mb-3">

    <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
        <a href="<?= base_url(); ?>leads/new" class="card">
            <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                    <i class="ti-import text-success d-lg-none d-block" style="font-size: 18px;"></i>

                    <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-3 " style="font-size:10px;">New</h6>
                    <h4 class="fw-bold fs-6 d-lg-block d-none"><?= $new->getNumRows(); ?></h4>
                    <p class="fw-bold text-muted d-lg-none d-block mb-lg-0 mb-2" style="font-size: 12px;"><?= $new->getNumRows(); ?></p>
                </div>

                <button type="button" class="btn btn-inverse-success btn-icon d-lg-block d-none">
                    <i class="ti-import"></i>
                </button>

            </div>
        </a>
    </div>


    <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
        <a href="<?= base_url(); ?>leads/close" class="card">
            <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                    <i class="ti-trash text-muted d-lg-none d-block" style="font-size: 18px;"></i>

                    <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-3" style="font-size:10px;">Close</h6>
                    <h4 class="fw-bold fs-6 d-lg-block d-none"><?= $close->getNumRows(); ?></h4>
                    <p class="fw-bold text-muted d-lg-none d-block mb-lg-0 mb-2" style="font-size: 12px;"><?= $close->getNumRows(); ?></p>
                </div>
                <button type="button" class="btn btn-inverse-secondary btn-icon d-lg-block d-none">
                    <i class="ti-trash"></i>
                </button>
            </div>
        </a>
    </div>


    <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
        <a href="<?= base_url(); ?>leads/pending" class="card">
            <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                    <i class="ti-time text-primary d-lg-none d-block" style="font-size: 18px;"></i>

                    <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-3 " style="font-size:10px;">Pending</h6>
                    <h4 class="fw-bold fs-6 d-lg-block d-none"><?= $pending->getNumRows(); ?></h4>
                    <p class="fw-bold text-muted d-lg-none d-block mb-lg-0 mb-2" style="font-size: 12px;"><?= $pending->getNumRows(); ?></p>
                </div>

                <button type="button" class="btn btn-inverse-primary btn-icon d-lg-block d-none">
                    <i class="ti-time"></i>
                </button>

            </div>
        </a>
    </div>


    <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
        <a href="<?= base_url(); ?>leads/contacted" class="card">
            <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                    <i class="ti-comment-alt text-warning d-lg-none d-block" style="font-size: 18px;"></i>

                    <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-3" style="font-size:10px;">Contacted</h6>
                    <h4 class="fw-bold fs-6 d-lg-block d-none"><?= $contacted->getNumRows(); ?></h4>
                    <p class="fw-bold text-muted d-lg-none d-block mb-lg-0 mb-2" style="font-size: 12px;"><?= $contacted->getNumRows(); ?></p>
                </div>

                <button type="button" class="btn btn-inverse-warning btn-icon d-lg-block d-none">
                    <i class="ti-comment-alt"></i>
                </button>

            </div>
        </a>
    </div>


    <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
        <a href="<?= base_url(); ?>leads/visit" class="card">
            <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                    <i class="ti-location-pin text-info d-lg-none d-block" style="font-size: 18px;"></i>

                    <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-3 " style="font-size:10px;">Visit</h6>
                    <h4 class="fw-bold fs-6 d-lg-block d-none"><?= $visit->getNumRows(); ?></h4>
                    <p class="fw-bold text-muted d-lg-none d-block mb-lg-0 mb-2" style="font-size: 12px;"><?= $visit->getNumRows(); ?></p>
                </div>

                <button type="button" class="btn btn-inverse-info btn-icon d-lg-block d-none">
                    <i class="ti-location-pin"></i>
                </button>

            </div>
        </a>
    </div>

    <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
        <a href="<?= base_url(); ?>leads/deal" class="card">
            <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                    <i class="ti-crown text-danger d-lg-none d-block" style="font-size: 18px;"></i>

                    <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-3" style="font-size:10px;">Deal</h6>
                    <h4 class="fw-bold fs-6 d-lg-block d-none"><?= $deal->getNumRows(); ?></h4>
                    <p class="fw-bold text-muted d-lg-none d-block mb-lg-0 mb-2" style="font-size: 12px;"><?= $deal->getNumRows(); ?></p>
                </div>

                <button type="button" class="btn btn-inverse-danger btn-icon d-lg-block d-none">
                    <i class="ti-crown"></i>
                </button>

            </div>
        </a>
    </div>

</div>


<!-- Content Row -->


<div class="row">

    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between  pb-2  ">
                    <div class="col-5 p-0">
                        <div type="button" class=" btn btn-sm btn-primary shadow-sm mr-1 " style="font-size:12px;"> New Leads</div>
                    </div>
                    <div class="d-flex p-0">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                                <i class="mdi mdi-calendar"></i><?= $days; ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="<?= base_url(); ?>getleads/home/90">Last 90 Days</a>
                                <a class="dropdown-item" href="<?= base_url(); ?>getleads/home/30">Last 30 Days</a>
                                <a class="dropdown-item" href="<?= base_url(); ?>getleads/home/7">Last 7 Days</a>
                                <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="px-0">
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
                        <tbody class="list-wrapper ">
                            <?php $no = 1; ?>
                            <?php

                            foreach ($new->getResultArray() as $row) :

                            ?>
                                <tr class="list-item " onclick="location.href='<?= base_url(); ?>leads/<?= $row['id']; ?>'">
                                    <td class="d-sm-table-cell d-none">
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $str = $row['nama_leads'];
                                        if (strlen($str) > 15) {
                                            $str = substr($str, 0, 15) . ' ...';
                                        }
                                        echo $str;
                                        ?>
                                    </td>
                                    <td class="text-lg-left text-right">
                                        <label class="badge badge-<?php if ($row['kategori_status'] == 'New') {
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
                                                                        echo 'primary';
                                                                    } elseif ($row['kategori_status'] == 'Booking') {
                                                                        echo 'default';
                                                                    } ?>" style="font-size: 10px;"><?= $row['kategori_status']; ?></label>
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
                                        <?= $row['project']; ?>
                                    </td>
                                    <td class="d-sm-table-cell d-none">
                                        <?= $row['sumber_leads']; ?>
                                    </td>

                                    <?php
                                    $hp = $row['nomor_kontak'];
                                    $nomor = gantiformat($hp);
                                    ?>

                                    <td class="d-sm-table-cell d-none">
                                        <a type="button" href="https://wa.me/<?php echo $nomor; ?>" class="btn py-2 btn-sm btn-success " style=" font-size:10px; background:#198754;">Whatsapp</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="pagination-container" class="my-4 rounded"></div>

    </div>

</div>



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
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>range" method="post">
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

<!-- END OF DATEPICKER -->


<?php $this->endSection(); ?>