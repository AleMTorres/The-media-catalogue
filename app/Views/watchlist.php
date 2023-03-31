<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
Watchlist de <?= session()->get('user_name') ?>
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

<?php if ($data == null) : ?>
    <div class="">
        <div class="" style="margin-bottom: 50px;">
            <p class="title is-5">Oops! Nada por acá todavía. <a href="<?= base_url() ?>">Empezar a agregar shows a mi watchlist</a></p>
        </div>
    </div>
<?php endif; ?>

<?php echo $this->include('templates/nav-buttons') ?>

<h1 style="margin-bottom: 20px; font-size: 2rem">Mi watchlist</h1>

<div class="columns is-multiline is-mobile" style="width: 100%;">
    <?php foreach ($data as $watch) : ?>
        <div class="column mobile-column watchlist-column is-2">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-3by5">

                        <?php if (($watch['type'] == "movie")) : ?>
                            <?php if (strlen($data[0]['image']) <= 31) : ?>
                                <i class="fa-solid fa-clapperboard fa-2xl" style="z-index: 999; position: absolute; top: 92%; right: 85%; color: #fff ; background-color: transparent;"></i>
                                <img class="main-image" src=<?= base_url(ASSET_APP . 'images/posters/no-poster.png') ?> alt="Placeholder image">
                            <?php else : ?>
                                <i class="fa-solid fa-clapperboard fa-2xl" style="z-index: 999; position: absolute; top: 92%; right: 85%; color: #fff; background-color: transparent;"></i>
                                <a href="<?= base_url("movie_info/" . $watch['object_id']) ?>">
                                    <img class="main-image" src=<?= $watch['image'] ?> alt="Placeholder image">
                                </a>
                            <?php endif; ?>

                        <?php else : ?>
                            <?php if (strlen($data[0]['image']) <= 31) : ?>
                                <i class="fa-solid fa-tv fa-2xl" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                <img class="main-image" src=<?= base_url(ASSET_APP . 'images/posters/no-poster.png') ?> alt="Placeholder image">
                            <?php else : ?>
                                <i class="fa-solid fa-tv fa-2xl" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                <a href="<?= base_url("tv_show_info/" . $watch['object_id']) ?>">
                                    <img class="main-image" src=<?= $watch['image'] ?> alt="Placeholder image">
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>

                    </figure>
                </div>

                <div class="card-content">
                    <div class="content is-flex is-align-items-center is-justify-content-center">
                        <div class="control-bar is-flex is-align-items-center is-justify-content-around">
                            <?php if ($watch['provider_link'] == "") : ?>
                                <a target="_blank" href="<?= $watch['provider_link'] ?>"> <img style="margin-right: 20px" width="80" height="80" src="<?= base_url('images/providers/no-provider.png') ?>" alt=""></a>
                            <?php else : ?>
                                <a target="_blank" href="<?= $watch['provider_link'] ?>"> <img style="margin-right: 20px" width="80" height="80" src="<?= $watch['provider_logo'] ?>" alt=""></a>
                            <?php endif; ?>
                            <a class="button is-danger is outlined" href="<?= base_url('delete/' . $watch['object_id']) ?>"><span style="background-color: transparent;" class="icon is-small"><i style="background-color: transparent;" class="fas fa-times"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php echo $this->endSection() ?>

    <?php echo $this->section('footer') ?>
    <?php echo $this->endSection() ?>