<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>
Resultados de su búsqueda
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>

<?php echo $this->include('templates/nav-buttons') ?>

<div class="columns is-multiline is-mobile" style="width: 100%">
    <?php foreach ($results as $result) : ?>

        <div class="column mobile-column is-2">
            <div class="card" style="margin-bottom: 10px; margin-right: 5px">
                <div class="card-image">
                    <figure class="image is-3by5">
                        <?php if (isset($result['title'])) : ?>

                            <a href="<?= base_url("movie_info/" . $result['id']) ?>">
                                <?php if ($result['poster_path'] >= 0) : ?>
                                    <?php if (session()->get('logued')) : ?>
                                        <div class="">
                                            <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                            <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                            <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                            <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $result['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                        </div>
                                    <?php else : ?>
                                        <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                        <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                    <?php endif; ?>

                                <?php else : ?>
                                    <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                    <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                    <img class="main-image" src=<?= base_url(ASSET_APP . 'images/posters/no-poster.png') ?> alt="Placeholder image">
                                <?php endif; ?>
                            </a>

                        <?php else : ?>
                            <a href="<?= base_url("tv_show_info/" . $result['id']) ?>">
                                <?php if (isset($result['poster_path'])) : ?>
                                    <?php if (session()->get('logued')) : ?>
                                        <?php if (isset($result['name'])) : ?>
                                            <div class="">
                                                <i class="fa-solid fa-tv" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                                <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                                <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                                <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/tvShow/' . $result['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                            </div>

                                        <?php else : ?>
                                            <div class="">
                                                <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                                <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                                <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $result['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                            </div>
                                        <?php endif; ?>

                                    <?php else : ?>
                                        <i class="fa-solid fa-tv" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                        <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                    <?php endif; ?>

                                <?php else : ?>
                                    <?php if (session()->get('logued')) : ?>
                                        <?php if (isset($result['name'])) : ?>
                                            <div class="">
                                                <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                                <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                                <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/tvShow/' . $result['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                            </div>

                                        <?php else : ?>
                                            <div class="">
                                                <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($result['vote_average'], 1) ?> </i>
                                                <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $result['poster_path'] ?> alt="Placeholder image">
                                                <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $result['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <img class="main-image" src=<?= base_url(ASSET_APP . 'images/posters/no-poster.png') ?> alt="Placeholder image">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>


                    </figure>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <?php echo $this->endSection() ?>

    <?php echo $this->section('footer') ?>
    <?php echo $this->endSection() ?>