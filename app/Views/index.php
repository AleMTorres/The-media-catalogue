<?php echo $this->extend('templates/navbar_footer') ?>


<?php echo $this->section('title') ?>
The Media Catalogue
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

<?php if (session()->get('logued')) : ?>
    <header class="showcase">
        <div class="showcase-content">
            <h1>Armá tu watchlist</h1>
            <p>con todas las películas y series</p>
            <a href="<?= base_url('watchlist') ?>" class="button is-primary">Mi watchlist</a>
        </div>
    </header>
<?php else : ?>
    <header class="showcase">
        <div class="showcase-content">
            <h1>Armá tu watchlist</h1>
            <p>con todas las películas y series</p>
            <a href="<?= base_url('sign_up') ?>" class="button is-primary">Empezar</a>
        </div>
    </header>
<?php endif; ?>


<?php echo $this->include('templates/nav-buttons') ?>

<div class="columns is-multiline is-mobile" style="width: 100%">
    <?php foreach ($allMostPopular as $popularMovie) : ?>

        <div class="column mobile-column is-2 is-half-mobile is-two-thirds-tablet">
            <div class="card" style="border-radius: 10px">
                <div class="card-image">
                    <figure class="image is-3by5">

                        <?php if (isset($popularMovie['name'])) : ?>
                            <a href="<?= base_url("tv_show_info/" . $popularMovie['id']) ?>">
                            <?php else : ?>
                                <a href="<?= base_url("movie_info/" . $popularMovie['id']) ?>">
                                <?php endif; ?>

                                <?php if (session()->get('logued')) : ?>
                                    <?php if (isset($popularMovie['name'])) : ?>
                                        <div class="">
                                            <i class="fa-solid fa-tv" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                            <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($popularMovie['vote_average'], 1) ?> </i>
                                            <img class="main-image" style="border-radius: 10px" src=<?= "https://image.tmdb.org/t/p/w500" . $popularMovie['poster_path'] ?> alt="Placeholder image">

                                            <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/tvShow/' . $popularMovie['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                        </div>

                                    <?php else : ?>
                                        <div class="">
                                            <i class="fa-solid fa-clapperboard " style="z-index: 999; position: absolute; top: 92%; right: 85%; color: #fff ; background-color: transparent;"></i>
                                            <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span> <?= round($popularMovie['vote_average'], 1) ?></i>
                                            <img class="main-image" style="border-radius: 10px" src=<?= "https://image.tmdb.org/t/p/w500" . $popularMovie['poster_path'] ?> alt="Placeholder image">
                                            <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $popularMovie['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                        </div>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <?php if (isset($popularMovie['name'])) : ?>
                                        <i class="fa-solid fa-tv" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span> <?= round($popularMovie['vote_average'], 1) ?></i>
                                        <img class="main-image" style="border-radius: 10px" src=<?= "https://image.tmdb.org/t/p/w500" . $popularMovie['poster_path'] ?> alt="Placeholder image">
                                    <?php else : ?>
                                        <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 85%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span> <?= round($popularMovie['vote_average'], 1) ?></i>
                                        <img class="main-image" style="border-radius: 10px" src=<?= "https://image.tmdb.org/t/p/w500" . $popularMovie['poster_path'] ?> alt="Placeholder image">
                                    <?php endif; ?>
                                <?php endif; ?>

                                </a>
                    </figure>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <?php echo $this->endSection() ?>

    <?php echo $this->section('footer') ?>

    <?php echo $this->endSection() ?>