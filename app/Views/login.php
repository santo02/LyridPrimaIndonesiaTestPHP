<?php helper('html'); // Load the HTML helper 
?>

<?= $this->extend('layout/index') ?>

<?= $this->section('css') ?>
<?= link_tag('css/style.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-4 bg-light rounded p-4">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <h2 class="text-center mb-4">Login Form</h2>
            <form method="post" action="<?= base_url(); ?>/login">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username*</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password*</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>