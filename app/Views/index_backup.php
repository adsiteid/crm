<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

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


<?php

function gantiformat($nomorhp)
{
    $nomorhp = trim($nomorhp);
    $nomorhp = strip_tags($nomorhp);
    $nomorhp = str_replace(" ", "", $nomorhp);
    $nomorhp = str_replace("(", "", $nomorhp);
    $nomorhp = str_replace(".", "", $nomorhp);
    $nomorhp = str_replace("-", "", $nomorhp);

    if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
        if (substr(trim($nomorhp), 0, 3) == '+62') {
            $nomorhp = trim($nomorhp);
        } elseif (substr($nomorhp, 0, 1) == '0') {
            $nomorhp = '+62' . substr($nomorhp, 1);
        }
    }
    return $nomorhp;
}
?>

<?php
$now = date('Y/m/d');
$in30 = date('Y/m/d', strtotime($now . ' - 30 days'));
?>



<!-- search -->

<form action="search_result.php" method="get" class=" d-lg-none d-sm-none d-block  form-inline mr-auto ml-md-3 mb-4 mt-3  navbar-search">
    <div class="input-group ">
        <input type="text" class="form-control bg-light  small bg-white" placeholder="Cari data leads ..." aria-label="Search" aria-describedby="basic-addon2" name="search">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- end of search -->


<div id="carouselExampleControls" class="carousel slide mb-3 d-lg-none d-block" data-ride="carousel">
    <div class="carousel-inner ">

        <?php
        foreach ($event as $row);
        $date_start = date('d', strtotime($row['date_start']));
        $date_end = date('d', strtotime($row['date_end']));
        $mo_ye = date('M Y', strtotime($row['date_start']));
        ?>

        <div type="button" class="carousel-item active p-1" onclick="location.href='cms_edit_event.php?id='">
            <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                <div class="row d-flex align-items-center">
                    <div class="col-3 p-0"> <img src="<?= base_url() ?>/document/image/event/<?php if (isset($row['image']) && $row['image'] == 'upload.jpg') {
                                                                                                    echo $row['image'];
                                                                                                } else {
                                                                                                    echo str_replace(' ', '', $row['project']) . '/' . $row['image'];
                                                                                                }

                                                                                                ?>" alt="" class="col"> </div>
                    <div class="col-6 text-white border-right p-0">
                        <p class="mb-1" style="font-size:12px;"><?= $row['event_name']; ?></p>
                        <h6 class="text-white mb-0" style="font-size:12px;"><?= $row['project']; ?></h6>
                    </div>
                    <div class="col-3 text-white">
                        <div class="mb-0 p-0" style="font-size:17px; font-weight:600;"><?= $date_start; ?>-<?= $date_end; ?></div>
                        <div class="m-0 p-0" style="font-size:11px;"><?= $mo_ye; ?></div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        foreach ($event as $row) :
        ?>
            <div type="button" class="carousel-item p-1" onclick="location.href='cms_edit_event.php?id=<?php //echo $row['id']; 
                                                                                                        ?>'">
                <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                    <div class="row d-flex align-items-center">
                        <div class="col-3 p-0"> <img src="<?= base_url() ?>/document/image/event/<?php if (isset($row['image']) && $row['image'] == 'upload.jpg') {
                                                                                                        echo $row['image'];
                                                                                                    } else {
                                                                                                        echo str_replace(' ', '', $row['project']) . '/' . $row['image'];
                                                                                                    }

                                                                                                    ?>" alt="" class="col"> </div>
                        <div class="col-6 text-white border-right p-0">
                            <p class="mb-1" style="font-size:12px;"><?= $row['event_name']; ?></p>
                            <h6 class="text-white mb-0" style="font-size:12px;"><?= $row['project']; ?></h6>
                        </div>
                        <div class="col-3 text-white">
                            <div class="mb-0 p-0" style="font-size:17px; font-weight:600;"><?= $date_start; ?>-<?= $date_end; ?></div>
                            <div class="m-0 p-0" style="font-size:11px;"><?= $mo_ye; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <!--
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
        -->

</div>

<div class="d-flex align-items-center justify-content-between mb-lg-1 pb-2  ">
    <div class="col-5 p-0">
        <h6 class="mb-0" style="font-size: small;">Dashboard</h6>
    </div>

    <div class="d-flex p-0">
        <div class="row d-flex justify-content-end text-end align-items-center mr-0">
            <p class="mb-0 pb-0 d-lg-block d-none" style="font-size: 10px; color:green;">Periode</p>
            <span style="font-size: 10px;"><?= $in30 . ' - ' . $now; ?></span>
        </div>

        <btn type="button" class="btn btn-sm btn-light bg-white px-0 pt-2 d-flex align-items-center rounded border" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-ellipsis-v text-primary " aria-hidden="true"></i>
        </btn>
    </div>
