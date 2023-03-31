<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
Registrarse
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

    <h1 style="background-color: #24303c; text-align:center; margin-bottom: 1rem; font-size: 3rem">Registrate gratis!</h1>

    <form style="background-color: #24303c;" action="<?= base_url('sign_up_form') ?>" method="POST" class="is-flex is-flex-direction-column is-justify-content-center is-align-content-center">

        <div class="user_info is-flex is-flex-direction-row" style="background-color: #24303c;">
            <input class="input user is-primary" type="text" name="name" placeholder="Nombre" style="margin-right: 10px">
            <input class="input user is-primary" type="text" name="last_name" placeholder="Apellido">
        </div>
        <input class="input user is-primary" type="text" name="user" placeholder="Nombre de usuario">

        <input class="input password is-primary" type="password" name="password" placeholder="Contraseña">
        <input class="input password is-primary" type="password" name="repeat_password" placeholder="Repetir contraseña">


        <button type="submit" class="button is-primary is-large">Registrarme</button>

        <a class="is-flex is-justify-content-center" href="<?= base_url('login') ?>" style="margin-top: 1rem; background-color: #24303c;" href="">Ya tengo una cuenta, iniciar sesión</a>

    </form>
</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>