<?php helper('html'); // Load the HTML helper 
?>

<?= $this->extend('layout/sidebar') ?>

<?= $this->section('css') ?>
<?= link_tag('css/style.css') ?>
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>
<div class=" m-md-4 m-lg-5">
    <div class="row">
        <div class="col-sm-3 mt-4"> 
            <div class="card h-100">
                <div class="card-body">
                    <p class="card-text">Total User</p>
                    <h2 class="card-title"><?= $userCount ?></h2>
                    <a href="<?= base_url('/users/all'); ?>" class="btn text-white bg-gen">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-4"> 
            <div class="card h-100">
                <div class="card-body">
                    <p class="card-text">Total Pegawai</p>
                    <h2 class="card-title"><?= $pegawaiCount ?></h2>
                    <a href="<?= base_url('/pegawai/all'); ?>" class="btn text-white bg-gen">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>