<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<!-- print button -->
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<!-- print button -->


<style>
    .simple-pagination ul {
        margin: 0 0 20px;
        padding: 0;
        list-style: none;
        text-align: center;
    }

    .simple-pagination li {
        display: inline-block;
        margin-right: 5px;
    }

    .simple-pagination li a,
    .simple-pagination li span {
        color: #666;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #EEE;
        background-color: #FFF;

    }

    .simple-pagination .current {
        color: #FFF;
        background-color: #1F3960;
    }

    .simple-pagination .prev.current,
    .simple-pagination .next.current {
        background: #1F3960;
    }

    .swiper-wrapper {
        position: relative;
        width: 100%;
        /* height: 63px !important; */
        height: 45px !important;
    }

    /* #chart {
        max-width: 650px;
    } */
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>

<div class="swiper-wrapper d-lg-none d-block mb-3">

    <div class="swiper-container">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="<?= base_url() ?>reportleads/30" type="button" class=" col px-0 btn  <?= ($title == "Leads Report") ? 'btn-primary' : 'btn-light bg-white'; ?> rounded mr-1 small"> Leads Report </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>report_project/30" type="button" class="col px-0 btn  <?= ($title == "Project Report") ? 'btn-primary' : 'btn-light bg-white'; ?> rounded mr-1 small"> Project Report </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>report_source/30" type=" button" class="col px-0 btn <?= ($title == "Source Report") ? 'btn-primary' : 'btn-light bg-white'; ?>  rounded mr-1 small"> Source Report </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= base_url() ?>report_sales_filter/30" type=" button" class="col px-0 btn <?= ($title == "Sales Report") ? 'btn-primary' : 'btn-light bg-white'; ?>  rounded mr-1 small"> Sales Report </a>
            </div>

        </div>

    </div>

</div>




<div class="row mt-lg-0 my-3 px-lg-2 px-0">
    <div class="col-lg-6 col-12 px-lg-2 px-3">
        <div class="card mb-lg-0 mb-3">
            <div class="card-body py-lg-5  py-4 px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="text-muted small">Total Booking</p>
                        <h4 class="fw-bolder">Rp. <?php
                                                    $total = 0;
                                                    foreach ($leadsBooking->getResultArray() as $cb) :
                                                        $total += $cb['booking'];
                                                    endforeach;
                                                    echo $total;

                                                    ?></h4>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <button class="btn btn-xs btn-light rounded"> <i class="ti-medall mx-0" style="color:green;"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 px-lg-2 px-3">
        <div class="card mb-lg-0 mb-2">
            <div class="card-body py-lg-5 py-4 px-lg-5 px-4">
                <div class="row align-items-center">
                    <div class="col-8">
                        <p class="text-muted small">Total Reserve</p>

                        <h4 class="fw-bolder">Rp. <?php
                                                    $total = 0;
                                                    foreach ($leadsReserve->getResultArray() as $cb) :
                                                        $total += $cb['reserve'];
                                                    endforeach;
                                                    echo $total;

                                                    ?></h4>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <button class="btn btn-xs btn-light rounded"> <i class="ti-medall mx-0" style="color:orange;"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="col-lg-4 col-12 px-lg-2 px-3">
                <div class="card mb-lg-0 mb-3">
                    <div class="card-body py-4">
                        <p class="text-muted small">Total Earnings</p>
                        <h5 class="fw-bolder">Rp. 10.000.000</h5>
                    </div>
                </div>
            </div> -->
<!-- </div> -->



