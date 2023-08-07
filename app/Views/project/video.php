<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<?php if (in_groups('admin') || in_groups('admin_group') || in_groups('admin_project') ) : ?>
    <div class="row d-flex justify-content-end mb-3">
        <!-- <div class="col"><a href=""><a href="" type="button" class="btn btn-sm btn-outline-light bg-white">Back</a></a></div> -->
        <div class="col d-flex  "><a href="<?= base_url(); ?>add_video/<?= $id; ?>" type="button" class="btn btn-sm btn-primary">Add Video</a></div>
    </div>
<?php endif; ?>


<div class="col p-0">
    <!-- flashdata -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
</div>

<div class="row">

    <?php foreach ($video as $file) : ?>

        <div class="col-lg-4 col-12">
            <div class="card w-100 rounded-3" style="width: 18rem;">

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item rounded-top" src="<?= base_url(); ?>document/video/project/<?= $folder; ?>/<?= $file; ?>" class=" rounded-3" sandbox allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a type="button" href="<?= base_url(); ?>document/video/project/<?= $folder; ?>/<?= $file; ?>" class="btn btn-light w-100" style="font-size: small;" download="<?= $file; ?>">Download</a>
                </div>
            </div>
        </div>





    <?php endforeach; ?>

</div>



<?php $this->endSection(); ?>