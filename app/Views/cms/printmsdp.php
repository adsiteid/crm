<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<?php foreach ($detail->getResultArray() as $row); ?>

<div class="card " id="export_pdf">
    <div class="card-header bg-white rounded-top d-flex align-items-center">
        <div class="col-lg-10 col-sm-10 col-12">

            <div class="d-lg-none d-md-none d-sm-none d-flex my-2">
                <label class="badge badge-<?php
                                            if ($row['status'] == 'New') {
                                                echo 'success';
                                            } elseif ($row['status'] == 'Diterima') {
                                                echo 'warning';
                                            } elseif ($row['status'] == 'Diproses') {
                                                echo 'info';
                                            } elseif ($row['status'] == 'Selesai') {
                                                echo 'booking';
                                            } elseif ($row['status'] == 'Ditolak') {
                                                echo 'danger';
                                            }
                                            ?>" style="font-size: 11px;">
                    <?= $row['status']; ?>
                </label>
            </div>

            <h4 class=" text-primary card-title pt-3 lh-base">Management Selfservice Divisi Promosi (MSDP)</h4>
        </div>
        <div class="col-lg-2 col-sm-2 d-lg-flex d-md-flex d-sm-flex d-none align-items-center justify-content-end">

            <label class="badge badge-<?php
                                        if ($row['status'] == 'New') {
                                            echo 'success';
                                        } elseif ($row['status'] == 'Diterima') {
                                            echo 'warning';
                                        } elseif ($row['status'] == 'Diproses') {
                                            echo 'info';
                                        } elseif ($row['status'] == 'Selesai') {
                                            echo 'booking';
                                        } elseif ($row['status'] == 'Ditolak') {
                                            echo 'danger';
                                        }
                                        ?>" style="font-size: 11px;">
                <?= $row['status']; ?>
            </label>

        </div>
    </div>
    <div class="card-body">

        <!-- <h3 class="my-3">Surat Perintah Kerja</h3> -->

        <div class="row p-3">

            <div class="col-12 p-lg p-0">
                <div class="card">
                    <div class="card-header bg-primary border rounded-top ">
                        <div class="row d-flex align-items-center">
                            <div class="col-10">
                                <h3 class=" text-light card-title pt-3 lh-base mb-0 pb-0">Surat Perintah Kerja</h3>
                                <p class="text-muted" style="font-size: small;">No : <?= $row['id']; ?>/SPK-PRM/<?= $row['id']; ?>/I/<?= date('Y'); ?></p>
                            </div>
                            <div class="col-2 d-lg-flex d-none justify-content-end">
                                <button type="button" class="btn btn-sm btn-light rounded" onclick="printDiv('export_pdf')"><i class="ti-printer menu-icon"></i></button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body border bg-light p-lg-5 p-md-5 p-3 pt-5">
                        <div class="d-lg-flex justify-content-end d-none">
                            <p style="font-size:medium" class="mt-3"><span class="text-muted">Update Admin :</span> <span Class="text-primary"><?= $row['updated_at']; ?></span></p>
                        </div>
                        <p class="mb-0 text-muted">Marketing Tools Pembebanan Biaya :</p>
                        <h5 class="text-primary card-title pt-3 lh-base mt-0 mb-4 pt-0 pb-0"><?= $row['dibebankan']; ?></h5>

                        <div class="d-lg-block d-sm-block d-none">
                            <p style="font-size:medium" class="mt-3"><span class="text-muted">Diajukan Kepada :</span> <span Class="text-primary"><?= $row['diajukan']; ?></span></p>
                            <p style="font-size:medium"><span class="text-muted">Diajukan Oleh :</span> <span class="text-primary"><?= $row['name']; ?></span></p>
                            <p style="font-size:medium"><span class="text-muted">Tanggal Order :</span> <span class="text-primary"><?= $row['created_at']; ?></span></p>
                            <p style="font-size:medium"><span class="text-muted">Tanggal Deadline :</span> <span class="text-primary"><?= $row['deadline']; ?></span></p>
                        </div>

                        <div class="d-lg-none d-sm-none d-block">
                            <p style="font-size:small" class="mt-3"><span class="text-muted">Diajukan Kepada</p>
                            <h6><?= $row['diajukan']; ?></h6>
                            <p style="font-size:small" class="mt-3"><span class="text-muted">Diajukan Oleh</p>
                            <h6><?= $row['name']; ?></h6>
                            <p style="font-size:small" class="mt-3"><span class="text-muted">Tanggal Order</p>
                            <h6><?= $row['created_at']; ?></h6>
                            <p style="font-size:small" class="mt-3"><span class="text-muted">Deadline</p>
                            <h6><?= $row['deadline']; ?></h6>
                            <p style="font-size:small" class="mt-3"><span class="text-muted">Update Admin</p>
                            <h6><?= $row['updated_at']; ?></h6>
                        </div>

                        <h6 class="text-primary mt-5 mb-3 lh-base">Mohon untuk dapat segera di Proses Pengajuan berikut :</h6>

                        <textarea class="col-12 border-secondary py-3 rounded" name="" id="" rows="10"><?= $row['isi']; ?></textarea>

                        <div class="my-5">


                            <div class="row">
                                <div class="col-lg-6 col-sm-6 text-center mb-lg-0 mb-5">
                                    <div class="col-12 mb-5">Mengetahui</div>
                                    <div class="row">
                                        <div class="col-6">Yayank Suharyanti</div>
                                        <div class="col-6">Stephanie N.R</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 text-center">
                                    <div class="col-12 mb-5">Menyetujui</div>
                                    <div class="row">
                                        <div class="col-6">Bayu Setiawan</div>
                                        <div class="col-6">Adam Bilfaqih</div>
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

