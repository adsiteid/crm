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
        <h5 class="mb-0 text-primary d-lg-none d-block"><?= $days; ?></h5>
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
    <div class="card-header mb-4 d-lg-flex d-none align-items-center justify-content-between bg-transparent py-3">
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
                <i class="mdi mdi-calendar"></i><?= "Last " . $count . " Days"; ?>
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

                    <table id="report_new_leads" name="report_new_leads" class="table table-hover" width="100%" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="font-size:13px; text-align:left">Source</td>

                                <th style="font-size:13px; text-align:left">Count</td>
                            </tr>
                        </thead>
                        <tbody class="list-wrapper">


                            <?php

                            // if (in_groups('admin')) :
                            //     $facebook_ads = $source->source('Facebook Ads', $count)->getNumRows();
                            //     $facebook = $source->source('Facebook', $count)->getNumRows();
                            //     $instagram_ads = $source->source('Instagram Ads', $count)->getNumRows();
                            //     $instagram = $source->source('Instagram', $count)->getNumRows();
                            //     $youtube = $source->source('Youtube', $count)->getNumRows();
                            //     $tiktok = $source->source('TikTok Ads (Marcomm)', $count)->getNumRows();
                            //     $datamarcomm = $source->source('Data Marcomm', $count)->getNumRows();
                            //     $datapribadi = $source->source('Data Pribadi', $count)->getNumRows();
                            //     $iklanpribadi = $source->source('Iklan Pribadi', $count)->getNumRows();
                            //     $canvasing = $source->source('Canvasing', $count)->getNumRows();
                            //     $walkin = $source->source('Walk In', $count)->getNumRows();
                            //     $pameran = $source->source('Pameran', $count)->getNumRows();
                            //     $spanduk = $source->source('Spanduk', $count)->getNumRows();
                            //     $hoarding = $source->source('Hoarding', $count)->getNumRows();
                            //     $billboard = $source->source('Billboard', $count)->getNumRows();
                            //     $refferal = $source->source('Refferal', $count)->getNumRows();
                            //     $agent = $source->source('Agent', $count)->getNumRows();
                            //     $whatsapp = $source->source('Whatsapp', $count)->getNumRows();
                            // endif;

                            if (in_groups('users')) :


                                if (empty($group->user(user()->id)->getResultArray())) {
                                    $facebook_ads = $source->source('Facebook Ads', $count)->getNumRows();
                                    $facebook = $source->source('Facebook', $count)->getNumRows();
                                    $instagram_ads = $source->source('Instagram Ads', $count)->getNumRows();
                                    $instagram = $source->source('Instagram', $count)->getNumRows();
                                    $youtube = $source->source('Youtube', $count)->getNumRows();
                                    $tiktok = $source->source('TikTok Ads (Marcomm)', $count)->getNumRows();
                                    $datamarcomm = $source->source('Data Marcomm', $count)->getNumRows();
                                    $datapribadi = $source->source('Data Pribadi', $count)->getNumRows();
                                    $iklanpribadi = $source->source('Iklan Pribadi', $count)->getNumRows();
                                    $canvasing = $source->source('Canvasing', $count)->getNumRows();
                                    $walkin = $source->source('Walk In', $count)->getNumRows();
                                    $pameran = $source->source('Pameran', $count)->getNumRows();
                                    $spanduk = $source->source('Spanduk', $count)->getNumRows();
                                    $hoarding = $source->source('Hoarding', $count)->getNumRows();
                                    $billboard = $source->source('Billboard', $count)->getNumRows();
                                    $refferal = $source->source('Refferal', $count)->getNumRows();
                                    $agent = $source->source('Agent', $count)->getNumRows();
                                    $whatsapp = $source->source('Whatsapp', $count)->getNumRows();
                                }


                                foreach ($group->user(user()->id)->getResultArray() as $group) {
                                    if ($group['level'] == "admin_group") {
                                        $facebook_ads = $source->sourceAdminGroup($group['groups'], 'Facebook Ads', $count)->getNumRows();
                                        $facebook = $source->sourceAdminGroup($group['groups'], 'Facebook', $count)->getNumRows();
                                        $instagram_ads = $source->sourceAdminGroup($group['groups'], 'Instagram Ads', $count)->getNumRows();
                                        $instagram = $source->sourceAdminGroup($group['groups'], 'Instagram', $count)->getNumRows();
                                        $youtube = $source->sourceAdminGroup($group['groups'], 'Youtube', $count)->getNumRows();
                                        $tiktok = $source->sourceAdminGroup($group['groups'], 'TikTok Ads (Marcomm)', $count)->getNumRows();
                                        $datamarcomm = $source->sourceAdminGroup($group['groups'], 'Data Marcomm', $count)->getNumRows();
                                        $datapribadi = $source->sourceAdminGroup($group['groups'], 'Data Pribadi', $count)->getNumRows();
                                        $iklanpribadi = $source->sourceAdminGroup($group['groups'], 'Iklan Pribadi', $count)->getNumRows();
                                        $canvasing = $source->sourceAdminGroup($group['groups'], 'Canvasing', $count)->getNumRows();
                                        $walkin = $source->sourceAdminGroup($group['groups'], 'Walk In', $count)->getNumRows();
                                        $pameran = $source->sourceAdminGroup($group['groups'], 'Pameran', $count)->getNumRows();
                                        $spanduk = $source->sourceAdminGroup($group['groups'], 'Spanduk', $count)->getNumRows();
                                        $hoarding = $source->sourceAdminGroup($group['groups'], 'Hoarding', $count)->getNumRows();
                                        $billboard = $source->sourceAdminGroup($group['groups'], 'Billboard', $count)->getNumRows();
                                        $refferal = $source->sourceAdminGroup($group['groups'], 'Refferal', $count)->getNumRows();
                                        $agent = $source->sourceAdminGroup($group['groups'], 'Agent', $count)->getNumRows();
                                        $whatsapp = $source->sourceAdminGroup($group['groups'], 'Whatsapp', $count)->getNumRows();
                                    } elseif ($group['level'] == "admin_project") {
                                        $facebook_ads = $source->sourceAdminProject($group['project'], 'Facebook Ads', $count)->getNumRows();
                                        $facebook = $source->sourceAdminProject($group['project'], 'Facebook', $count)->getNumRows();
                                        $instagram_ads = $source->sourceAdminProject($group['project'], 'Instagram Ads', $count)->getNumRows();
                                        $instagram = $source->sourceAdminProject($group['project'], 'Instagram', $count)->getNumRows();
                                        $youtube = $source->sourceAdminProject($group['project'], 'Youtube', $count)->getNumRows();
                                        $tiktok = $source->sourceAdminProject($group['project'], 'TikTok Ads (Marcomm)', $count)->getNumRows();
                                        $datamarcomm = $source->sourceAdminProject($group['project'], 'Data Marcomm', $count)->getNumRows();
                                        $datapribadi = $source->sourceAdminProject($group['project'], 'Data Pribadi', $count)->getNumRows();
                                        $iklanpribadi = $source->sourceAdminProject($group['project'], 'Iklan Pribadi', $count)->getNumRows();
                                        $canvasing = $source->sourceAdminProject($group['project'], 'Canvasing', $count)->getNumRows();
                                        $walkin = $source->sourceAdminProject($group['project'], 'Walk In', $count)->getNumRows();
                                        $pameran = $source->sourceAdminProject($group['project'], 'Pameran', $count)->getNumRows();
                                        $spanduk = $source->sourceAdminProject($group['project'], 'Spanduk', $count)->getNumRows();
                                        $hoarding = $source->sourceAdminProject($group['project'], 'Hoarding', $count)->getNumRows();
                                        $billboard = $source->sourceAdminProject($group['project'], 'Billboard', $count)->getNumRows();
                                        $refferal = $source->sourceAdminProject($group['project'], 'Refferal', $count)->getNumRows();
                                        $agent = $source->sourceAdminProject($group['project'], 'Agent', $count)->getNumRows();
                                        $whatsapp = $source->sourceAdminProject($group['project'], 'Whatsapp', $count)->getNumRows();
                                    } else {
                                        $facebook_ads = $source->source('Facebook Ads', $count)->getNumRows();
                                        $facebook = $source->source('Facebook', $count)->getNumRows();
                                        $instagram_ads = $source->source('Instagram Ads', $count)->getNumRows();
                                        $instagram = $source->source('Instagram', $count)->getNumRows();
                                        $youtube = $source->source('Youtube', $count)->getNumRows();
                                        $tiktok = $source->source('TikTok Ads (Marcomm)', $count)->getNumRows();
                                        $datamarcomm = $source->source('Data Marcomm', $count)->getNumRows();
                                        $datapribadi = $source->source('Data Pribadi', $count)->getNumRows();
                                        $iklanpribadi = $source->source('Iklan Pribadi', $count)->getNumRows();
                                        $canvasing = $source->source('Canvasing', $count)->getNumRows();
                                        $walkin = $source->source('Walk In', $count)->getNumRows();
                                        $pameran = $source->source('Pameran', $count)->getNumRows();
                                        $spanduk = $source->source('Spanduk', $count)->getNumRows();
                                        $hoarding = $source->source('Hoarding', $count)->getNumRows();
                                        $billboard = $source->source('Billboard', $count)->getNumRows();
                                        $refferal = $source->source('Refferal', $count)->getNumRows();
                                        $agent = $source->source('Agent', $count)->getNumRows();
                                        $whatsapp = $source->source('Whatsapp', $count)->getNumRows();
                                    }
                                }
                            endif;

                            ?>

                            <!-- list-item -->
                            <tr class="">
                                <td>Facebook Ads</td>
                                <td> <?= $facebook_ads; ?></td>
                            </tr>
                            <tr class="">
                                <td>Facebook</td>
                                <td><?= $facebook; ?></td>
                            </tr>
                            <tr class="">
                                <td>Instagram Ads</td>
                                <td><?= $instagram_ads; ?></td>
                            </tr>
                            <tr class="">
                                <td>Instagram</td>
                                <td><?= $instagram; ?></td>
                            </tr>
                            <tr class="">
                                <td>Youtube</td>
                                <td><?= $youtube; ?></td>
                            </tr>
                            <tr class="">
                                <td>TikTok Ads (Marcomm)</td>
                                <td><?= $tiktok; ?></td>
                            </tr>
                            <tr class="">
                                <td>Data Marcomm</td>
                                <td><?= $datamarcomm; ?></td>
                            </tr>
                            <tr class="">
                                <td>Data Pribadi</td>
                                <td><?= $datapribadi; ?></td>
                            </tr>
                            <tr class="">
                                <td>Iklan Pribadi</td>
                                <td><?= $iklanpribadi; ?></td>
                            </tr>

                            <tr class="">
                                <td>Canvasing</td>
                                <td><?= $canvasing; ?></td>
                            </tr>

                            <tr class="">
                                <td>Walk In</td>
                                <td><?= $walkin; ?></td>
                            </tr>

                            <tr class="">
                                <td>Pameran</td>
                                <td><?= $pameran; ?></td>
                            </tr>

                            <tr class="">
                                <td>Spanduk</td>
                                <td><?= $spanduk; ?></td>
                            </tr>

                            <tr class="">
                                <td>Billboard</td>
                                <td><?= $billboard; ?></td>
                            </tr>

                            <tr class="">
                                <td>Hoarding</td>
                                <td><?= $hoarding; ?></td>
                            </tr>

                            <tr class="">
                                <td>Refferal</td>
                                <td><?= $refferal; ?></td>
                            </tr>

                            <tr class="">
                                <td>Agent</td>
                                <td><?= $agent; ?></td>
                            </tr>

                            <tr class="">
                                <td>Whatsapp</td>
                                <td><?= $whatsapp; ?></td>
                            </tr>

                            <tr>
                                <td style="font-weight: 900; color:green">Total Leads</td>
                                <td style="font-weight: 900; color:green">
                                    <?= $facebook_ads +
                                        $facebook +
                                        $instagram_ads +
                                        $instagram +
                                        $youtube +
                                        $tiktok +
                                        $datamarcomm +
                                        $datapribadi +
                                        $iklanpribadi +
                                        $canvasing +
                                        $walkin +
                                        $pameran +
                                        $spanduk +
                                        $billboard +
                                        $hoarding +
                                        $refferal +
                                        $agent +
                                        $whatsapp; ?>
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


