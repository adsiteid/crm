<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


    <div class="row mb-4 p-0">
        <div class="col d-flex "><a href="<?= base_url(); ?>add_images_promo/<?= $id ?>" type="button" class="btn btn-sm btn-primary">Add Images</a></div>
        <!-- <div class="col d-flex justify-content-end"><a href=""><a href="" type="button" class="btn btn-sm btn-outline-light bg-white">Back</a></a></div> -->
    </div>


<!-- flashdata -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<div class="row">

    <?php foreach ($promotion as $file) : ?>

        <div class="col-lg-3 col-6 mb-4">
            <div class="card w-100 rounded-3" style="width: 18rem;">
                <img src="<?= base_url(); ?>/document/image/project/promotion/<?= $folder; ?>/<?= $file; ?>" class="card-img-top rounded-3" alt="..." style="height : 150px; object-fit : cover;">
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a type="button" href="<?= base_url(); ?>/document/image/project/promotion/<?= $folder; ?>/<?= $file; ?>" class="btn btn-light w-100 px-0 rounded" style="font-size: small;" download="<?= $file; ?>">Download</a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>



<?php $this->endSection(); ?>