<?php helper('html'); // Load the HTML helper 
?>

<?= $this->extend('layout/sidebar') ?>

<?= $this->section('css') ?>
<?= link_tag('css/style.css') ?>
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>
<div class="container p-5">
    <a href="<?= base_url('users/all'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header  text-dark">
            <h4 class="card-title">Edit Data : <?= $users->name; ?></h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('users/update'); ?>">
                <input type="hidden" value="<?= $users->id; ?>" name="id">

                <div class="form-group">
                    <label for="">Nama </label>
                    <input type="text" value="<?= $users->name; ?>" name="nama" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" value="<?= $users->username; ?>" name="username" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"><?= $users->alamat; ?></textarea>

                </div>

                <button class="btn btn-success">Edit Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>