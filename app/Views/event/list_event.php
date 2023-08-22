<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

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
        /* border-style: solid; */
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




<!-- search -->

<form action="search_result.php" method="get" class=" d-lg-none d-sm-none d-block  form-inline mr-auto ml-md-3 mb-4 mt-3  navbar-search">
    <div class="input-group ">
        <input type="text" class="form-control rounded-left  small bg-white" placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search">
        <div class="input-group-append">
            <button class="btn btn-primary border-none rounded-right px-3" type="submit">
                <i class="icon-search"></i>
            </button>
        </div>
    </div>
</form>

<!-- end of search -->


<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between  pb-3  ">
            <div class="col-5 p-0">

                <a href="<?= base_url(); ?>add_event" type="button" class=" btn btn-sm btn-primary shadow-sm mr-1 " style="font-size:12px;">Add Event </a>

            </div>
            <div class="d-flex p-0">

                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                        <i class="mdi mdi-calendar"></i><?= $days;  ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="<?= base_url(); ?>list_event/90">Last 90 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>list_event/30">Last 30 Days</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>list_event/7">Last 7 Days</a>
                        <a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Range</a>
                    </div>
                </div>
                <!-- <button type="button" class="btn btn-sm btn-light bg-white d-flex align-items-center rounded border" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-ellipsis-v text-primary " aria-hidden="true"></i>
                </button> -->
            </div>
        </div>

        <!-- flashdata -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="d-sm-table-cell d-none">
                            No
                        </th>
                        <th>
                            Event Name
                        </th>
                        <th class="">
                            Project
                        </th>
                        <th class="d-sm-table-cell d-none">
                            Address
                        </th>
                        <th class="">
                            Date Start
                        </th>
                        <th class="">
                            Date End
                        </th>

                    </tr>
                </thead>
                <tbody class="list-wrapper">
                    <?php $no = 1; ?>
                    <?php foreach ($event->getResultArray() as $row) : ?>
                        <tr class="list-item" onclick="location.href='<?= base_url(); ?>event/<?= $row['id']; ?>'">
                            <td class="d-sm-table-cell d-none">
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $row['event_name']; ?>
                            </td>

                            <td class="">
                                <?= $row['project']; ?>
                            </td>
                            <td class="d-sm-table-cell d-none">
                                <?= $row['city']; ?>
                            </td>
                            <td class="">
                                <?= $row['date_start']; ?>
                            </td>

                            <td class="">
                                <?= $row['date_end']; ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="pagination-container" class="my-4"></div>


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

<!-- DATEPICKER -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class=" form-inline navbar-search col-12" action="<?= base_url(); ?>range_event" method="post">
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







<script type="text/javascript">
    $('input[name="daterange"]').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            },
            startDate: <?= $now; ?>,
            endDate: <?= $now; ?>
        },
        function(start, end, label) {
            alert("A new date range was chosen: " + start.format('YYYY/MM/DD') + ' to ' + end.format('YYYY/MM/DD'));
        });
</script>







<!-- END OF DATEPICKER -->



<?php $this->endSection(); ?>