</div>

<div class="row align-items-center px-lg px-2 mb-lg-0 mb-3">

    <div class="col-6 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1  ">
        <a href="/leads/new">

            <div class="d-flex bg-white rounded align-items-center justify-content-start pt-lg-3 pt-4 p-3 ">

                <div class="row d-flex align-items-center ml-lg ml-1">
                    <div class="stats-icon purple col purple" style="width : 40px; height:40px">
                        <i class="iconly-boldUser"></i>
                    </div>
                </div>

                <div class="ml-4 align-items-center">
                    <h6 class="text-muted font-semibold " style="font-size:10px;">New</h6>
                    <h6 class="font-extrabold mr-lg" style="font-size:12px;"><?= $new->getNumRows(); ?></h6>
                </div>
            </div>

        </a>
    </div>


    <div class="col-6 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1">
        <a href="/leads/close">

            <div class="d-flex bg-white rounded align-items-center justify-content-start pt-lg-3 pt-4 p-3 ">

                <div class="row d-flex align-items-center ml-lg ml-1">
                    <div class="stats-icon purple col" style="background-color:gray; width : 40px; height:40px">
                        <i class="iconly-boldPaper"></i>
                    </div>

                </div>

                <div class="ml-4 align-items-center">
                    <h6 class="text-muted font-semibold " style="font-size:10px;">Close</h6>
                    <h6 class="font-extrabold mr-lg" style="font-size:14px;"><?= $close->getNumRows(); ?></h6>
                </div>
            </div>

        </a>
    </div>


    <div class="col-6 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1">
        <a href="/leads/pending">

            <div class="d-flex bg-white rounded align-items-center justify-content-start pt-lg-3 pt-4 p-3 ">

                <div class="row d-flex align-items-center ml-lg ml-1">
                    <div class="stats-icon purple col" style="background-color:#513922; width : 40px; height:40px">
                        <i class="iconly-boldTime-Circle"></i>
                    </div>
                </div>

                <div class="ml-4 align-items-center">
                    <h6 class="text-muted font-semibold" style="font-size:10px;">Pending</h6>
                    <h6 class="font-extrabold mr-lg" style="font-size:14px;"><?= $pending->getNumRows(); ?></h6>
                </div>
            </div>

        </a>
    </div>



    <div class="col-6 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1">
        <a href="/leads/contacted">

            <div class="d-flex bg-white rounded align-items-center justify-content-start pt-lg-3 pt-4 p-3 ">

                <div class="row d-flex align-items-center ml-lg ml-1">
                    <div class="stats-icon purple col blue" style="width : 40px; height:40px">
                        <i class="iconly-boldChat"></i>
                    </div>
                </div>

                <div class="ml-4 align-items-center">
                    <h6 class="text-muted font-semibold " style="font-size:10px;">Contacted</h6>
                    <h6 class="font-extrabold mr-lg" style="font-size:14px;"><?= $contacted->getNumRows(); ?></h6>
                </div>
            </div>

        </a>
    </div>


    <div class="col-6 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1">
        <a href="/leads/visit">

            <div class="d-flex bg-white rounded align-items-center justify-content-start pt-lg-3 pt-4 p-3 ">

                <div class="row d-flex align-items-center ml-lg ml-1">
                    <div class="stats-icon purple col green" style="width : 40px; height:40px">
                        <i class="iconly-boldCalendar"></i>
                    </div>
                </div>

                <div class="ml-4 align-items-center">
                    <h6 class="text-muted font-semibold" style="font-size:10px;">Visit</h6>
                    <h6 class="font-extrabold mr-lg" style="font-size:14px;"><?= $visit->getNumRows(); ?></h6>
                </div>
            </div>

        </a>
    </div>


    <div class="col-6 col-lg-2 col-md-6 mb-lg-4 mb-1 p-1">
        <a href="/leads/deal">

            <div class="d-flex bg-white rounded align-items-center pt-lg-3 pt-4 p-3 ">

                <div class="row d-flex align-items-center ml-lg ml-1">
                    <div class="stats-icon purple col red" style="width : 40px; height:40px">
                        <i class="iconly-boldBookmark"></i>
                    </div>
                </div>

                <div class="ml-4 align-items-center">
                    <h6 class="text-muted font-semibold" style="font-size:10px;">Deal</h6>
                    <h6 class="font-extrabold mr-lg" style="font-size:14px;"><?= $deal->getNumRows(); ?></h6>
                </div>
            </div>

        </a>
    </div>
