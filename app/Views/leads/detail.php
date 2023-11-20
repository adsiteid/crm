<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<style>
    .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    @media screen and (min-width: 450px) {
        .history {
            height: 180px;
            overflow: auto;
        }

    }

    @media screen and (max-width: 450px) {
        .history {
            height: 300px;
            overflow: auto;
        }

    }

    /* ::-webkit-scrollbar {
        width: 5px;
    }
    ::-webkit-scrollbar-track {
        background: #fff;
    }
    ::-webkit-scrollbar-thumb {
        background: #e1d3d5;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #e1d3d5;
    } */
</style>



</button>

<div>







    <?php foreach ($leads->getResultArray() as $row); ?>



    <form action="<?= base_url('/update_leads/' . $row['id']) ?>" method="post">
        <?= csrf_field(); ?>


        <?php

        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $date = $dt->format('Y-m-d H:i:s');
        // $time = $dt->format('H:i:s');

        ?>


        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <?php if ($row['time_stamp_invalid'] == NULL) : ?>

            <input type="hidden" name="time_stamp_invalid" value="<?= $date; ?>">

        <?php endif; ?>

        <?php if ($row['time_stamp_invalid'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_invalid" value="<?= $row['time_stamp_invalid']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_close'] == NULL) : ?>

            <input type="hidden" name="time_stamp_close" value="<?= $date; ?>">


        <?php endif; ?>

        <?php if ($row['time_stamp_close'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_close" value="<?= $row['time_stamp_close']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_pending'] == NULL) : ?>

            <input type="hidden" name="time_stamp_pending" value="<?= $date; ?>">


        <?php endif; ?>

        <?php if ($row['time_stamp_pending'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_pending" value="<?= $row['time_stamp_pending']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_contacted'] == NULL) : ?>

            <input type="hidden" name="time_stamp_contacted" value="<?= $date; ?>">


        <?php endif; ?>

        <?php if ($row['time_stamp_contacted'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_contacted" value="<?= $row['time_stamp_contacted']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_visit'] == NULL) : ?>

            <input type="hidden" name="time_stamp_visit" value="<?= $date; ?>">


        <?php endif; ?>

        <?php if ($row['time_stamp_visit'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_visit" value="<?= $row['time_stamp_visit']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_deal'] == NULL) : ?>

            <input type="hidden" name="time_stamp_deal" value="<?= $date; ?>">


        <?php endif; ?>

        <?php if ($row['time_stamp_deal'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_deal" value="<?= $row['time_stamp_deal']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_reserve'] == NULL) : ?>

            <input type="hidden" name="time_stamp_reserve" value="<?= $date; ?>">


        <?php endif; ?>

        <?php if ($row['time_stamp_reserve'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_reserve" value="<?= $row['time_stamp_reserve']; ?>">


        <?php endif; ?>


        <?php if ($row['time_stamp_booking'] == NULL) : ?>

            <input type="hidden" name="time_stamp_booking" value="<?= $date; ?>">

        <?php endif; ?>

        <?php if ($row['time_stamp_booking'] !== NULL) : ?>

            <input type="hidden" name="time_stamp_booking" value="<?= $row['time_stamp_booking']; ?>">

        <?php endif; ?>

        <input type="hidden" name="general_manager" value="<?= $row['general_manager']; ?>">
        <input type="hidden" name="manager" value="<?= $row['manager']; ?>">

        <?php

        function gantiformat($nomorhp)
        {
            //Terlebih dahulu kita trim dl
            $nomorhp = trim($nomorhp);
            //bersihkan dari karakter yang tidak perlu
            $nomorhp = strip_tags($nomorhp);
            // Berishkan dari spasi
            $nomorhp = str_replace(" ", "", $nomorhp);
            // bersihkan dari bentuk seperti  (022) 66677788
            $nomorhp = str_replace("(", "", $nomorhp);
            // bersihkan dari format yang ada titik seperti 0811.222.333.4
            $nomorhp = str_replace(".", "", $nomorhp);
            $nomorhp = str_replace("-", "", $nomorhp);

            //cek apakah mengandung karakter + dan 0-9
            if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
                // cek apakah no hp karakter 1-3 adalah +62
                if (substr(trim($nomorhp), 0, 3) == '+62') {
                    $nomorhp = trim($nomorhp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif (substr($nomorhp, 0, 1) == '0') {
                    $nomorhp = '+62' . substr($nomorhp, 1);
                }
            }
            return $nomorhp;
        }
        foreach ($leads->getResultArray() as $row1) :
            $hp = $row1['nomor_kontak'];
            $nomor = gantiformat($hp);
        endforeach;

        ?>



        <div class="row">

            <div class="col-lg-4 col-12 mb-3 align-items-stretch">
                <div class="card p-3 w-100">


                    <div class="col-12 ">
                        <div class="row d-flex justify-content-between">
                            <div class="col d-flex align-items-center mt-2">
                                <div class="col-2 p-0">
                                    <div class=" rounded-circle bg-secondary text-white  d-flex justify-content-center align-items-center mr-2" style="width:35px; height:35px;">
                                        <?php
                                        $user = $row['nama_leads'];
                                        echo $user[0];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-10 pl-lg-0 pl-2">
                                    <h6 class="mb-0 "><?= $row['nama_leads']; ?></h6>
                                    <input type="hidden" name="nama_leads" value="<?= $row['nama_leads']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 my-1">
                        <hr style="border: 1px;">
                    </div>

                    <div class="col-12">

                        <div class=" mb-3"> <!-- col-2 data leads -->

                            <?php
                            $result_timestamp = $row['time_stamp_new'];
                            $dt_cnv_tmstp = date('d M Y - H:i:s', strtotime($result_timestamp));
                            ?>
                            <p style="font-size:12px;" class="mb-1">Date in</p>
                            <h6 style="font-size:12px;" class="mb-3"><?= $dt_cnv_tmstp; ?></h6>
                            <p style="font-size:12px;" class="mb-1">Remaining Time</p>
                            <h6 style="font-size:12px;" class="mb-3 time-rolling" data-status="<?= $row['kategori_status'] ?>" data-lasttime="<?= $row['rolling_lasttime']; ?>" data-interval="<?= $row['rolling_interval'] ?>" data-leads="<?= $row['rolling_leads'] ?>">-</h6>
                            <p style="font-size:12px;" class="mb-1">Address</p>
                            <h6 style="font-size:12px;" class="mb-3"><?php echo $row['alamat']; ?></h6> <input type="hidden" name="alamat" value="<?= $row['alamat']; ?>">
                            <p style="font-size:12px;" class="mb-1">Phone Number</p>
                            <h6 style="font-size:12px;" class="mb-3"><?php echo $row['nomor_kontak']; ?></h6> <input type="hidden" name="nomor_kontak" value="<?= $row['nomor_kontak']; ?>">
                            <p style="font-size:12px;" class="mb-1">Email</p>
                            <h6 style="font-size:12px;" class="mb-3"><?= $row['email']; ?></h6> <input type="hidden" name="email" value="<?= $row['email']; ?>">
                            <p style="font-size:12px;" class="mb-1">Leads Source</p>
                            <h6 style="font-size:12px; " class="mb-3"><?php echo $row['sumber_leads']; ?></h6>
                            <p style="font-size:12px;" class="mb-1">Group</p>
                            <h6 style="font-size:12px;" class="mb-3"> <?php foreach ($group->detail($row['groups'])->getResultArray() as $grp) : ?>
                                    <?= $grp['group_name']; ?>
                                <?php endforeach; ?></h6> <input type="hidden" name="groups" value="<?= $row['groups']; ?>">
                            <p style="font-size:12px;" class="mb-1">Project</p>
                            <h6 style="font-size:12px;" class="mb-3"> <?php foreach ($project->detail($row['project'])->getResultarray() as $prj) {
                                                                            echo $prj['project'];
                                                                        } ?></h6> <input type="hidden" name="project" value="<?= $row['project']; ?>">

                            <p style="font-size:12px;" class="mb-1">General Manager</p>
                            <h6 style="font-size:12px; " class="mb-3"><?php
                                                                        $gm = $row['general_manager'];
                                                                        foreach ($users->detail($gm)->getResultArray() as $user) :
                                                                            echo $user['fullname'];
                                                                        endforeach;
                                                                        ?></h6>

                            <p style="font-size:12px;" class="mb-1">Manager</p>
                            <h6 style="font-size:12px; " class="mb-3"><?php
                                                                        $manager = $row['manager'];
                                                                        foreach ($users->detail($manager)->getResultArray() as $user) :
                                                                            echo $user['fullname'];
                                                                        endforeach;
                                                                        ?></h6>
                            <p style="font-size:12px;" class="mb-1">Sales</p>
                            <h6 style="font-size:12px; " class="mb-3"><?php
                                                                        $sales = $row['sales'];
                                                                        foreach ($users->detail($sales)->getResultArray() as $user) :
                                                                            echo $user['fullname'];
                                                                        endforeach;
                                                                        ?></h6>

                            <input type="hidden" name="sumber_leads" value="<?= $row['sumber_leads']; ?>">

                        </div>

                        <div class="col-12 mt-4 mx-0 p-0">
                            <hr style="border: 1px;">
                        </div>

                        <div class=" d-flex  mb-3 mt-5 ">
                            <div class=" col-6 pr-1 p-0">
                                <a href="https://wa.me/<?php echo $nomor; ?>" class="btn btn-success border-0 rounded-3 whatsapp-telpon w-100">Whatsapp</a>
                            </div>
                            <div class="col-6 p-0">
                                <a href="tel:<?php echo $nomor; ?>" class="btn btn-success border-0 whatsapp-telpon rounded-3 w-100">Telpon</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class=" col-lg-8 col-12">
                <div class="card p-4 mb-lg-3 mb-4">
                    <div class="row d-flex  ">

                        <div class="col-8 d-flex justify-content-start">
                            <div>
                                <p style="font-size:12px;" class="mb-0">Last update </p>
                                <h6 style="font-size:12px;"><?php

                                                            if ($row['time_stamp_booking'] !== NULL) {
                                                                $booking_date = $row['time_stamp_booking'];
                                                                $booking_date_convert = date('d M Y - H:i:s', strtotime($booking_date));
                                                                echo $booking_date_convert;
                                                            } elseif ($row['time_stamp_reserve'] !== NULL) {
                                                                $reserve_date = $row['time_stamp_reserve'];
                                                                $reserve_date_convert = date('d M Y - H:i:s', strtotime($reserve_date));
                                                                echo $reserve_date_convert;
                                                            } elseif ($row['time_stamp_deal'] !== NULL) {
                                                                $deal_date = $row['time_stamp_deal'];
                                                                $deal_date_convert = date('d M Y - H:i:s', strtotime($deal_date));
                                                                echo $deal_date_convert;
                                                            } elseif ($row['time_stamp_visit'] !== NULL) {
                                                                $visit_date = $row['time_stamp_visit'];
                                                                $visit_date_convert = date('d M Y - H:i:s', strtotime($visit_date));
                                                                echo $visit_date_convert;
                                                            } elseif ($row['time_stamp_pending'] !== NULL) {
                                                                $pending_date = $row['time_stamp_pending'];
                                                                $pending_date_convert = date('d M Y - H:i:s', strtotime($pending_date));
                                                                echo $pending_date_convert;
                                                            } elseif ($row['time_stamp_contacted'] !== NULL) {
                                                                $contacted_date = $row['time_stamp_contacted'];
                                                                $contacted_date_convert = date('d M Y - H:i:s', strtotime($contacted_date));
                                                                echo $contacted_date_convert;
                                                            } elseif ($row['time_stamp_close'] !== NULL) {
                                                                $close_date = $row['time_stamp_close'];
                                                                $close_date_convert = date('d M Y - H:i:s', strtotime($close_date));
                                                                echo $close_date_convert;
                                                            } elseif ($row['time_stamp_invalid'] !== NULL) {
                                                                $invalid_date = $row['time_stamp_invalid'];
                                                                $invalid_date_convert = date('d M Y - H:i:s', strtotime($invalid_date));
                                                                echo $invalid_date_convert;
                                                            } else {
                                                                $new_date = $row['time_stamp_new'];
                                                                $new_date_convert = date('d M Y - H:i:s', strtotime($new_date));
                                                                echo $new_date_convert;
                                                            }
                                                            ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="d-flex justify-content-end">
                                <label class="badge badge-<?php

                                                            if ($row['kategori_status'] == 'New') {
                                                                echo 'success';
                                                            } elseif ($row['kategori_status'] == 'Cold') {
                                                                echo 'info';
                                                            } elseif ($row['kategori_status'] == 'Warm') {
                                                                echo 'warning';
                                                            } elseif ($row['kategori_status'] == 'Hot') {
                                                                echo 'danger';
                                                            } elseif ($row['kategori_status'] == 'Pending') {
                                                                echo 'secondary';
                                                            } elseif ($row['kategori_status'] == 'Invalid') {
                                                                echo 'secondary';
                                                            } elseif ($row['kategori_status'] == 'Close') {
                                                                echo 'secondary';
                                                            } elseif ($row['kategori_status'] == 'Reserve') {
                                                                echo 'reserve';
                                                            } elseif ($row['kategori_status'] == 'Booking') {
                                                                echo 'booking';
                                                            }

                                                            ?>"><?= $row['kategori_status']; ?></label>
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <hr style="border: 1px;">
                    </div>



                    <div class="row">


                        <div class="col-lg-6 col-12 ">


                            <div>
                                <p style="font-size:12px;" class="mb-2">Status <span style="color:red">* </span> </p>
                                <select class="form-select form-select form-control form-control-sm border-secondary mb-3 <?php if (session('errors.update_status')) : ?>is-invalid<?php endif ?>" aria-label=".form-select-sm example" name="update_status" style="font-size:12px;">
                                    <option value="<?= ($row['update_status'] == "New") ? '' : $row['update_status']; ?>" <?= ($row['update_status'] == "New") ? 'class="d-none"' : ''; ?>><?= ($row['update_status'] == "New") ? 'New' : $row['update_status']; ?></option>

                                    <option value="Pending" <?= ($row['update_status'] == 'Pending') ? 'class="d-none"' : ''; ?> <?= ($row['update_status'] == "Contacted" || $row['update_status'] == "Visit" || $row['update_status'] == "Deal") ? 'class="d-none"' : ''; ?>>Pending</option>
                                    <option value="Close" <?= ($row['update_status'] == 'Close' || $row['update_status'] == 'Contacted' || $row['update_status'] == 'Visit' || $row['update_status'] == 'Deal') ? 'class="d-none"' : ''; ?>>Close</option>
                                    <option value="Contacted" <?= ($row['update_status'] == 'Contacted' || $row['update_status'] == 'Visit' || $row['update_status'] == 'Deal') ? 'class="d-none"' : ''; ?>>Contacted</option>
                                    <option value="Visit" <?= ($row['update_status'] == "New" || $row['update_status'] == "Invalid" || $row['update_status'] == "Close" || $row['update_status'] == "Pending" || $row['update_status'] == 'Visit' || $row['update_status'] == 'Deal') ? 'class="d-none"' : ''; ?>>Visit</option>
                                    <option value="Deal" <?= ($row['update_status'] == "New" || $row['update_status'] == "Invalid" || $row['update_status'] == "Close" || $row['update_status'] == "Pending"  || $row['update_status'] == 'Deal') ? 'class="d-none"' : ''; ?>>Deal</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= (session('errors.update_status')); ?>
                                </div>

                            </div>

                            <p style="font-size:12px;" class="mb-2">Category <span style="color:red">* </span> </p>

                            <select class="form-select form-control form-control-sm mb-3 border-secondary <?php if (session('errors.kategori_status')) : ?>is-invalid<?php endif ?>" style="font-size:12px;" aria-label=".form-select-sm example" name="kategori_status">
                                <option value="<?= ($row['update_status'] == "New") ? '' : $row['kategori_status']; ?>" <?= ($row['update_status'] == "New") ? 'class="d-none"' : ''; ?>><?= ($row['update_status'] == "New") ? 'New' : $row['kategori_status']; ?></option>
                                <option value="Cold" <?= ($row['kategori_status'] == 'Cold' || $row['update_status'] == 'Contacted' || $row['update_status'] == 'Visit' || $row['update_status'] == 'Deal') ? 'class="d-none"' : ''; ?>>Cold</option>
                                <option value="Warm" <?= ($row['kategori_status'] == 'Warm') ? 'class="d-none"' : ''; ?>>Warm</option>
                                <option value="Hot" <?= ($row['kategori_status'] == 'Hot') ? 'class="d-none"' : ''; ?>>Hot</option>
                                <option value="Reserve" <?= ($row['update_status'] == 'Deal') ? '' : 'class="d-none"'; ?>>Reserve</option>
                                <option value="Booking" <?= ($row['update_status'] == 'Deal') ? '' : 'class="d-none"'; ?>>Booking</option>
                            </select>

                            <div class="invalid-feedback">
                                <?= (session('errors.kategori_status')); ?>
                            </div>

                        </div>

                        <div class="col-lg-6 col-12">


                            <p style="font-size:12px;" class="mb-2"> Feedback / Notes <span style="color:red">* </span> </p>
                            <select class="form-select form-control form-control-sm border-secondary mb-3" aria-label=".form-select-sm example" name="catatan" style="font-size:12px;">
                                <option value="<?= ($row['update_status'] == "New") ? '' : $row['catatan']; ?>"><?= ($row['update_status'] == "New" || $row['catatan'] == "") ? 'Select Feedback' : $row['catatan']; ?></option>
                                <option value="Tidak bisa dihubungi">Tidak bisa dihubungi</option>
                                <option value="Nomor tidak ada di Whatsapp">Nomor tidak ada di Whatsapp</option>
                                <option value="Tidak respon">Tidak respon</option>
                                <option value="Proses Follow Up">Proses Follow Up</option>
                                <option value="Tidak berminat">Tidak berminat</option>
                                <option value="Sangat berminat">Sangat berminat</option>
                                <option value="Sudah pilih property lain">Sudah pilih property lain</option>
                                <option value="Proses BI checking">Proses BI checking</option>
                                <option value="Tidak lolos BI checking">Tidak lolos BI checking</option>
                                <option value="Lolos BI checking">Lolos BI checking</option>
                                <option value="Rumah tidak sesuai">Rumah tidak sesuai</option>
                                <option value="Request full furnished">Request full furnished</option>
                                <option value="Cari rumah full furnished">Cari rumah full furnished</option>
                                <option value="Sedang didiskusikan">Sedang didiskusikan</option>
                                <option value="Transaksi selesai">Transaksi selesai</option>
                            </select>


                            <div class="pindah-tugas">
                                <p style="font-size:12px; " class="mb-2"> Sales </p>
                                <select class="form-select form-control form-control-sm border-secondary" aria-label=".form-select-sm example" name="sales" style="font-size:12px;">

                                    <option selected value="<?= $row['sales']; ?>"> <?php
                                                                                    $sales = $row['sales'];
                                                                                    foreach ($users->detail($sales)->getResultArray() as $user) :
                                                                                        echo $user['fullname'];
                                                                                    endforeach;
                                                                                    ?>
                                    </option>

                                    <?php if ($level == "admin_group" || $level == "manager" || $level == "management") : ?>

                                        <?php foreach ($groupsales->group_manager($row['groups'], $row['manager'])->getResultArray() as $data) : ?>

                                            <option value="<?= $data['id_user']; ?>"> <?php
                                                                                        $sales = $data['id_user'];
                                                                                        foreach ($users->detail($sales)->getResultArray() as $user) :
                                                                                            echo $user['fullname'];
                                                                                        endforeach;
                                                                                        ?>
                                            </option>

                                        <?php endforeach; ?>

                                    <?php endif; ?>



                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between mt-3">

                        <div class="col-lg-6 col-sm-12 catatan align-items-end px-0 ">

                            <div class="col-12 ">
                                <p class="mb-2 text-primary" style="font-size:12px;">Reserve Amount</span> </p>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text border-secondary">Rp</span>
                                    <input type="number" class="form-control border-secondary" name="reserve" value="<?php echo $row['reserve']; ?>" <?= ($row['update_status'] == 'Deal') ? '' : 'disabled'; ?>>
                                </div>
                            </div>

                            <div class="col-12">
                                <p class="mb-2 text-primary" style="font-size:12px;">Booking Amount</span> </p>
                                <div class="input-group input-group-sm mb-lg-3 mb-2">
                                    <span class="input-group-text border-secondary">Rp</span>
                                    <input type="number" class="form-control border-secondary " name="booking" value="<?php echo $row['booking']; ?>" <?= ($row['update_status'] == 'Deal') ? '' : 'disabled'; ?>>
                                </div>
                            </div>
                            <div class="col-12 mb-lg-0 mb-4"><span style="font-size: x-small;">Reserve & Booking hanya diinput dengan status Deal</span><span style="color:red; font-size: x-small;"> *</span></div>
                        </div>

                        <div class="col-lg-6 col-12 ">
                            <label for="catatan" class="form-label mt-0 ">
                                <p class="mb-1 text-primary" style="font-size:12px;">Notes </span> </p>
                            </label>
                            <textarea type="text" class="form-control border-secondary" rows="7" name="catatan_admin" style="font-size:12px;"><?php echo $row['catatan_admin']; ?></textarea>
                        </div>
                    </div>
                </div>


                <div class="card col-12 p-4 ">
                    <h6 class="mb-3">History</h6>
                    <div class="row">

                        <div class="history">


                            <?php foreach ($leadlogs->logs($id)->getResultArray() as $logs) :                ?>

                                
                                <div class="mb-3">
                                    <p style="" class="text-primary mb-0"><?= $logs['desc_log']; ?></p>
                                    <p style="font-size:12px;" class="text-muted">
                                        <span><?= $logs['time_stamp']; ?></span><br>
                                        <span>
                                            <?php
                                            $prevLogs = $leadlogs->prev($id,$logs['id'])->getResultArray();
                                            foreach ($prevLogs as $prev) {
                                                if ($prev['update_status'] != $logs['update_status']) {
                                                    echo "Update Status - " . $prev['update_status'] . "->" . $logs['update_status'] . "<br>";
                                                }

                                                if ($prev['kategori_status'] != $logs['kategori_status']) {
                                                    echo "Kategori Status - " . $prev['kategori_status'] . "->" . $logs['kategori_status'] . "<br>";
                                                }

                                                if ($prev['catatan'] != $logs['catatan']) {
                                                    echo "Ubah feedback - " . $prev['catatan'] . "->" . $logs['catatan'] . "<br>";
                                                }

                                                if ($prev['sales'] != $logs['sales']) {
                                                    $salesprev = $users->detail($prev['sales'])->getRow('fullname');
                                                    $salesnext = $users->detail($logs['sales'])->getRow('fullname');
                                                    echo "Pindah Sales - " . $salesprev . " -> " . $salesnext . "<br>";
                                                }


                                                if ($prev['reserve'] != $logs['reserve']) {
                                                    echo "Ubah Nominal Reserve - " . $prev['reserve'] . "->" . $logs['reserve'] . "<br>";
                                                }

                                                if ($prev['booking'] != $logs['booking']) {
                                                    echo "Ubah Nominal Booking - " . $prev['booking'] . "->" . $logs['booking'] . "<br>";
                                                }


                                                if ($prev['catatan_admin'] != $logs['catatan_admin']) {
                                                    echo "Update catatan - " . $prev['catatan_admin'] . "->" . $logs['catatan_admin'] . "<br>";
                                                }

                                                

                                                // Similar checks for other fields...
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>
                            <?php endforeach; ?>


                        </div>


                    </div>


                </div>

                <!-- <p style="font-size:12px;" class="my-lg-1 my-3 px-2"> <span style="color:red">* </span>Reserve / Booking Amount hanya bisa diisi di status "Deal" </p> -->

            </div>
        </div>



        <div class="row d-flex justify-content-end mt-3 mb-5 px-3">
            <?php if ($level == "admin" || $level == "admin_group" || $level == "admin_project") : ?>
                <a href="<?= base_url(); ?>edit_leads/<?= $row['id']; ?>" class="btn btn-outline-primary col-lg-2 col-6 mt-lg-1 mt-3 px-0">Edit data</a>
                <a class="btn btn-outline-primary col-lg-2 col-6  mt-lg-1 mt-3" data-toggle="modal" data-target="#delete-leads">Delete</a>
            <?php endif; ?>
            <a class=" btn btn-primary col-lg-2 col-12 mt-lg-1 mt-3" data-toggle="modal" data-target="#save-leads">Save</a>

        </div>

        <!-- save Modal-->

        <div class="modal fade" id="save-leads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Save changes</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">Are you sure want to save this changes?</div>
                    <div class="modal-footer ">
                        <div class="row d-flex col-12 px-0 py-2">
                            <div class="col-6">
                                <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100"> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>


    <!-- delete Modal-->

    <div class="modal fade" id="delete-leads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Leads</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Are you sure want to delete this data?</div>
                <div class="modal-footer ">
                    <div class="row d-flex col-12 px-0 py-2">
                        <div class="col-6">
                            <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <form action="<?= base_url(); ?>delete_leads/<?= $row['id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-primary w-100"> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- DROPDOWN CHECKBOXES -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script>
    $('body').on("click", ".dropdown-menu", function(e) {
        $(this).parent().is(".open") && e.stopPropagation();
    });

    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('.option').prop('checked', true);
            var total = $('input[name="options[]"]:checked').length;
            $(".dropdown-text").html('(' + total + ') Selected');
            $(".select-text").html(' Deselect');
        } else {
            $('.option').prop('checked', false);
            $(".dropdown-text").html('(0) Selected');
            $(".select-text").html(' Select');
        }
    });

    $("input[type='checkbox'].justone").change(function() {
        var a = $("input[type='checkbox'].justone");
        if (a.length == a.filter(":checked").length) {
            $('.selectall').prop('checked', true);
            $(".select-text").html(' Deselect');
        } else {
            $('.selectall').prop('checked', false);
            $(".select-text").html(' Select');
        }
        var total = $('input[name="options[]"]:checked').length;
        $(".dropdown-text").html('(' + total + ') Selected');
    });
</script>
<!-- script countdown -->
<script>
    var refreshTime = setInterval(function() {
        $(".time-rolling").each(function() {
            if ($(this).data("leads") == 0 || $(this).data("status") != "New") return;
            var dateleads = moment($(this).data("lasttime"), 'YYYY-MM-DD HH:mm:ss').add($(this).data("interval"), 'minutes');
            var datenow = moment();
            var ms = dateleads.diff(datenow);
            //$(this).html(parseInt(ms / 60) + ":" + ((ms % 60).length == 1 ? "0" + (ms % 60) : (ms % 60)));
            if (ms > 0) {
                $(this).html(moment.utc(ms).format("mm:ss"));
                console.log(ms);
            } else {
                clearInterval(refreshTime);
                setTimeout(function() {
                    window.location.replace("<?= base_url("leads/new") ?>");
                }, 2000);

            }
        });

    }, 1000);
</script>



<!-- END OF DROPDOWN CHECKBOXES -->


<?php $this->endSection(); ?>