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
    <!-- <div class="col-lg-4 col-12 px-lg-2 px-3">
                <div class="card mb-lg-0 mb-3">
                    <div class="card-body py-4">
                        <p class="text-muted small">Total Earnings</p>
                        <h5 class="fw-bolder">Rp. 10.000.000</h5>
                    </div>
                </div>
            </div> -->
</div>




<div class="card rounded-4 pt-3 mb-4">
    <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
        <div>
            <h6 class="mb-2 font-weight-bold text-primary">Leads Funnel</h6>
            <p class="text-muted" style="font-size : 12px;"></p>
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
        <div id="leads"></div>
    </div>
</div>






<div class="card mb-4">
    <!-- Card Header - Dropdown -->


    <!-- Card Body -->
    <div class="card-body">

        <div class="pb-4 pt-2 d-flex flex-row align-items-center justify-content-between">
            <div>
                <h6 class="mb-2 font-weight-bold text-primary">Leads Status</h6>
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



        <!-- TABLE  -->


        <div class="table-responsive" id="printableArea">



            <table id="report_new_leads" name="report_new_leads" class="table table-striped table-hover" width="100%" style="font-size:12px;">
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
        border-style: solid;
    }

    .simple-pagination .prev.current,
    .simple-pagination .next.current {
        background: #fff;
    }
</style>


<?php
$now = date('Y/m/d');
$in30 = date('Y/m/d', strtotime($now . ' - 30 days'));
?>



<div class="card">

    <div class="card-header d-flex align-items-center justify-content-between bg-white">
        <div class="d-lg-none d-block"></div>
        <div class="d-lg-block d-none">
            <form action="<?= base_url(); ?>search_report" method="post" class=" form-inline ">
                <div class="input-group input-group-sm mt-2 mr-3 ">
                    <input type="text" class="form-control rounded-left bg-light pl-3 " placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_report">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-right" type="submit">
                            <i class="icon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row d-flex justify-content-between">

            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light dropdown-toggle   " type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                    <i class="mdi mdi-calendar"></i> Export Data
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#" onclick="exportF(this)">Export Excel</a>
                    <a class="dropdown-item" href="#" onclick="printDiv('export_pdf')">Print</a>
                </div>
            </div>

        </div>

    </div>


    <div class="card-body">

        <div class="d-lg-none d-block mb-3">
            <form action="<?= base_url(); ?>search_report" method="post" class=" form-inline ">
                <div class="input-group input-group-sm mt-2">
                    <input type="text" class="form-control rounded-left bg-light pl-3 " placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_report">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-right" type="submit">
                            <i class="icon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div id="export_pdf">
            <div class="table-responsive">

                <div id="export_excel">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="">
                                    No
                                </th>
                                <th>
                                    Name
                                </th>
                                <th class="">
                                    Address
                                </th>
                                <th class="">
                                    Project
                                </th>
                                <th class="">
                                    Source
                                </th>
                                <th class="">
                                    Sales/Agent
                                </th>
                                <th class=""> <!-- d-sm-table-cell d-none -->
                                    Manager
                                </th>
                                <th class="">
                                    GM
                                </th>
                                <th class="">
                                    Status
                                </th>
                                <th class="">
                                    Category
                                </th>
                                <th class="">
                                    Date In
                                </th>
                                <th class="">
                                    Contacted
                                </th>
                                <th class="">
                                    Visit
                                </th>
                                <th class="">
                                    Deal
                                </th>
                                <th class="">
                                    Reserve
                                </th>
                                <th class="">
                                    Booking
                                </th>
                                <th class="">
                                    Reserve Amount
                                </th>
                                <th class="">
                                    Booking Amount
                                </th>
                                <th class="">
                                    Feedback/Notes
                                </th>
                                <th class="">
                                    Notes
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">
                            <?php $no = 1; ?>
                            <?php

                            foreach ($leads->getResultArray() as $row) :
                                // foreach ($leads->getResultArray() as $row) :

                            ?>
                                <tr class="list-item" onclick="location.href='<?= base_url(); ?>leads/<?= $row['id']; ?>'">
                                    <td class="">
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
                                    <td class="">
                                        <?= $row['alamat']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['project']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['sumber_leads']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?php foreach ($user_group->detail($row['sales'])->getResultArray() as $sl) : ?>
                                            <?= $sl['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?php foreach ($user_group->detail($row['manager'])->getResultArray() as $mg) : ?>
                                            <?= $mg['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?php foreach ($user_group->detail($row['general_manager'])->getResultArray() as $gm) : ?>
                                            <?= $gm['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['update_status']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['kategori_status']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= date('d M Y - H:i:s', strtotime($row['time_stamp_new']));
                                        ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= ($row['time_stamp_contacted'] == "") ? '-' : date('d M Y - H:i:s', strtotime($row['time_stamp_contacted'])); ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= ($row['time_stamp_visit'] == "") ? '-' : date('d M Y - H:i:s', strtotime($row['time_stamp_visit'])); ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= ($row['time_stamp_deal'] == "") ? '-' : date('d M Y - H:i:s', strtotime($row['time_stamp_deal'])); ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= ($row['time_stamp_reserve'] == "") ? '-' : date('d M Y - H:i:s', strtotime($row['time_stamp_reserve'])); ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= ($row['time_stamp_booking'] == "") ? '-' : date('d M Y - H:i:s', strtotime($row['time_stamp_booking'])); ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['reserve']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['booking']; ?>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <?= $row['catatan']; ?>
                                    </td>
                                    <td class="d-sm-table-cell">
                                        <?= $row['catatan_admin']; ?>
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


<!-- <div id="pagination-container" class="my-4"></div> -->




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
                <?= $leadsNew->getNumRows(); ?>,
                // <?= $leadsClose->getNumRows(); ?>,
                // <?= $leadsPending->getNumRows(); ?>,
                <?= $leadsContacted->getNumRows(); ?>,
                <?= $leadsVisit->getNumRows(); ?>,
                <?= $leadsDeal->getNumRows(); ?>,
                // <?= $leadsReserve->getNumRows(); ?>,
                // <?= $leadsBooking->getNumRows(); ?>,
            ]
        }],
        xaxis: {
            type: 'text',
            categories: ['Leads In', 'Contacted', 'Visit', 'Deal']
        }
    }

    var chart = new ApexCharts(document.querySelector("#leads"), options);

    chart.render();
</script>


<?php $this->endSection(); ?>