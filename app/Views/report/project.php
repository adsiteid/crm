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
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>


<div class="d-lg-none d-flex align-items-center justify-content-between mb-lg-1 mb-3 pb-3 pt-0 mt-0 ">
    <div class="col-10 p-0">
        <p class="mb-1 text-muted" style="font-size:12px;">Update</p>
        <h5 class="mb-0 text-primary d-lg-none d-block"><?php // $days; ?></h5>
    </div>

    <div class="col-2 d-lg-none d-sm-block d-block px-0  ">
        <a href="#" type="button" class="btn btn-light bg-white rounded  w-100 d-flex justify-content-center align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasBottom"><i class="ti-filter "></i> </a>
    </div>

</div>


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

        </div>

    </div>

</div>

<div class="card rounded-4 mb-4">
    <div class="card-header mb-4 d-flex align-items-center justify-content-between py-3 bg-transparent">
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
                <i class="mdi mdi-calendar"></i>Last <?= $filter; ?> Days
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>report_project/90">Last 90 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_project/30">Last 30 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_project/7">Last 7 Days</a>
                <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="project" class="mb-4 d-lg-block d-none"></div>
        <div id="project-mobile" class="mb-4 d-lg-none d-block"></div>

        <!-- TABLE  -->

        <div id="export_pdf">
            <div class="table-responsive" id="printableArea">

                <div id="export_excel">

                    <table id="report_new_leads" name="report_new_leads" class="table table-hover" width="100%" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="font-size:13px; text-align:left">Leads Project</td>
                                <th style="font-size:13px; text-align:left">Total Leads</td>
                                <th style="font-size:13px; text-align:left">Contacted</td>
                                <th style="font-size:13px; text-align:left">Visit</td>
                                <th style="font-size:13px; text-align:left">Deal</td>
                                <th style="font-size:13px; text-align:left">Reserve</td>
                                <th style="font-size:13px; text-align:left">Booking</td>
                                <th style="font-size:13px; text-align:left">Reserve Amount</td>
                                <th style="font-size:13px; text-align:left">Booking Amount</td>

                                    <!-- <th style="font-size:13px; text-align:left">Total Leads</td> -->
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">

                            <!-- list-item -->

                            <?php
                            foreach ($leads->getResultArray() as $lproject) :

                                $projects = $project->project($lproject['project'], $filter);
                                $projectContacted = $project->projectContacted($lproject['project'], $filter);
                                $projectVisit = $project->projectVisit($lproject['project'], $filter);
                                $projectDeal = $project->projectDeal($lproject['project'], $filter);
                                $projectReserve = $project->projectReserve($lproject['project'], $filter);
                                $projectBooking = $project->projectBooking($lproject['project'], $filter);

                            ?>
                                <tr class="">
                                    <td><?php foreach ($projectid->detail($lproject['project'])->getResultarray() as $prj) {
                                            echo $prj['project'];
                                        } ?></td>
                                    <td><?= $projects->getNumRows(); ?></td>
                                    <td><?= $projectContacted->getNumRows(); ?></td>
                                    <td><?= $projectVisit->getNumRows(); ?></td>
                                    <td><?= $projectDeal->getNumRows(); ?></td>
                                    <td><?= $projectReserve->getNumRows(); ?></td>
                                    <td><?= $projectBooking->getNumRows(); ?></td>
                                    <td><?php
                                        $total = 0;
                                        foreach ($projectReserve->getResultArray() as $cb) :
                                            $total += $cb['reserve'];
                                        endforeach;
                                        echo $total;
                                        ?>
                                    </td>
                                    <td><?php
                                        $total = 0;
                                        foreach ($projectBooking->getResultArray() as $cb) :
                                            $total += $cb['booking'];
                                        endforeach;
                                        echo $total;
                                        ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>project_report_range" method="post">
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



<!-- BAR CHART -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

<script>
    var options = {
        chart: {
            height: 300,
            type: 'bar'
        },
        series: [{
            name: 'Count',
            data: [
                <?php
                foreach ($leads->getResultArray() as $lproject) {
                    echo $project->project($lproject['project'], $filter)->getNumRows() . ',';
                }
                ?>
            ]
        }],


        xaxis: {
            type: 'text',
            categories: [
                <?php
                foreach ($leads->getResultArray() as $lproject) {

                    $p = $lproject['project'];
                    echo "'$p',";
                }
                ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#project"), options);

    chart.render();
</script>

<script>
    var options = {
        chart: {
            width: '100%',
            height: 380,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                horizontal: true,

            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        series: [{
            data: [
                <?php
                foreach ($leads->getResultArray() as $lproject) {
                    echo $project->project($lproject['project'], $filter)->getNumRows() . ',';
                }
                ?>
            ]
        }],
        xaxis: {
            categories: [
                <?php
                foreach ($leads->getResultArray() as $lproject) {
                    foreach ($projectid->detail($lproject['project'])->getResultarray() as $prj) {
                        $p = $prj['project'];
                    }
                    echo "'$p',";
                }
                ?>
            ],
        },
        // tooltip: {
        //     style: {
        //         fontFamily: 'poppins',
        //         fontSize: '18px'
        //     }
        // },
    }

    var chart = new ApexCharts(document.querySelector("#project-mobile"), options);

    chart.render();
</script>

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