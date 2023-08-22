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



<div class="card rounded-4 pt-3 mb-4">
    <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
        <div>
            <h6 class="mb-2 font-weight-bold text-primary">Subholding 1</h6>
            <p class="text-muted" style="font-size : 12px;"></p>
        </div>
        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $days; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>leads_subholding/90">Last 90 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>leads_subholding/30">Last 30 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>leads_subholding/7">Last 7 Days</a>
                <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="subAll" class="mb-4"></div>

        <!-- TABLE  -->

        <div id="export_pdf">
            <div class="table-responsive" id="printableArea">

                <div id="export_excel">

                    <table id="report_new_leads" name="report_new_leads" class="table table-striped table-hover" width="100%" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="font-size:13px; text-align:left">Subholding </td>
                                <th style="font-size:13px; text-align:left">New</td>
                                <th style="font-size:13px; text-align:left">Close</td>
                                <th style="font-size:13px; text-align:left">Pending </td>
                                <th style="font-size:13px; text-align:left">Contacted</td>
                                <th style="font-size:13px; text-align:left">Visit</td>
                                <th style="font-size:13px; text-align:left">Deal</td>
                                <th style="font-size:13px; text-align:left">Reserve </td>
                                <th style="font-size:13px; text-align:left">Booking </td>
                                <th style="font-size:13px; text-align:left">Total Leads</td>
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">

                            <?php foreach ($leads as $lsub) : ?>
                                <tr class="">

                                <?php 
                                
                                $new = $subholding->subholdingNew($lsub['subholding'], $days)->getNumRows();
                                $close = $subholding->subholdingClose($lsub['subholding'], $days)->getNumRows();
                                $pending = $subholding->subholdingPending($lsub['subholding'], $days)->getNumRows();
                                $contacted = $subholding->subholdingContacted($lsub['subholding'], $days)->getNumRows();
                                $visit = $subholding->subholdingVisit($lsub['subholding'], $days)->getNumRows();
                                $deal = $subholding->subholdingDeal($lsub['subholding'], $days)->getNumRows();
                                $reserve = $subholding->subholdingReserve($lsub['subholding'], $days)->getNumRows();
                                $booking = $subholding->subholdingBooking($lsub['subholding'], $days)->getNumRows();
                                ?>

                                    <td><?= $lsub['subholding']; ?></td>
                                    <td><?= $new; ?></td>
                                    <td><?= $close; ?></td>
                                    <td><?= $pending; ?></td>
                                    <td><?= $contacted; ?></td>
                                    <td><?= $visit; ?></td>
                                    <td><?= $deal; ?></td>
                                    <td><?= $reserve; ?></td>
                                    <td><?= $booking; ?></td>
                                    <td><?= $new + $close + $pending + $contacted + $visit + $deal + $reserve + $booking ; ?></td>
                                </tr>
                            <?php endforeach; ?>


                            <!-- <tr class="border-top-3">
                                <td style="font-weight: 900; color:green">Total Leads</td>
                                <td style="font-weight: 900; color:green"></td>
                            </tr> -->

                        </tbody>

                    </table>


                </div> <!-- akhir export pdf -->
            </div> <!-- akhir export excel -->
        </div>
        <!-- AKHIR TABLE -->
    </div>
</div>



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



<!-- BAR CHART -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<!-- SUBHOLDING ALL -->
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
                foreach ($leads as $rowsub) {
                    echo $subholding->subholdingAll($rowsub['subholding'],$days)->getNumRows() . ',';
                }
                ?>
            ]
        }],
        xaxis: {
            type: 'text',
            categories: [
                <?php
                foreach ($leads as $rowsub) {
                    $p = $rowsub['subholding'];
                    echo "'$p',";
                }
                ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#subAll"), options);

    chart.render();
</script>





<?php $this->endSection(); ?>