</div>


<!-- Content Row -->


<div class="row">

    <div class="col-lg-9 col-12">


        <!-- <button type="button" class="btn bg-white rounded  w-100 mb-1  ">
            <div class="row py-2 d-flex align-items-center justify-content-between  ">

                <div class=" col text-start ">
                    <h6 style="color:#1F3960; font-size:14px;">Recent New</h6>
                </div>

                <div class=" col text-end ">
                    <a href="" type="button" class="btn btn-sm btn-primary">Detail</a>
                </div>

            </div>
        </button> -->

        <button type="button" class="btn bg-white rounded d-lg-block d-none w-100 mb-1 py-0 ">

            <div class="row pt-3 pb-2 d-flex align-items-center pr-0  ">

                <div class=" col-1 d-flex justify-content-center">
                    <h6 style="color:#1F3960; font-size:12px;">No</h6>
                </div>

                <div class=" col-lg-2 col-12 text-start d-lg-block d-none">
                    <h6 style="color:#1F3960; font-size:12px;">Name</h6>
                </div>

                <div class="col-lg-4 col-12 row  d-flex align-items-center">
                    <div class="col d-lg-block d-none">
                        <div class="d-flex justify-content-lg-start justify-content-end">
                            <h6 style="color:#1F3960; font-size:12px;">Category</h6>
                        </div>
                    </div>

                    <div class="col d-flex justify-content-start">
                        <h6 style="color:#1F3960; font-size:12px;">Date in</h6>
                    </div>
                </div>

                <div class=" col-lg-2 col-12 d-flex justify-content-start d-lg-none d-block">
                    <h6 style="color:#1F3960; font-size:12px;">Name</h6>
                </div>



                <div class=" col-lg-4 col-12 row d-flex justify-content-start">

                    <div class=" col-lg col-7 d-flex justify-content-start ">
                        <h6 style="color:#1F3960; font-size:12px;">Project</h6>
                    </div>

                    <div class="col-lg col-5 d-flex justify-content-start">
                        <h6 style="color:#1F3960; font-size:12px;">Source</h6>
                    </div>

                </div>



                <div class="col-1 d-flex justify-content-start  ">
                    <h6 style="color:#1F3960; font-size:12px;">Whatsapp</h6>
                </div>


            </div>


        </button>
        <?php $no = 1; ?>

        <?php

        foreach ($new->getResultArray() as $row) :

        ?>

            <div class="list-wrapper">
                <button type="button" class="btn bg-white rounded w-100 mb-1 py-0 list-item " onclick="location.href='leads/<?= $row['id']; ?>'">

                    <div class="row py-lg-2 py-3 d-flex align-items-center pr-0  ">


                        <div class=" col-1 d-flex justify-content-center">
                            <div style="font-size:12px;" class="d-lg-block d-none "> <?= $no++; ?></div>
                        </div>

                        <div class=" col-lg-2 col-12  text-left d-lg-block d-none">
                            <div class="nama-leads my-1 ml-0" style="font-size:12px;"><?php echo $row['nama_leads']; ?></div>
                        </div>

                        <div class="col-lg-4 col-12 row  d-flex align-items-center pl-lg pr-0">
                            <div class="col d-lg-block d-none">
                                <div class="d-flex justify-content-lg-start justify-content-end">
                                    <div class="<?php echo $row['kategori_status']; ?>"><?php echo $row['kategori_status']; ?></div>
                                </div>
                            </div>

                            <div style="font-size:12px;" class="col d-flex justify-content-start text-left">
                                <?php
                                $row['time_stamp_new'];
                                $dt_cnv_tmstp = date('d/m/Y', strtotime($row['time_stamp_new']));
                                echo $dt_cnv_tmstp;
                                ?>
                            </div>

                            <div class="col d-lg-none d-block p-0 ">
                                <div class="d-flex justify-content-lg-start justify-content-end">
                                    <div class="<?php echo $row['kategori_status']; ?>"><?php echo $row['kategori_status']; ?></div>
                                </div>
                            </div>


                        </div>

                        <div class=" col-lg-2 col-12 d-flex justify-content-start text-left d-lg-none d-block">
                            <div class="nama-leads my-1 ml-0" style="font-size:12px;"><?php echo $row['nama_leads']; ?></div>
                        </div>



                        <?php
                        $hp = $row['nomor_kontak'];
                        $nomor = gantiformat($hp);
                        ?>


                        <div class=" col-lg-4 col-12 row d-flex justify-content-start">

                            <div class=" col-lg col-7 d-flex justify-content-start text-left ">
                                <div style="font-size:12px;"><?php echo $row['project']; ?></div>
                            </div>

                            <div class="col-lg col-5 d-flex justify-content-start align-items-center text-left">
                                <div style="font-size:12px;" class="d-lg-block d-none"><?php echo $row['sumber_leads']; ?>
                                </div>
                            </div>

                        </div>



                        <div class="col-1 d-flex justify-content-start">
                            <a href="https://wa.me/<?php echo $nomor; ?>" class="btn btn-success border-0 d-lg-block d-none" style="font-size:8pt; background:#198754;">Whatsapp</a>
                        </div>


                    </div>


                </button>

            </div>



        <?php endforeach; ?>


        <div id="pagination-container" class="my-4"></div>

    </div>

    <div class="col-lg-3 col-12">



        <!-- carousel desktop Event -->

        <div id="carouselExampleControls" class="carousel slide mb-3 d-lg-block d-none" data-ride="carousel">
            <div class="carousel-inner ">

                <?php
                foreach ($event as $row);
                ?>

                <div type="button" class="carousel-item active p-1" onclick="location.href='cms_edit_event.php?id=<?php //echo $row['id']; 
                                                                                                                    ?>'">
                    <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                        <div class="row d-flex align-items-center">
                            <div class="col-3 p-0"> <img src="<?= base_url() ?>/document/image/event/<?php if (isset($row['image']) && $row['image'] == 'upload.jpg') {
                                                                                                            echo $row['image'];
                                                                                                        } else {
                                                                                                            echo str_replace(' ', '', $row['project']) . '/' . $row['image'];
                                                                                                        }

                                                                                                        ?>" alt="" class="col"> </div>
                            <div class="col-6 text-white border-right p-0">
                                <p class="mb-1" style="font-size:12px;"><?= $row['event_name'];
                                                                        ?></p>
                                <h6 class="text-white mb-0" style="font-size:12px;"><?= $row['project'];
                                                                                    ?></h6>
                            </div>
                            <div class="col-3 text-white">
                                <div class="mb-0 p-0" style="font-size:14px; font-weight:600;"><?= $date_start; ?>-<?= $date_end; ?></div>
                                <div class="m-0 p-0" style="font-size:9px;"><?= $mo_ye; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                foreach ($event as $row) :
                ?>
                    <div type="button" class="carousel-item p-1" onclick="location.href='cms_edit_event.php?id=<?php //echo $row['id']; 
                                                                                                                ?>'">
                        <div class="col-12 rounded h-50 px-3 py-3" style="background : #6290D4;">
                            <div class="row d-flex align-items-center">
                                <div class="col-3 p-0"> <img src="<?= base_url() ?>/document/image/event/<?php if (isset($row['image']) && $row['image'] == 'upload.jpg') {
                                                                                                                echo $row['image'];
                                                                                                            } else {
                                                                                                                echo str_replace(' ', '', $row['project']) . '/' . $row['image'];
                                                                                                            }

                                                                                                            ?>" alt="" class="col"> </div>
                                <div class="col-6 text-white border-right p-0">
                                    <p class="mb-1" style="font-size:12px;"><?= $row['event_name']; ?></p>
                                    <h6 class="text-white mb-0" style="font-size:12px;"><?= $row['project']; ?></h6>
                                </div>
                                <div class="col-3 text-white">
                                    <div class="mb-0 p-0" style="font-size:14px; font-weight:600;"><?= $date_start; ?>-<?= $date_end; ?></div>
                                    <div class="m-0 p-0" style="font-size:9px;"><?= $mo_ye ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                ?>

            </div>
            <!--
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
        -->

        </div>

        <!-- End of carousel desktop Event -->


        <div class="card mb-4 ">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div>
                    <h6 class="mb-2" style="font-size:10pt;">Recent Deals</h6>
                </div>
                <a href="deal.php" class="btn btn-sm btn-primary shadow-sm"> Detail</a>
            </div>
            <div class="card-body my-lg-1 mt-3">

            </div>
        </div>


    </div>

</div>

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> -->

<div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="z-index:9999999999;">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Staging</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">New</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Invalid</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Contacted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Visit</a>
            </li>

        </ul>
    </div>
</div>

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
        <form class=" form-inline navbar-search col-12" action="search_result.php" method="get">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="input-group input-group-sm rounded w-100">
                        <input type="text" class="form-control bg-white  small px-3 text-muted" placeholder="Search Leads ..." aria-label="Search" aria-describedby="basic-addon2" name="daterange" value="01/01/2015 - 01/31/2015">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search  fa-sm"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" type="submit">Filter</button> -->
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