<form action="<?= base_url('/update_msdp/' . $row['id']) ?>" method="post">
    <?= csrf_field(); ?>

    <?php
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $date = $dt->format('Y-m-d H:i:s');
    ?>

    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <input type="hidden" name="updated_at" value="<?= $date; ?>">

    <div class="card my-3">
        <div class="card-header bg-transparent pt-3">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-9 col-6">
                    <h5>Detail Pemohon</h5>
                </div>
                <?php if (in_groups('admin') || in_groups('admin_group') || in_groups('admin_project') ) : ?>
                    <div class="col-lg-3 col-6">
                        <select class="form-select" name="status" required>
                            <option value="<?= ($row['status'] == "New") ? '' : $row['status']; ?>"><?= ($row['status'] == "New") ? 'Select Option' : $row['status']; ?></option>
                            <option value="Diterima">Diterima</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-3 col-12 my-3">
                <p style="font-size:12px;" class="mb-1">Kepada</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['diajukan']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Diajukan oleh</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['name']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Email</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['email']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Nomor Kontak</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['phone']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Jabatan</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['jabatan']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Divisi</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['divisi']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Project</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['project']; ?></h6>
                <p style="font-size:12px;" class="mb-1">Manager</p>
                <h6 style="font-size:13px;" class="mb-3"><?= $row['manager']; ?></h6>
            </div>
        </div>

    </div>

    <div class="d-flex justify-content-end my-4 row px-3">
    
            <a type="button" class="btn btn-outline-primary col-lg-2 col-6" data-toggle="modal" data-target="#delete-data">Delete</a>
            <a href="<?= base_url(); ?>edit_msdp/<?= $row['id']; ?>" type="button" class="btn btn-outline-primary col-lg-2 col-6">Edit</a>
            <a type="button" class="btn btn-primary col-lg-2 col-12 my-lg-0 my-3" data-toggle="modal" data-target="#save-data">Save</a>
    
    </div>



    <!-- save Modal-->

    <div class="modal fade" id="save-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
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
                        <form action="<?= base_url(); ?>delete_msdp/<?= $row['id']; ?>" method="post">
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



<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>


<?php $this->endSection(); ?>