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
            <h6 class="mb-2 font-weight-bold text-primary">Source Report</h6>
            <p class="text-muted" style="font-size : 12px;"></p>
        </div>
        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                <i class="mdi mdi-calendar"></i><?= $count; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="<?= base_url(); ?>report_source/90">Last 90 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_source/30">Last 30 Days</a>
                <a class="dropdown-item" href="<?= base_url(); ?>report_source/7">Last 7 Days</a>
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

                    <table id="report_new_leads" name="report_new_leads" class="table table-striped table-hover" width="100%" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="font-size:13px; text-align:left">Source</td>

                                <th style="font-size:13px; text-align:left">Count</td>
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">

                            <!-- list-item -->
                            <tr class="">
                                <td>Facebook Ads</td>
                                <td><?= $source->source_range('Facebook Ads', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Facebook</td>
                                <td><?= $source->source_range('Facebook', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Instagram Ads</td>
                                <td><?= $source->source_range('Instagram Ads', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Instagram</td>
                                <td><?= $source->source_range('Instagram', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Youtube</td>
                                <td><?= $source->source_range('Youtube', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>TikTok Ads (Marcomm)</td>
                                <td><?= $source->source_range('TikTok Ads (Marcomm)', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Data Marcomm</td>
                                <td><?= $source->source_range('Data Marcomm', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Data Pribadi</td>
                                <td><?= $source->source_range('Data Pribadi', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>
                            <tr class="">
                                <td>Iklan Pribadi</td>
                                <td><?= $source->source_range('Iklan Pribadi', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Canvasing</td>
                                <td><?= $source->source_range('Canvasing', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Walk In</td>
                                <td><?= $source->source_range('Walk In', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Pameran</td>
                                <td><?= $source->source_range('Pameran', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Spanduk</td>
                                <td><?= $source->source_range('Spanduk', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Billboard</td>
                                <td><?= $source->source_range('Billboard', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Hoarding</td>
                                <td><?= $source->source_range('Hoarding', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Refferal</td>
                                <td><?= $source->source_range('Refferal', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Agent</td>
                                <td><?= $source->source_range('Agent', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr class="">
                                <td>Whatsapp</td>
                                <td><?= $source->source_range('Whatsapp', $startDate , $endDate)->getNumRows(); ?></td>
                            </tr>

                            <tr>
                                <td style="font-weight: 900; color:green">Total Leads</td>
                                <td style="font-weight: 900; color:green">
                                    <?= $source->source_range('Facebook Ads', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Facebook', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Instagram Ads', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Instagram', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Youtube', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Tiktok', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Data Marcomm', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Data Pribadi', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Iklan Pribadi', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Canvasing', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Walk In', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Pameran', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Spanduk', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Billboard', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Hoarding', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Refferal', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Agent', $startDate , $endDate)->getNumRows() +
                                        $source->source_range('Whatsapp', $startDate , $endDate)->getNumRows(); ?>
                                </td>
                            </tr>

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
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>report_source_range" method="post">
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
                <?= $source->source_range('Facebook Ads', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Facebook', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Instagram Ads', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Instagram', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Youtube', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Tiktok', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Data Marcomm', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Data Pribadi', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Iklan Pribadi', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Canvasing', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Walk In', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Pameran', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Spanduk', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Billboard', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Hoarding', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Refferal', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Agent', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Whatsapp', $startDate , $endDate)->getNumRows(); ?>
            ]
        }],


        xaxis: {
            type: 'text',
            categories: [
                'Facebook Ads',
                'Facebook',
                'Instagram Ads',
                'Instagram',
                'Youtube',
                'Tiktok',
                'Data Marcomm',
                'Data Pribadi',
                'Iklan Pribadi',
                'Canvasing',
                'Walk In',
                'Pameran',
                'Spanduk',
                'Billboard',
                'Hoarding',
                'Refferal',
                'Agent',
                'Whatsapp'
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
                <?= $source->source_range('Facebook Ads', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Facebook', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Instagram Ads', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Instagram', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Youtube', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Tiktok', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Data Marcomm', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Data Pribadi', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Iklan Pribadi', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Canvasing', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Walk In', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Pameran', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Spanduk', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Billboard', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Hoarding', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Refferal', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Agent', $startDate , $endDate)->getNumRows(); ?>,
                <?= $source->source_range('Whatsapp', $startDate , $endDate)->getNumRows(); ?>
            ]
        }],
        xaxis: {
            categories: [
                'Facebook Ads',
                'Facebook',
                'Instagram Ads',
                'Instagram',
                'Youtube',
                'Tiktok',
                'Data Marcomm',
                'Data Pribadi',
                'Iklan Pribadi',
                'Canvasing',
                'Walk In',
                'Pameran',
                'Spanduk',
                'Billboard',
                'Hoarding',
                'Refferal',
                'Agent',
                'Whatsapp'
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



<?php $this->endSection(); ?>