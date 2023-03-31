<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
Iniciar sesión
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>


<?php if (session('msg')) : ?>
    <article class="message is-<?= session('msg.type') ?>">
        <div class="message-body">
            <?= session('msg.body') ?> </div>
    </article>
<?php endif; ?>

<div class="form is-flex is-flex-direction-column" style="margin-bottom: 1rem">

    <h1 style="background-color: #24303c; text-align:center; margin-bottom: 1rem; font-size: 3rem">Bienvenido de nuevo!</h1>

    <form style="background-color: #24303c;" action="<?= base_url('login_form') ?>" method="POST" class="is-flex is-flex-direction-column is-justify-content-center is-align-content-center">

        <input class="input user is-primary" type="text" name="user" placeholder="Nombre de usuario">
        <input class="input password is-primary" type="password" name="password" placeholder="Contraseña">

        <a class="is-flex is-justify-content-end" style="margin-bottom: 1rem; background-color: #24303c;" href="">Olvidé mi contraseña</a>

        <button type="submit" class="button is-primary is-large">Iniciar sesión</button>

        <a class="is-flex is-justify-content-center" href="<?= base_url('sign_up') ?>" style="margin-top: 1rem; background-color: #24303c;" href="">Soy nuevo, quiero registrarme</a>

    </form>
</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>