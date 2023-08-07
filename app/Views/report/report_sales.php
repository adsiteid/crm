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

        <div class="pb-4 pt-2 d-flex flex-row align-items-center justify-content-between">
            <div>
                <h6 class="mb-2 font-weight-bold text-primary">Report Sales</h6>
            </div>

            <div>
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                        <i class="mdi mdi-calendar"></i><?php ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="<?= base_url(); ?>getleads/90">Last 90 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>getleads/30">Last 30 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>getleads/7">Last 7 Days</a>
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
                            <?php foreach ($sales->getResultArray() as $row) : ?>

                                <?php

                                $new = $count->salesNew('sales', $row['id'])->getNumRows();
                                $new_close = $count->salesClose('sales', $row['id'])->getNumRows();
                                $new_pending = $count->salesPending('sales', $row['id'])->getNumRows();
                                $contacted = $count->salesContacted('sales', $row['id'])->getNumRows();
                                $visit = $count->salesVisit('sales', $row['id'])->getNumRows();
                                $deal = $count->salesDeal('sales', $row['id'])->getNumRows();
                                $reserve = $count->salesReserve('sales', $row['id'])->getNumRows();
                                $booking = $count->salesBooking('sales', $row['id'])->getNumRows();
                                // $all = $count->salesAll($row['username'])->getNumRows();
                                ?>


                                <!-- list-item -->
                                <tr class="" onclick="location.href='<?= base_url(); ?>user/<?= $row['id']; ?>'">
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <?php foreach ($user->detail($row['id'])->getResultArray() as $us) : ?>
                                            <?= $us['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                     test
                                    </td>
                                    <td>
                                        test
                                    </td>
                                    <td>
                                        test
                                    </td>

                                    <td>
                                        <?= $new; ?>
                                    </td>

                                    <td>
                                        <?= $contacted; ?>
                                    </td>

                                    <td>
                                        <?= $visit; ?>
                                    </td>

                                    <td>
                                        <?= $deal; ?>
                                    </td>

                                    <td>
                                        <?= $reserve; ?>
                                    </td>
                                    <td>
                                        <?= $booking; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $total = 0;
                                        foreach ($count->salesReserve('sales', $row['id'])->getResultArray() as $cb) :
                                            $total += $cb['reserve'];
                                        endforeach;
                                        echo $total;

                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        $total = 0;
                                        foreach ($count->salesBooking('sales', $row['id'])->getResultArray() as $cb) :
                                            $total += $cb['booking'];
                                        endforeach;
                                        echo $total;

                                        ?>
                                    </td>

                                    <!-- <td>
                                        <?php

                                        echo $new + $new_close + $new_pending + $contacted + $visit + $deal + $reserve + $booking;
                                        ?>
                                    </td> -->

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