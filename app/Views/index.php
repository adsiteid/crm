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

    /* .time-rolling {
        background: #ffd6d6;
        margin-top: 0.5rem;
        color: blue;
        font-size: 0.75rem;
    } */
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
        <h5 class="mb-0 text-primary d-lg-block d-none"><?= user()->fullname; ?></h5>
        <h5 class="mb-0 text-primary d-lg-none d-block"><?= user()->fullname; ?></h5>
    </div>

    <div class="d-flex p-0">

        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $days; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>home/90">Last 90 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>home/30">Last 30 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>home/7">Last 7 Days</a>
                <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
            </div>
        </div>

        <!-- <btn type="button" class="btn btn-sm btn-light bg-white px-0 pt-2 d-flex align-items-center rounded border">
            <i class="fa fa-ellipsis-v text-primary " aria-hidden="true"></i>
        </btn> -->
    </div>
</div>


<!-- search -->

<!-- <form action="<?= base_url(); ?>search_leads" method="post" class=" d-lg-none d-sm-block d-block  form-inline mr-auto ml-md-3 mb-4 mt-3  navbar-search">
    <div class="input-group ">
        <input type="text" class="form-control rounded-left  small bg-white border-0" placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
        <div class="input-group-append">
            <button class="btn btn-light bg-white border-0 rounded-right px-3" type="submit">
                <i class="icon-search"></i>
            </button>
        </div>
    </div>
</form> -->

<!-- end of search -->

<div class="card my-3 d-lg-none d-block" style="background-image: url(' <?= base_url() ?>document/app_image/images/bg-earnings.png'); background-repeat : no-repeat; background-size : cover;">
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
</div>


<div>




    <div class="row align-items-center px-lg px-2 mb-lg-0 mb-3" style="background : #F5F7FF;">

        <div class="col-4 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1 ">
            <a href="<?= base_url(); ?>leads/new" class="card rounded">
                <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                    <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                        <i class="ti-import text-success d-lg-none d-block btn-inverse-success p-2 rounded" style="font-size: 11px;"></i>

                        <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-2 " style="font-size:10px;">New</h6>
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
            <a href="<?= base_url(); ?>leads/close" class="card rounded">
                <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                    <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                        <i class="ti-trash text-muted d-lg-none d-block btn-inverse-secondary p-2 rounded" style="font-size: 12px; "></i>

                        <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-2" style="font-size:10px;">Close</h6>
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
            <a href="<?= base_url(); ?>leads/pending" class="card rounded">
                <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                    <div class="align-items-center text-lg-left text-center  pt-lg-2 pt-3">

                        <i class="ti-time text-primary d-lg-none d-block btn-inverse-primary p-2  rounded ml-1" style="font-size: 12px; width:29px; height:29px;"></i>

                        <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-2 " style="font-size:10px;">Pending</h6>
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
            <a href="<?= base_url(); ?>leads/contacted" class="card rounded">
                <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                    <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                        <i class="ti-comment-alt text-warning d-lg-none p-2 d-block btn-inverse-warning rounded ml-2" style="font-size: 13px; width:29px; height:29px;"></i>

                        <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-2" style="font-size:10px;">Contacted</h6>
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
            <a href="<?= base_url(); ?>leads/visit" class="card rounded">
                <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                    <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                        <i class="ti-location-pin text-info d-lg-none d-block btn-inverse-info rounded p-2" style="font-size: 13px;"></i>

                        <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-2 " style="font-size:10px;">Visit</h6>
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
            <a href="<?= base_url(); ?>leads/deal" class="card rounded">
                <div class=" d-flex align-items-center justify-content-lg-between justify-content-center p-lg-4 py-1 px-2 ">

                    <div class="align-items-center text-lg-left text-center pt-lg-2 pt-3">

                        <i class="ti-crown text-danger d-lg-none d-block btn-inverse-danger rounded p-2" style="font-size: 13px;"></i>

                        <h6 class="text-muted font-semibold mb-lg-1 mb-0 pt-lg-0 pt-2" style="font-size:10px;">Deal</h6>
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
                        <div class="col p-0">
                            <div type="button" class=" btn btn-sm btn-primary shadow-sm mr-1 " style="font-size:12px;">Recent Leads</div>
                        </div>
                        <div class="d-flex p-0">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                                    <i class="mdi mdi-calendar"></i><?= $days; ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="<?= base_url(); ?>home/90">Last 90 Days</a>
                                    <a class="dropdown-item" href="<?= base_url(); ?>home/30">Last 30 Days</a>
                                    <a class="dropdown-item" href="<?= base_url(); ?>home/7">Last 7 Days</a>
                                    <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <?php if (!empty($all->getResultArray())) : ?>
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
                                            Rolling time
                                        </th>

                                        <th class="d-sm-table-cell d-none">
                                            Whatsapp
                                        </th>
                                    </tr>
                                </thead>
                            <?php endif; ?>
                            <tbody class="list-wrapper ">
                                <?php $no = 1; ?>

                                <?php

                                foreach ($all->getResultArray() as $row) :
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
                                        <td class="text-lg-left text-center">
                                            <div class="d-flex flex-column">
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

                                            </div>
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
                                            <?php foreach ($projects->detail($row['project'])->getResultarray() as $prj) {
                                                echo $prj['project'];
                                            } ?>
                                        </td>
                                        <td class="d-sm-table-cell d-none">
                                            <?= $row['sumber_leads']; ?>
                                        </td>


                                        <td class="d-sm-table-cell d-none">
                                            <?php if ($row['kategori_status'] == 'New' && $row['rolling_leads'] == 1) : ?>
                                                <span class='time-rolling' data-interval="<?= $row['rolling_interval']; ?>" data-lasttime="<?= $row['rolling_lasttime']; ?>" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Otomatis pindah ke user lain'>00:00</span>
                                            <?php endif; ?>
                                        </td>


                                        <?php
                                        $hp = $row['nomor_kontak'];
                                        $nomor = gantiformat($hp);
                                        ?>

                                        <td class="d-sm-table-cell d-none">
                                            <a type="button" href="https://wa.me/<?php echo $nomor; ?>" class="btn py-2 btn-sm btn-success " style=" font-size:10px; background:#198754;">Whatsapp</a>
                                        </td>
                                    </tr>

                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>


                        <?php if (empty($all->getResultArray())) : ?>
                            <div class="col-12 d-flex justify-content-center">
                                <img src="<?= base_url() ?>document/app_image/images/empty.png" class="d-lg-none d-block py-5" alt="" style="width:60%;">
                                <img src="<?= base_url() ?>document/app_image/images/empty.png" class="d-lg-block d-none py-5" alt="" style="width:20%;">
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>


            <?php if (!empty($all->getResultArray())) : ?>
                <div id="pagination-container" class="my-4"></div>
            <?php endif; ?>


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


    <!-- script countdown -->
    <script>
        var refreshTime = setInterval(function() {
            $(".time-rolling").each(function() {
                var dateleads = moment($(this).data("lasttime"), 'YYYY-MM-DD HH:mm:ss').add($(this).data("interval"), 'minutes');
                var datenow = moment();
                var ms = dateleads.diff(datenow);
                //$(this).html(parseInt(ms / 60) + ":" + ((ms % 60).length == 1 ? "0" + (ms % 60) : (ms % 60)));
                if (ms > 0) {
                    $(this).html(moment.utc(ms).format("mm:ss"));
                    console.log(ms);
                } else {
                    clearInterval(refreshTime);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                }
            });

        }, 1000);
    </script>

    <!-- End of countdown -->
    <!-- END OF DATEPICKER -->


    <?php $this->endSection(); ?>