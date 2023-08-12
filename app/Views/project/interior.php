<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>



    <div class="row mb-4 p-0">
        <!-- <div class="col"><a href=""><a href="" type="button" class="btn btn-sm btn-outline-light bg-white">Back</a></a></div> -->
        <div class="col d-flex  "><a href="<?= base_url(); ?>add_images_interior/<?= $id ?>" type="button" class="btn btn-sm btn-primary">Add Images</a></div>
    </div>



<!-- flashdata -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>


<div class="row">

    <?php foreach ($interior as $file) : ?>

        <div class="col-lg-3 col-12 mb-3 d-flex align-items-center">
            <div class="card w-100 rounded-3 w-100" style="width: 18rem;">
                <img src="<?= base_url(); ?>/document/image/project/interior/<?= $folder; ?>/<?= $file; ?>" class="card-img-top rounded-3 " alt="..." style="height : 150px; object-fit : cover;">
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a type="button" href="<?= base_url(); ?>/document/image/project/interior/<?= $folder; ?>/<?= $file; ?>" class="btn btn-light w-100" style="font-size: small;" download="<?= $file; ?>">Download</a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>



<?php $this->endSection(); ?>