<div class="card mb-4">
    <div class="card-header mb-4 d-lg-flex d-none align-items-center justify-content-between bg-transparent ">

        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $title; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>reportleads/30">Leads Report</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_project/30">Project Report</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_source/30">Source Report</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_sales_filter/30">Sales Report</a>

            </div>
        </div>


        <div class="mb-2">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                    <i class="mdi mdi-calendar"></i><?= $day; ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="<?= base_url(); ?>report_sales_filter/90">Last 90 Days</a>
                    <a class="dropdown-item" href="<?= base_url(); ?>report_sales_filter/30">Last 30 Days</a>
                    <a class="dropdown-item" href="<?= base_url(); ?>report_sales_filter/7">Last 7 Days</a>
                    <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body">

        <!-- TABLE  -->

        <div id="export_pdf">
            <div class="table-responsive" id="printableArea">

                <div id="export_excel">

                    <table id="report_new_leads" name="report_new_leads" class="table table-hover" width="100%" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="font-size:13px; text-align:left">No</th>
                                <th style="font-size:13px; text-align:left">Nama Sales</td>
                                <th style="font-size:13px; text-align:left">Manager</th>
                                <th style="font-size:13px; text-align:left">GM</th>
                                <th style="font-size:13px; text-align:left">Project</th>
                                <th style="font-size:13px; text-align:left">Total Leads</th>
                                <th style="font-size:13px; text-align:left">Contacted</th>
                                <th style="font-size:13px; text-align:left">Visit</th>
                                <th style="font-size:13px; text-align:left">Deal</th>
                                <th style="font-size:13px; text-align:left">Reserve</th>
                                <th style="font-size:13px; text-align:left">Booking</th>
                                <th style="font-size:13px; text-align:left">Reserve Amount</th>
                                <th style="font-size:13px; text-align:left">Booking Amount</th>
                                <!-- <th style="font-size:13px; text-align:left">Total</th> -->
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">

                            <?php $no = 1; ?>
                            <?php foreach ($sales->getResultArray() as $row) :


                                foreach ($group->user($row['id_user'])->getResultArray() as $grp) {

                                    if ($grp['level'] == "admin_group") {
                                        $all = $count->salesAllAdminGroupFilter($grp['groups'], $days);
                                        $newleads = $count->salesNewAdminGroupFilter($grp['groups'], $days);
                                        $new_close = $count->salesCloseAdminGroupFilter($grp['groups'], $days);
                                        $new_pending = $count->salesPendingAdminGroupFilter($grp['groups'], $days);
                                        $contacted = $count->salesContactedAdminGroupFilter($grp['groups'], $days);
                                        $visit = $count->salesVisitAdminGroupFilter($grp['groups'], $days);
                                        $deal = $count->salesDealAdminGroupFilter($grp['groups'], $days);
                                        $reserve = $count->salesReserveAdminGroupFilter($grp['groups'], $days);
                                        $booking = $count->salesBookingAdminGroupFilter($grp['groups'], $days);
                                    } elseif ($grp['level'] == "admin_project") {
                                        $all = $count->salesAllAdminProjectFilter($grp['project'], $days);
                                        $newleads = $count->salesNewAdminProjectFilter($grp['project'], $days);
                                        $new_close = $count->salesCloseAdminProjectFilter($grp['project'], $days);
                                        $new_pending = $count->salesPendingAdminProjectFilter($grp['project'], $days);
                                        $contacted = $count->salesContactedAdminProjectFilter($grp['project'], $days);
                                        $visit = $count->salesVisitAdminProjectFilter($grp['project'], $days);
                                        $deal = $count->salesDealAdminProjectFilter($grp['project'], $days);
                                        $reserve = $count->salesReserveAdminProjectFilter($grp['project'], $days);
                                        $booking = $count->salesBookingAdminProjectFilter($grp['project'], $days);
                                        // $all = $count->salesAll($row['username'])->getNumRows();
                                    } else {
                                        $all = $count->salesAllFilter($row['id_user'], $days);
                                        $newleads = $count->salesNewFilter($row['id_user'], $days);
                                        $new_close = $count->salesCloseFilter($row['id_user'], $days);
                                        $new_pending = $count->salesPendingFilter($row['id_user'], $days);
                                        $contacted = $count->salesContactedFilter($row['id_user'], $days);
                                        $visit = $count->salesVisitFilter($row['id_user'], $days);
                                        $deal = $count->salesDealFilter($row['id_user'], $days);
                                        $reserve = $count->salesReserveFilter($row['id_user'], $days);
                                        $booking = $count->salesBookingFilter($row['id_user'], $days);
                                    }
                                }

                            ?>





                                <!-- list-item -->
                                <tr class="" <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project" || $level == "manager" || $level == "general_manager" || $level == "management") : ?> onclick="location.href='<?= base_url(); ?>user/<?php echo $row['id_user']; ?>'" <?php endif; ?>>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <?php foreach ($user->detail($row['id_user'])->getResultArray() as $us) : ?>
                                            <?= $us['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($user->detail($row['manager'])->getResultArray() as $us) : ?>
                                            <?= $us['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($user->detail($row['general_manager'])->getResultArray() as $us) : ?>
                                            <?= $us['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($project->detail($row['project'])->getResultarray() as $prj) {
                                            echo $prj['project'];
                                        } ?>
                                    </td>

                                    <td>
                                        <?= $all->getNumRows();
                                        ?>
                                    </td>

                                    <td>
                                        <?= $contacted->getNumRows();
                                        ?>
                                    </td>

                                    <td>
                                        <?= $visit->getNumRows();
                                        ?>
                                    </td>

                                    <td>
                                        <?= $deal->getNumRows();
                                        ?>
                                    </td>

                                    <td>
                                        <?= $reserve->getNumRows();
                                        ?>
                                    </td>
                                    <td>
                                        <?= $booking->getNumRows();
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $total = 0;
                                        foreach ($count->salesReserve($row['id'])->getResultArray() as $cb) :
                                            $total += $cb['reserve'];
                                        endforeach;
                                        echo $total;

                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        $total = 0;
                                        foreach ($count->salesBooking($row['id'])->getResultArray() as $cb) :
                                            $total += $cb['booking'];
                                        endforeach;
                                        echo $total;

                                        ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>


                </div> <!-- akhir export pdf -->
            </div> <!-- akhir export excel -->
        </div>
        <!-- AKHIR TABLE -->
    </div>

    <!-- <div id="pagination-container" class="my-4"></div> -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>report_sales_range" method="post">
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





    <!-- EXPORT EXCEL -->

    <script>
        function exportF(elem) {
            var table = document.getElementById("export_excel");
            var html = table.outerHTML;
            var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
            elem.setAttribute("href", url);
            elem.setAttribute("download", "Report_sales.xls"); // Choose the file name
            return false;
        }
    </script>

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


    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 2.5,
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




    <?php $this->endSection(); ?>