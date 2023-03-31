<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
Películas en tendencia
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<?php echo $this->include('templates/nav-buttons') ?>

<div class="columns is-multiline is-mobile" style="width: 100%">
    <?php foreach ($trendingMovies as $trending_movie) : ?>

        <div class="column mobile-column is-2">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-3by5">
                        <a href="<?= base_url("movie_info/" . $trending_movie['id']) ?>">
                            <?php if (session()->get('logued')) : ?>
                                <div class="">
                                    <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($trending_movie['vote_average'], 1) ?> </i>
                                    <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $trending_movie['poster_path'] ?> alt="Placeholder image">
                                    <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $trending_movie['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                </div>
                            <?php else : ?>
                                <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($trending_movie['vote_average'], 1) ?> </i>
                                <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $trending_movie['poster_path'] ?> alt="Placeholder image">
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