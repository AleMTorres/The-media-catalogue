<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
<?= $peopleInfo['name'] ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>


<div class="card people-card">
    <div class="card-content" style="padding-bottom: 60px">
        <div class="media">
            <div class="media-left">
                <figure class="image is-96x96">
                    <?php if ($peopleInfo['profile_path']) : ?>
                        <img class="is-rounded" src="<?= "https://image.tmdb.org/t/p/w500" . $peopleInfo['profile_path'] ?>" alt="Placeholder image">
                    <?php else : ?>
                        <img class="is-rounded" src="<?= base_url(ASSET_APP . 'images/people/no-people.jpg') ?>" alt="Placeholder image">
                    <?php endif; ?>
                </figure>
            </div>
            <div class="media-right">
                <span>
                    <p class="title is-4"><?= $peopleInfo['name'] ?></p>
                </span>
                <span style="color: #00c4a7">Fecha de nacimiento:
                    <p class="subtitle is-6"><?= $peopleInfo['birthday'] ?></p>
                </span>
                <span style="color: #00c4a7">Lugar de nacimietno:
                    <p class="subtitle is-6"><?= $peopleInfo['place_of_birth'] ?></p>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="columns is-multiline is-mobile" style="width: 100%">
    <?php foreach ($peopleShows as $show) : ?>

        <div class="column mobile-column is-3">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-3by5">

                        <?php if (isset($show['title'])) : ?>
                            <a href="<?= base_url("movie_info/" . $show['id']) ?>">
                                <?php if (session()->get('logued')) : ?>
                                    <div class="">
                                        <i class="fa-solid fa-clapperboard fa-2xl" style="z-index: 999; position: absolute; top: 95%; right: 85%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-imdb fa-2xl rate" style="z-index: 999; position: absolute; top: 95%; left: 70%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 29px"><?= round($show['vote_average'], 1) ?></span> </i>
                                        <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $show['poster_path'] ?> alt="Placeholder image">
                                        <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $show['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                    </div>

                                <?php else : ?>
                                    <i class="fa-solid fa-clapperboard fa-2xl" style="z-index: 999; position: absolute; top: 95%; right: 85%; color: #fff ; background-color: transparent;"></i>
                                    <i class="fa-brands fa-imdb fa-2xl rate" style="z-index: 999; position: absolute; top: 95%; left: 70%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 29px"><?= round($show['vote_average'], 1) ?></span> </i>
                                    <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $show['poster_path'] ?> alt="Placeholder image">
                                <?php endif; ?>

                            <?php else : ?>
                                <a href="<?= base_url("tv_show_info/" . $show['id']) ?>">
                                    <?php if (session()->get('logued')) : ?>
                                        <div class="">
                                            <i class="fa-solid fa-tv fa-2xl" style="z-index: 999; position: absolute; top: 95%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                            <i class="fa-brands fa-imdb fa-2xl rate" style="z-index: 999; position: absolute; top: 95%; left: 70%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 29px"><?= round($show['vote_average'], 1) ?></span> </i>
                                            <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $show['poster_path'] ?> alt="Placeholder image">
                                            <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $show['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                        </div>

                                    <?php else : ?>
                                        <i class="fa-solid fa-tv fa-2xl" style="z-index: 999; position: absolute; top: 95%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-imdb fa-2xl rate" style="z-index: 999; position: absolute; top: 95%; left: 70%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 29px"><?= round($show['vote_average'], 1) ?></span> </i>
                                        <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $show['poster_path'] ?> alt="Placeholder image">
                                    <?php endif; ?>
                                <?php endif; ?>
                                </a>



                    </figure>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>

<?php echo $this->endSection() ?>