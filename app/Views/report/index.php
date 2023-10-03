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






<!-- <div class=" mb-4 d-flex align-items-center justify-content-between bg-transparent py-3">
    <div>
        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $title; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>reportleads/30">Leads Report</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_project/30">Project Report</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_source/30">Source Report</a>

            </div>
        </div>
    </div>
    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
            <i class="mdi mdi-calendar"></i><?= $days; ?>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
            <a class="dropdown-item" href="<?= base_url(); ?>reportleads/90">Last 90 Days</a>
            <a class="dropdown-item" href="<?= base_url(); ?>reportleads/30">Last 30 Days</a>
            <a class="dropdown-item" href="<?= base_url(); ?>reportleads/7">Last 7 Days</a>
            <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
        </div>
    </div>
</div> -->

<div class="">
    <div class="row align-items-center px-lg px-2 mb-lg-0 mb-3 ">

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
</div>


<!-- TOTAL -->

<div class="row">

    <div class="col-lg-4 col-12">


        <!-- <div class="card mb-3 " style="background-image: url(' <?= base_url() ?>document/app_image/images/bg-earnings.png'); background-repeat : no-repeat; background-size : cover;">
            <div class="col p-4">
                <div class="row">
                    <div class="col-8">
                        <h6 class="text-white small">Total Income</h6>
                        <h4 class="text-white"> <strong>
                                Rp.
                                <?php
                                $bookingReport = 0;
                                foreach ($leadsBooking->getResultArray() as $cb) :
                                    $bookingReport += $cb['booking'];
                                endforeach;

                                $reserveReport = 0;
                                foreach ($leadsReserve->getResultArray() as $cr) :
                                    $reserveReport += $cr['reserve'];
                                endforeach;

                                echo $reserveReport + $bookingReport;

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


        <div class="row mt-lg-0 my-3 px-lg-2 px-0">
            <div class="col-12 px-lg-2 px-3 mb-3">
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
            <div class="col-12 px-lg-2 px-3">
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
            <!-- <div class="col-lg-4 col-12 px-lg-2 px-3">
                <div class="card mb-lg-0 mb-3">
                    <div class="card-body py-4">
                        <p class="text-muted small">Total Earnings</p>
                        <h5 class="fw-bolder">Rp. 10.000.000</h5>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="col-lg-8 col-12">

        <div class="card rounded-4 mb-4">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-transparent py-3">
                <div>
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                            <i class="mdi mdi-calendar"></i><?= $title; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                            <a class="dropdown-item" href="<?= base_url(); ?>reportleads/30">Leads Report</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>report_project/30">Project Report</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>report_source/30">Source Report</a>

                        </div>
                    </div>
                </div>
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                        <i class="mdi mdi-calendar"></i><?= $days; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="<?= base_url(); ?>reportleads/90">Last 90 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>reportleads/30">Last 30 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>reportleads/7">Last 7 Days</a>
                        <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div id="leads" class="mb-4"></div> -->

                <!-- TABLE  -->


                <div class="table-responsive" id="printableArea">



                    <table id="report_new_leads" name="report_new_leads" class="table  table-hover" width="100%" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="font-size:13px; text-align:left">Leads Status </td>
                                <th style="font-size:13px; text-align:left">Count</td>
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">

                            <!-- list-item -->
                            <tr class="">
                                <td>New</td>
                                <td><?= $new->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Close</td>
                                <td><?= $close->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Pending</td>
                                <td><?= $pending->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Contacted</td>
                                <td><?= $contacted->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Visit</td>
                                <td><?= $visit->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Deal</td>
                                <td><?= $dealOnly->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Reserve</td>
                                <td><?= $reserve->getNumRows(); ?></td>
                            </tr>


                            <tr class="">
                                <td>Booking</td>
                                <td><?= $booking->getNumRows(); ?></td>
                            </tr>

                            <tr class="border-top-3">
                                <td style="font-weight: 900; color:green">Total Leads</td>
                                <td style="font-weight: 900; color:green"><?= $new->getNumRows() + $close->getNumRows() + $pending->getNumRows() + $contacted->getNumRows() + $visit->getNumRows() + $dealOnly->getNumRows()  + $reserve->getNumRows() + $booking->getNumRows(); ?></td>
                            </tr>

                        </tbody>

                    </table>


                </div> <!-- akhir export pdf -->


                <!-- AKHIR TABLE -->


            </div>
        </div>
    </div>
</div>



















<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>range_leads_report" method="post">
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



<!-- Pagination -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
</script> -->

<!-- End of Pagination -->


<div class="my-5"></div>

<!-- EXPORT EXCEL -->

<script>
    function exportF(elem) {
        var table = document.getElementById("export_excel");
        var html = table.outerHTML;
        var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
        elem.setAttribute("href", url);
        elem.setAttribute("download", "Report_leads.xls"); // Choose the file name
        return false;
    }
</script>



<!-- BAR CHART -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- SUBHOLDING -->
<script>
    var options = {
        chart: {
            height: 300,
            type: 'bar'
        },
        series: [{
            name: 'Count',
            data: [
                <?= $leads->getNumRows(); ?>,
                <?= $leadsClose->getNumRows(); ?>,
                <?= $leadsPending->getNumRows(); ?>,
                <?= $leadsContacted->getNumRows(); ?>,
                <?= $leadsVisit->getNumRows(); ?>,
                <?= $leadsDeal->getNumRows(); ?>,
                <?= $leadsReserve->getNumRows(); ?>,
                <?= $leadsBooking->getNumRows(); ?>,
            ]
        }],
        xaxis: {
            type: 'text',
            categories: ['Leads In', 'Close', 'Pending', 'Contacted', 'Visit', 'Deal', 'Reserve', 'Booking', ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#leads"), options);

    chart.render();
</script>


<?php $this->endSection(); ?>