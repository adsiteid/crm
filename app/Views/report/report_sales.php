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
</style>



<div class="card mb-4">
    <!-- Card Header - Dropdown -->


    <!-- Card Body -->
    <div class="card-body">

        <div class=" d-flex flex-row align-items-center justify-content-between">
            <div>
                <h6 class="mb-2 font-weight-bold text-primary">Report Sales</h6>
            </div>

            <div>
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


                <div class="dropdown no-arrow">

                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-more text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header text-muted">EXPORT</div>
                        <a class="dropdown-item " href="index_report2.php" onclick="exportF(this)">Export Excel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" type="button" onclick="printDiv('export_pdf')">Print/Save PDF</a>
                    </div>
                </div>



            </div>


        </div>



        <!-- TABLE  -->

        <div id="export_pdf">
            <div class="table-responsive" id="printableArea">

                <div id="export_excel">

                    <table id="report_new_leads" name="report_new_leads" class="table table-striped table-hover" width="100%" style="font-size:12px;">
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
                                        $newleads = $count->salesNewAdminGroupFilter($grp['groups'], $days);
                                        $new_close = $count->salesCloseAdminGroupFilter($grp['groups'], $days);
                                        $new_pending = $count->salesPendingAdminGroupFilter($grp['groups'], $days);
                                        $contacted = $count->salesContactedAdminGroupFilter($grp['groups'], $days);
                                        $visit = $count->salesVisitAdminGroupFilter($grp['groups'], $days);
                                        $deal = $count->salesDealAdminGroupFilter($grp['groups'], $days);
                                        $reserve = $count->salesReserveAdminGroupFilter($grp['groups'], $days);
                                        $booking = $count->salesBookingAdminGroupFilter($grp['groups'], $days);
                                    } elseif ($grp['level'] == "admin_project") {
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
                                <tr class="" onclick="location.href='<?= base_url(); ?>user/<?= $row['id_user']; ?>'">
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
                                        <?= $new->getNumRows();
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




    <?php $this->endSection(); ?>