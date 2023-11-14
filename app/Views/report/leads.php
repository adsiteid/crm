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

<style>
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



<div class="d-lg-none d-flex align-items-center justify-content-between mb-lg-1 mb-3 pb-3 pt-0 mt-0 ">
    <div class="col-10 p-0">
        <p class="mb-1 text-muted" style="font-size:12px;">Update</p>
        <h5 class="mb-0 text-primary d-lg-none d-block"><?= $days; ?></h5>
    </div>

    <div class="col-2 d-lg-none d-sm-block d-block px-0  ">
        <a href="#" type="button" class="btn btn-light bg-white rounded  w-100 d-flex justify-content-center align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasBottom"><i class="ti-filter "></i> </a>
    </div>

</div>


<!-- <div class="row mt-lg-0 my-3 px-lg-2 px-0">
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
    </div> -->
<!-- <div class="col-lg-4 col-12 px-lg-2 px-3">
                <div class="card mb-lg-0 mb-3">
                    <div class="card-body py-4">
                        <p class="text-muted small">Total Earnings</p>
                        <h5 class="fw-bolder">Rp. 10.000.000</h5>
                    </div>
                </div>
            </div> -->
<!-- </div> -->

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


<div class="card rounded-4 mb-4">
    <div class="card-header mb-4 d-lg-flex d-none align-items-center justify-content-between bg-transparent py-3  ">
        <div>
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


        <div id="chart1" class="mb-3"></div>

        <!-- BAR CHART -->
        <!-- <div id="leads" class="mb-4"></div>  -->

        <!-- TABLE  -->


        <div class="table-responsive" id="printableArea">



            <table id="report_new_leads" name="report_new_leads" class="table  table-hover" width="100%" style="font-size:12px;">
                <thead>
                    <tr>
                        <!-- <th style="font-size:13px; text-align:left">Leads Status </td>
                        <th style="font-size:13px; text-align:left">Count</td> -->

                        <th style="font-size:13px; text-align:left">Tanggal </td>
                        <th style="font-size:13px;" class="text-lg-start text-center">Jumlah Leads</td>

                    </tr>
                </thead>
                <tbody class="list-wrapper">
                    <?php foreach ($chart1 as $row) : ?>
                        <tr class="">
                            <td>
                                <?php

                                $tanggal = $row->tanggal;
                                $new_format = date('d M Y', strtotime($tanggal));

                                echo $new_format;

                                ?>
                            </td>
                            <td class="text-lg-start text-center"><?= $row->count; ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <!-- <tr class="">
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
                    </tr> -->

                </tbody>

            </table>


        </div> <!-- akhir export pdf -->


        <!-- AKHIR TABLE -->


    </div>
</div>







<!-- OFFCANVAS BOTTOM -->

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button> -->

<div class="offcanvas offcanvas-bottom bg-light" style="height:43%;" tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">

        <a href="<?= base_url(); ?>reportleads/90" type=" button" class="btn btn-light bg-white w-100 mb-2">Last 90 Days</a>
        <a href="<?= base_url(); ?>reportleads/30" type="button" class="btn btn-light bg-white  w-100 mb-2">Last 30 Days</a>
        <a href="<?= base_url(); ?>reportleads/90" type="button" class="btn btn-light bg-white w-100 mb-2">Last 7 Days</a>
        <a href="#" type="button" class="btn btn-light bg-white w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRange" aria-controls="offcanvasRange">Custom Range</a>

    </div>
</div>





<div class="offcanvas offcanvas-bottom bg-light" style="height:43%;" tabindex="-1" id="offcanvasRange" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>range_leads_report" method="post">
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
            categories: ['New', 'Close', 'Pending', 'Contacted', 'Visit', 'Deal', 'Reserve', 'Booking', ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#leads"), options);

    chart.render();
</script>



<!-- CHART AREA -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

<script>
    var options = {
        series: [{
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
        // annotations: {
        //     points: [{
        //             x: 5,
        //             y: 322,
        //             label: {
        //                 text: "Lowest: 322",
        //                 offsetY: 2
        //             },
        //             image: {
        //                 path: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/512px-Flat_tick_icon.svg.png",
        //                 width: undefined,
        //                 height: undefined,
        //                 offsetX: 0,
        //                 offsetY: -18
        //             }
        //         },
        //         {
        //             x: 7,
        //             y: 383,
        //             label: {
        //                 text: "Highest: 383",
        //                 offsetY: 2
        //             }
        //         }
        //     ]
        // },
        chart: {
            height: 350,
            type: "area",
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        // stroke: {
        //     curve: "straight"
        // },
        xaxis: {
            type: 'text',
            categories: ['New', 'Close', 'Pending', 'Contacted', 'Visit', 'Deal', 'Reserve', 'Booking', ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>


<!-- SWIPER -->


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





<!-- CHART DATE -->


<script>
    var options = {
        series: [{
            name: "Leads", // Merubah nama series-1 menjadi customer
            data: [

                <?php

                foreach ($chart1 as $row) {
                    $count = $row->count;
                    echo "$count ,";
                }

                ?>

            ]
        }],

        chart: {
            height: 350,
            type: "area",
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'text',
            categories: [

                <?php

                foreach ($chart1 as $row) {
                    $created_at = $row->tanggal;
                    $new_format = date('d M Y', strtotime($created_at));
                    echo "'$new_format',";
                }

                ?>

            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();
</script>


<?php $this->endSection(); ?>