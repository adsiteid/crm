<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>



<div class="row d-flex align-items-between">

    <div class="col-lg-3 col-12 rounded d-flex align-items-stretch ">
        <?php foreach ($user->getResultArray() as $row) : ?>
            <div class="card p-3 w-100">
                <div class="card-body  ">
                    <div class="text-center">
                        <!-- upload gambar -->
                        <div class="col">

                            <div class="preview d-flex justify-content-center mb-2">
                                <?php if ($row['user_image'] !== 'default.jpg') : ?>
                                    <img id="file-ip-1-preview" class="rounded-circle" style="width : 100px; height:100px; object-fit:cover;" src="<?= base_url(); ?>/document/image/profile/user/<?php echo $row['user_image']; ?>">
                                <?php endif; ?>
                                <?php if ($row['user_image'] == 'default.jpg') : ?>
                                    <img id="file-ip-1-preview" class="rounded-circle" style="width : 100px; height:100px; object-fit:cover;" src="<?= base_url(); ?>/document/image/profile/default.jpg">
                                <?php endif; ?>
                            </div>

                        </div>

                        <div class="col">

                            <p class=" mb-1"><?php echo $row['fullname']; ?></p>


                            <hr style="border-style: solid; border-width : 0.1 px; color: #fdfdfd;">
                        </div>

                    </div>

                    <div class="col mb-2">
                        <p class="text-muted mb-1" style="color : #fff; font-size: 11px;">ID user</p>
                        <h6 class="mb-1" style="font-size : 14px;"><?php echo $row['id'];
                                                                    if ($row['id'] == "") {
                                                                        echo "-";
                                                                    } ?></h6>
                    </div>

                    <div class="col mb-2">
                        <p class="text-muted mb-1" style="color : #fff; font-size: 11px;">Alamat</p>
                        <h6 class="mb-1" style="font-size : 14px;"><?php echo $row['address'];
                                                                    if ($row['address'] == "") {
                                                                        echo "-";
                                                                    } ?></h6>
                    </div>
                    <div class="col mb-2">
                        <p class="text-muted mb-1" style="color : #fff; font-size: 11px;">Nomor Kontak</p>
                        <h6 class="mb-1" style="font-size : 14px;"><?php echo $row['contact'];
                                                                    if ($row['contact'] == "") {
                                                                        echo "-";
                                                                    } ?></h6>
                    </div>

                    <div class="col mb-2">
                        <p class="text-muted mb-1" style="color : #fff; font-size: 11px;">Email</p>
                        <h6 class="mb-1" style="font-size : 14px;"><?php echo $row['email'];
                                                                    if ($row['email'] == "") {
                                                                        echo "-";
                                                                    } ?></h6>
                    </div>


                    <div class="col-12 p-3 d-flex justify-content-end mt-3 ">
                        <!-- <a class="btn btn-outline-primary mr-2 col-lg-6 col-sm-6 d-lg-block d-none" data-toggle="modal" data-target="#deletuserModal"> Delete</a>-->
                        <?php if (in_groups('admin') || in_groups('admin_group') || in_groups('admin_project')) { ?>
                            <a href="<?= base_url(); ?>edit_user/<?= $row['id']; ?>" type="button" class="btn btn-warning col-lg-12 col-sm-6 " name="submit" style="background-color:#FF6B00;">Edit Account</a>
                        <?php } elseif ($row['id'] == user()->id) { ?>
                            <a href="<?= base_url(); ?>edit_user_id" type="button" class="btn btn-warning col-lg-12 col-sm-6 " name="submit" style="background-color:#FF6B00;">Edit Account</a>
                        <?php } ?>
                    </div>

                </div>

            </div>
        <?php endforeach; ?>
    </div>




    <div class="col-lg-9 col-12 align-items-stretch ">

        <div class="row mt-lg-0 mt-3">
            <div class="col-lg-6 col-12 px-lg-2 px-3">
                <div class="card mb-lg-0 mb-3">
                    <div class="card-body py-lg-5  py-4 px-lg-5 px-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="text-muted small">Total Booking</p>
                                <h4 class="fw-bolder">Rp. <?php
                                                            $total = 0;
                                                            foreach ($salesBooking->getResultArray() as $cb) :
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
                <div class="card mb-lg-0 mb-3">
                    <div class="card-body py-lg-5 py-4 px-lg-5 px-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="text-muted small">Total Reserve</p>

                                <h4 class="fw-bolder">Rp. <?php
                                                            $total = 0;
                                                            foreach ($salesReserve->getResultArray() as $cb) :
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

        <div class="row mt-lg-3 mt-0">

            <div class="col-12 px-lg-2 px-3 d-flex align-items-stretch ">

                <div class="card w-100">


                    <div class="card-header mb-4 d-flex align-items-center justify-content-between bg-transparent">
                        <div class="py-3">
                            <h6 class="my-2 font-weight-bold text-primary">Leads Report</h6>
                            <p class="text-muted" style="font-size : 12px;"></p>
                        </div>
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                                <i class="mdi mdi-calendar"></i><?= $days ?>
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

                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div class="pt-2" id="leads"></div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="row px-4 pt-lg-4 pt-2">
                                    <div class="col">
                                        <h6>New</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $new_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Close</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $close_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Pending</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $pending_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Contacted</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $contacted_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Visit</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $visit_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Deal</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $deal_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Reserve</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $reserve_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                                <div class="row px-4 pt-2">
                                    <div class="col">
                                        <h6>Booking</h6>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <h6><?= $booking_report_sales->getNumRows(); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 px-lg-2 px-3">
        <div class="card">

            <?php foreach ($user->getResultArray() as $row) : ?>

                <div class="card-header d-flex align-items-center justify-content-between bg-white bg-transparent">
                    <div class="py-3">

                        <?php if ($row['id'] !== user()->id) : ?>
                            <form action="<?= base_url(); ?>search_leads_user/<?= $row['id']; ?>" method="post" class=" form-inline ">
                            <?php endif; ?>
                            <?php if ($row['id'] == user()->id) : ?>
                                <form action="<?= base_url(); ?>search_leads_user_loggedin/<?= $row['id']; ?>" method="post" class=" form-inline ">
                                <?php endif; ?>
                                <div class="input-group input-group-sm mt-2 mr-3 d-lg-flex d-none ">
                                    <input type="text" class="form-control rounded-left border-0 bg-light pl-3 " placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
                                    <div class="input-group-append">
                                        <button class="btn btn-light rounded-right" type="submit">
                                            <i class="icon-search"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
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


                    <?php if ($row['id'] !== user()->id) : ?>
                        <form action="<?= base_url(); ?>search_leads_user/<?= $row['id']; ?>" method="post" class=" form-inline ">
                        <?php endif; ?>
                        <?php if ($row['id'] == user()->id) : ?>
                            <form action="<?= base_url(); ?>search_leads_user_loggedin/<?= $row['id']; ?>" method="post" class=" form-inline ">
                            <?php endif; ?>
                            <div class="input-group input-group-sm d-lg-none mb-3">
                                <input type="text" class="form-control border-0 rounded-left bg-light pl-3 " placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search_leads">
                                <div class="input-group-append">
                                    <button class="btn btn-light rounded-right" type="submit">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                            </div>
                            </form>

                            <!-- table -->

                            <div id="export_pdf">
                                <div class="table-responsive">

                                    <div id="export_excel">

                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th class="">
                                                        Address
                                                    </th>
                                                    <th>
                                                        Project
                                                    </th>
                                                    <th>
                                                        Source
                                                    </th>
                                                    <th>
                                                        Sales/Agent
                                                    </th>
                                                    <th>
                                                        Manager
                                                    </th>
                                                    <th>
                                                        GM
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Category
                                                    </th>
                                                    <th>
                                                        Date In
                                                    </th>
                                                    <th>
                                                        Contacted
                                                    </th>
                                                    <th>
                                                        Visit
                                                    </th>
                                                    <th>
                                                        Deal
                                                    </th>
                                                    <th>
                                                        Reserve
                                                    </th>
                                                    <th>
                                                        Booking
                                                    </th>
                                                    <th>
                                                        Reserve Amount
                                                    </th>
                                                    <th>
                                                        Booking Amount
                                                    </th>
                                                    <th>
                                                        Feedback/Notes
                                                    </th>
                                                    <th>
                                                        Notes
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="list-wrapper">
                                                <?php $no = 1; ?>
                                                <?php

                                                foreach ($leads->getResultArray() as $data) :
                                                    // foreach ($leads->getResultArray() as $row) :

                                                ?>
                                                    <tr class="list-item" onclick="location.href='<?= base_url(); ?>leads/<?= $data['id']; ?>'">
                                                        <td>
                                                            <?= $no++; ?>
                                                        </td>
                                                        <td style="width:100px;">

                                                            <?php
                                                            $str = $data['nama_leads'];
                                                            if (strlen($str) > 15) {
                                                                $str = substr($str, 0, 15) . ' ...';
                                                            }
                                                            echo $str;
                                                            ?>
                                                        </td>
                                                        <td class="">
                                                            <?= $data['alamat']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?php foreach ($project->detail($data['project'])->getResultarray() as $prj) {
                                                                echo $prj['project'];
                                                            } ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= $data['sumber_leads']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?php foreach ($user_group->detail($data['sales'])->getResultArray() as $sl) : ?>
                                                                <?= $sl['fullname']; ?>
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?php foreach ($user_group->detail($data['manager'])->getResultArray() as $mg) : ?>
                                                                <?= $mg['fullname']; ?>
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?php foreach ($user_group->detail($data['general_manager'])->getResultArray() as $g) : ?>
                                                                <?= $g['fullname']; ?>
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= $data['update_status']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= $data['kategori_status']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= date('d M Y - H:i:s', strtotime($data['time_stamp_new']));
                                                            ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= ($data['time_stamp_contacted'] == "") ? '-' : date('d M Y - H:i:s', strtotime($data['time_stamp_contacted'])); ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= ($data['time_stamp_visit'] == "") ? '-' : date('d M Y - H:i:s', strtotime($data['time_stamp_visit'])); ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= ($data['time_stamp_deal'] == "") ? '-' : date('d M Y - H:i:s', strtotime($data['time_stamp_deal'])); ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= ($data['time_stamp_reserve'] == "") ? '-' : date('d M Y - H:i:s', strtotime($data['time_stamp_reserve'])); ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= ($data['time_stamp_booking'] == "") ? '-' : date('d M Y - H:i:s', strtotime($data['time_stamp_booking'])); ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= $data['reserve']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= $data['booking']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell ">
                                                            <?= $data['catatan']; ?>
                                                        </td>
                                                        <td class="d-sm-table-cell">
                                                            <?= $data['catatan_admin']; ?>
                                                        </td>

                                                    </tr>

                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- akhir table -->


                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>

<div class="my-5"></div>


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
                <?= $salesClose->getNumRows(); ?>,
                <?= $salesPending->getNumRows(); ?>,
                <?= $salesContacted->getNumRows(); ?>,
                <?= $salesVisit->getNumRows(); ?>,
                <?= $salesDeal->getNumRows(); ?>,
                <?= $salesReserve->getNumRows(); ?>,
                <?= $salesBooking->getNumRows(); ?>,
            ]
        }],
        xaxis: {
            type: 'text',
            categories: ['Total Leads', 'Close', 'Pending', 'Contacted', 'Visit', 'Deal', 'Reserve', 'Booking']
        }
    }

    var chart = new ApexCharts(document.querySelector("#leads"), options);

    chart.render();
</script>


<?php $this->endSection(); ?>