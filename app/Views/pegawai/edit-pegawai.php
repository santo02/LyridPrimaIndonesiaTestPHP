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
        <div class="card-header  text-dark">
            <h4 class="card-title">Edit Data pegawai: <?= $users->name; ?></h4>
        </div>
        <div class="card-body">

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
                    <h4>Gagal mengubah Data Pegawai</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            
            <form method="post" action="<?= base_url('pegawai/update'); ?>" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="">foto</label>
                    <input class="form-control" type="file" name="new_foto">
                    <!-- <img src="/<?= $users->foto; ?>" width="100px" height="100px"> -->
                </div>
                <button class="btn btn-success mt-4">Edit Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>