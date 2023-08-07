<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<style>
    @import url("https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap");

    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body {
        min-height: 100vh;
        /* include a two-color gradient behind the .viz container */
        background: linear-gradient(180deg, #344f7c 10rem, #fff 10rem);
        font-family: "Lexend Deca", sans-serif;
    }

    /* center the .viz container horizontally */
    .viz {
        background: hsl(0, 0%, 100%);
        color: hsl(240, 40%, 20%);
        padding: 2rem 1.5rem;
        margin: 2rem auto;
        max-width: 800px;
        width: 90vw;
        border-radius: 5px;
        box-shadow: 0 1px 10px -2px hsla(0, 0%, 0%, 0.5);
    }

    /* reduce the size of the heading(s) */
    .viz h1 {
        font-size: 1.5rem;
    }

    /* display the legend's items far apart from each other, with the paragraph pushed to the right */
    .viz .legend {
        display: flex;
        align-items: center;
        margin: 0.5rem 0 1rem;
    }

    .viz .legend h2 {
        color: hsl(0, 0%, 35%);
        font-weight: initial;
        font-size: 0.9rem;
        margin-right: auto;
    }

    .viz .legend p {
        font-size: 0.85rem;
        position: relative;
    }

    /* with a pseudo element add a rectangle with the same gradient used in the visualization */
    .viz .legend p:before {
        content: "";
        position: absolute;
        top: 50%;
        right: 100%;
        transform: translate(-20%, -50%);
        border-radius: 5px;
        width: 32px;
        height: 4px;
        background: linear-gradient(to right, #0cbde7, #58d943);
    }

    /* color the text of the visualization like the h2 element */
    .viz svg text {
        color: hsl(0, 0%, 35%);
    }

    /* in smaller viewports position the .legend items atop one another */
    @media (max-width: 600px) {
        .viz .legend {
            flex-direction: column;
            align-items: flex-end;
            line-height: 1.5;
        }

        .viz .legend h2 {
            margin: initial;
        }
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mt-2 ">
    <h6 class=" " style="font-size : 16px;">Report Chart</h6>
    <form action="report.php" method="get">

        <div class="row mt-2 ">
            <div class="col-lg col-12 mb-1">
                <div class="input-group input-group-sm date" id="datepicker">
                    <input type="date" class="date form-control   " id="date" name="tanggal_awal" />
                    <span class="input-group-append ">
                        <span class="input-group-text bg-light d-lg-none d-block ">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-lg col-12 mb-2">
                <div class="input-group input-group-sm date" id="datepicker">
                    <input type="date" class="date form-control  " id="date" name="tanggal_akhir" />
                    <span class="input-group-append d-lg-none d-block">
                        <span class="input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>

            <div class="col-lg col-12 "><button type="submit" class="btn btn-primary btn-primary-sm col d-block " style="font-size: 11px; "> Filter</button></div>

        </div>
    </form>

</div>

<div class="row my-4">
    <div class="col-lg-6 col-12 bg-none mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white ">
                <h6 class="mb-2 font-weight-bold text-primary">New Leads</h6>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="new"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
                <div>
                    <h6 class="mb-2 font-weight-bold text-primary">Contacted</h6>
                    <p class="text-muted" style="font-size : 12px;"></p>
                </div>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="contacted"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
                <div>
                    <h6 class="mb-2 font-weight-bold text-primary">Visit</h6>
                    <p class="text-muted" style="font-size : 12px;"></p>
                </div>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="visit"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
                <div>
                    <h6 class="mb-2 font-weight-bold text-primary">Deal</h6>
                    <p class="text-muted" style="font-size : 12px;"></p>
                </div>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="deal"></div>
            </div>
        </div>
    </div>


    <div class="col-12 mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
                <div>
                    <h6 class="mb-2 font-weight-bold text-primary">Subholding</h6>
                    <p class="text-muted" style="font-size : 12px;"></p>
                </div>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="subholding"></div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
                <div>
                    <h6 class="mb-2 font-weight-bold text-primary">Projects</h6>
                    <p class="text-muted" style="font-size : 12px;"></p>
                </div>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="project"></div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-4">
        <div class="card rounded-4 pt-3">
            <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-white">
                <div>
                    <h6 class="mb-2 font-weight-bold text-primary">Leads Source</h6>
                    <p class="text-muted" style="font-size : 12px;"></p>
                </div>
                <a href="report_new.php" class="btn btn-sm btn-light"> Detail</a>
            </div>
            <div class="card-body">
                <div id="source"></div>
            </div>
        </div>
    </div>

</div>


<style>
    body {
        font-family: "Nunito";
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- NEW LEADS -->

<script>
    var options = {
        chart: {
            height: 300,
            type: 'line'
        },
        series: [{
            name: 'Count',
            data: [
                <?php
                foreach ($sumnew->getresultArray() as $row) {
                    echo '"' . $row['count'] . '",';
                }
                ?>
            ]
        }],
        xaxis: {
            categories: [
                <?php
                foreach ($datenew->getresultArray() as $row) {
                    echo '"' . date('d M Y', strtotime($row['time_stamp_new'])) . '",';
                } ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#new"), options);

    chart.render();
</script>


<!-- CLOSE -->

<script>
    var options = {
        chart: {
            height: 300,
            type: 'line'
        },
        series: [{
            name: 'Count',
            data: [
                <?php
                foreach ($sumnew->getresultArray() as $row) {
                    echo '"' . $row['count'] . '",';
                }
                ?>
            ]
        }],
        xaxis: {
            categories: [
                <?php
                foreach ($datenew->getresultArray() as $row) {
                    echo '"' . date('d M Y', strtotime($row['time_stamp_new'])) . '",';
                } ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#close"), options);

    chart.render();
</script>


<!-- PENDING -->

<script>
    var options = {
        chart: {
            height: 300,
            type: 'line'
        },
        series: [{
            name: 'Count',
            data: [30, 40, 45, 50, 49, 60, 70, 91]
        }],
        xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
        }
    }

    var chart = new ApexCharts(document.querySelector("#pending"), options);

    chart.render();
</script>


<!-- CONTACTED -->

<script>
    var options = {
        chart: {
            height: 300,
            type: 'line'
        },
        series: [{
            name: 'Count',
            data: [
                <?php
                foreach ($sumcontacted->getresultArray() as $row) {
                    echo '"' . $row['count'] . '",';
                }
                ?>
            ]
        }],
        xaxis: {
            categories: [
                <?php
                foreach ($datecontacted->getresultArray() as $row) {
                    echo '"' . date('d M Y', strtotime($row['time_stamp_contacted'])) . '",';
                } ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#contacted"), options);

    chart.render();
</script>


<!-- VISIT -->


<script>
    var options = {
        chart: {
            height: 300,
            type: 'line'
        },


        series: [{
            name: 'Count',
            data: [
                <?php
                foreach ($sumvisit->getresultArray() as $row) {
                    echo '"' . $row['count'] . '",';
                }
                ?>
            ]
        }],
        xaxis: {
            categories: [
                <?php
                foreach ($datevisit->getresultArray() as $row) {
                    echo '"' . date('d M Y', strtotime($row['time_stamp_visit'])) . '",';
                } ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#visit"), options);

    chart.render();
</script>


<!-- DEAL -->

<script>
    var options = {
        chart: {
            height: 300,
            type: 'line'
        },
        series: [{
            name: 'Count',
            data: [
                <?php
                foreach ($sumdeal->getresultArray() as $row) {
                    echo '"' . $row['count'] . '",';
                }
                ?>
            ]
        }],

        xaxis: {
            categories: [
                <?php
                foreach ($datedeal->getresultArray() as $row) {
                    echo '"' . date('d M Y', strtotime($row['time_stamp_deal'])) . '",';
                } ?>
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#deal"), options);

    chart.render();
</script>


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
                <?= $sub1->getNumRows(); ?>,
                <?= $sub2->getNumRows(); ?>,
                <?= $sub3->getNumRows(); ?>
            ]
        }],
        xaxis: {
            type: 'text',
            categories: ['Subholding 1', 'Subholding 2', 'Subholding 3']
        }
    }

    var chart = new ApexCharts(document.querySelector("#subholding"), options);

    chart.render();
</script>




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
                <?= $project->project('Dave Apartment')->getNumRows(); ?>,
                <?= $project->project('Apple 1 Condovilla')->getNumRows(); ?>,
                <?= $project->project('Apple 3 Condovilla')->getNumRows(); ?>,
                <?= $project->project('Apple Adhi 7')->getNumRows(); ?>,
                <?= $project->project('DMarco Residence')->getNumRows(); ?>,
                <?= $project->project('Gucii 1 Apartment')->getNumRows(); ?>,
                <?= $project->project('DCrown Residence')->getNumRows(); ?>,
                <?= $project->project('DGolden Residence')->getNumRows(); ?>,
                <?= $project->project('DPalm Residence')->getNumRows(); ?>,
                <?= $project->project('Aparthouse - Puri')->getNumRows(); ?>,
                <?= $project->project('Aparthouse - River 8')->getNumRows(); ?>,
                <?= $project->project('Aparthouse - Crystal')->getNumRows(); ?>,
                <?= $project->project('Prime Home')->getNumRows(); ?>,
                <?= $project->project('Vanadium')->getNumRows(); ?>
            ]
        }],


        xaxis: {
            type: 'text',
            categories: [
                'Dave Apartment',
                'Apple 1 Condovilla',
                'Apple 3 Condovilla',
                'apple Adhi 7 Pancoran',
                'DMarco Residence',
                'Gucii 1 Apartment',
                'DCrown Residence',
                'DGolden Residence',
                'DPalm Residence',
                'Aparthouse - Puri',
                'Aparthouse - River 8',
                'Aparthouse - Crystal',
                'Primehome',
                'Vanadium'
            ]
        }
    }

    var chart = new ApexCharts(document.querySelector("#project"), options);

    chart.render();
</script>


<!-- SOURCE -->
<script>
    var options = {
        chart: {
            height: 300,
            type: 'bar'
        },
        series: [{
            name: 'Count',
            data: [
                <?= $source->source('Facebook Ads')->getNumRows(); ?>,
                <?= $source->source('Facebook')->getNumRows(); ?>,
                <?= $source->source('Instagram')->getNumRows(); ?>,
                <?= $source->source('Youtube')->getNumRows(); ?>,
                <?= $source->source('Tiktok')->getNumRows(); ?>,
                <?= $source->source('Data Marcomm')->getNumRows(); ?>,
                <?= $source->source('Iklan STI')->getNumRows(); ?>,
                <?= $source->source('Data Pribadi')->getNumRows(); ?>,
                <?= $source->source('Iklan Pribadi')->getNumRows(); ?>,
                <?= $source->source('Canvasing')->getNumRows(); ?>,
                <?= $source->source('Walk In')->getNumRows(); ?>,
                <?= $source->source('Pameran')->getNumRows(); ?>,
                <?= $source->source('Spanduk')->getNumRows(); ?>,
                <?= $source->source('Billboard')->getNumRows(); ?>,
                <?= $source->source('Hoarding')->getNumRows(); ?>,
                <?= $source->source('Refferal')->getNumRows(); ?>,
                <?= $source->source('Agent')->getNumRows(); ?>,
                <?= $source->source('Whatsapp')->getNumRows(); ?>
            ]
        }],
        xaxis: {
            type: 'text',
            categories: [
                'Facebook Ads',
                'Facebook',
                'Instagram',
                'Youtube',
                'Tiktok',
                'Data Marcomm',
                'Iklan STI',
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

    var chart = new ApexCharts(document.querySelector("#source"), options);

    chart.render();
</script>


<?php $this->endSection(); ?>