<!-- OFFCANVAS BOTTOM -->

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button> -->

<div class="offcanvas offcanvas-bottom bg-light" style="height:43%;" tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">

        <a href="<?= base_url(); ?>report_source/90" type=" button" class="btn btn-light bg-white w-100 mb-2">Last 90 Days</a>
        <a href="<?= base_url(); ?>report_source/30" type="button" class="btn btn-light bg-white  w-100 mb-2">Last 30 Days</a>
        <a href="<?= base_url(); ?>report_source/7" type="button" class="btn btn-light bg-white w-100 mb-2">Last 7 Days</a>
        <a href="#" type="button" class="btn btn-light bg-white w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRange" aria-controls="offcanvasRange">Custom Range</a>

    </div>
</div>





<div class="offcanvas offcanvas-bottom bg-light" style="height:43%;" tabindex="-1" id="offcanvasRange" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Filter Data</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>report_source_range" method="post">
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
                <?= $facebook_ads; ?>,
                <?= $facebook; ?>,
                <?= $instagram_ads; ?>,
                <?= $instagram; ?>,
                <?= $youtube; ?>,
                <?= $tiktok; ?>,
                <?= $datamarcomm; ?>,
                <?= $datapribadi; ?>,
                <?= $iklanpribadi; ?>,
                <?= $canvasing; ?>,
                <?= $walkin; ?>,
                <?= $pameran; ?>,
                <?= $spanduk; ?>,
                <?= $billboard; ?>,
                <?= $hoarding; ?>,
                <?= $refferal; ?>,
                <?= $agent; ?>,
                <?= $whatsapp; ?>
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
                <?= $facebook_ads; ?>,
                <?= $facebook; ?>,
                <?= $instagram_ads; ?>,
                <?= $instagram; ?>,
                <?= $youtube; ?>,
                <?= $tiktok; ?>,
                <?= $datamarcomm; ?>,
                <?= $datapribadi; ?>,
                <?= $iklanpribadi; ?>,
                <?= $canvasing; ?>,
                <?= $walkin; ?>,
                <?= $pameran; ?>,
                <?= $spanduk; ?>,
                <?= $billboard; ?>,
                <?= $hoarding; ?>,
                <?= $refferal; ?>,
                <?= $agent; ?>,
                <?= $whatsapp; ?>
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