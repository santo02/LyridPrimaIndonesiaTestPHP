<?php helper('html'); // Load the HTML helper 
?>

<?= $this->extend('layout/sidebar') ?>

<?= $this->section('css') ?>
<?= link_tag('css/style.css') ?>
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>
<div class="container p-5">
    <a href="<?= base_url('pegawai/all'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-gen text-white">
            <h4 class="card-title">Tambah Pegawai</h4>
        </div>
        <div class="card-body">

            <form method="post"  enctype="multipart/form-data" action="<?= base_url(); ?>/pegawai/add/store">
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show w-100"  role="alert">
                        <h4>Gagal menambah Data Pegawai</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="form-group mb-3">
                    <label class="form-label" for="">Nama </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" name="konfirmasi_password" class="form-control">
                </div>
                <button class="btn mt-3 btn-success" type="submit">Tambah pegawai</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>