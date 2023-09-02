<?php helper('html'); // Load the HTML helper 
?>

<?= $this->extend('layout/sidebar') ?>

<?= $this->section('css') ?>
<?= link_tag('css/style.css') ?>
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>
<div class=" m-md-4 m-lg-5">
    <div class="container pt-5">
        <a href="<?= base_url('users/add'); ?>" class="btn btn-success mb-2">Tambah Data</a>
        <div class="card">
            <div class="card-header bg-gen text-white">
                <h4 class="card-title">Manajamen User</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($users as $user) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['alamat']; ?></td>
                                    <td>
                                        <a href="<?= base_url('users/edit/' . $user['id']); ?>" class="btn btn-success">
                                        <i class='bx bx-pencil nav_icon'></i></a>
                                        <a href="<?= base_url('users/delete/' . $user['id']); ?>" onclick="javascript:return confirm('Apakah ingin menghapus data user ?')" class="btn btn-danger">
                                        <i class='bx bx-trash nav_icon'></i></a>

                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>