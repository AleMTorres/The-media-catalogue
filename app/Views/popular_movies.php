<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
Películas populares
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<?php echo $this->include('templates/nav-buttons') ?>

<div class="columns is-multiline is-mobile" style="width: 100%">
    <?php foreach ($mostPopularMovies as $popularMovie) : ?>

        <div class="column mobile-column is-2">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-3by5">
                        <a href="<?= base_url("movie_info/" . $popularMovie['id']) ?>">
                            <?php if (session()->get('logued')) : ?>
                                <div class="">
                                    <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                    <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($popularMovie['vote_average'], 1) ?> </i>
                                    <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $popularMovie['poster_path'] ?> alt="Placeholder image">
                                    <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/tvShow/' . $popularMovie['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                </div>
                            <?php else : ?>
                                <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($popularMovie['vote_average'], 1) ?> </i>
                                <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $popularMovie['poster_path'] ?> alt="Placeholder image"> <?php endif; ?>
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