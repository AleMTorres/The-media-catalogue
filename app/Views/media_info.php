<?php echo $this->extend('templates/navbar_footer') ?>

<?php echo $this->section('title') ?>

<?php if (isset($data['title'])) : ?>
    <?= $data['title'] ?>
<?php else : ?>
    <?= $data['name'] ?>
<?php endif; ?>

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

<?php echo $this->include('templates/nav-buttons') ?>

<div class="card">
    <div class="card-content">
        <div class="media">

            <div class="columns">

                <div class="column mobile-column is-half-desktop is-full-mobile is-two-thirds-tablet">
                    <div class="media-leftis-flex-direction-row">
                        <figure class="image is-48x200">
                            <?php if (isset($data['poster_path'])) : ?>
                                <img style="margin-bottom: 20px" src="<?= "https://image.tmdb.org/t/p/w500/" . $data['poster_path'] ?>" alt="Placeholder image">
                            <?php else : ?>
                                <img style="" src="<?= base_url(ASSET_APP . 'images/posters/no-poster.png') ?>" alt="Placeholder image">
                            <?php endif; ?>

                            <?php if (session()->get('logued')) : ?>
                                <div class="action-bar is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
                                    <?php if (isset($data['name'])) : ?>
                                        <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/tvShow/' . $data['id']) ?>"><i class="fa-solid fa-bookmark fa-beat fa-2xl" style="color: #00c4a7;background-color: transparent"></i></a>

                                    <?php else : ?>
                                        <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $data['id']) ?>"><i class="fa-solid fa-bookmark fa-beat fa-2xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($data['title'])) : ?>
                                <?php if (count($creditMovie[1]) != 0) : ?>
                                    <span class="is-6"><strong class="is-6" style="color: #00c4a7;">Director/a:</strong></span>
                                    <a href="<?= base_url('people/' . $creditMovie[1]['id']) ?>" class="people-link">
                                        <p class="subtitle is-6" style="margin-bottom: 2px"> <?= $creditMovie[1]['name'] ?> </p>
                                    </a>
                                <?php endif; ?>

                                <?php if (count($creditMovie[2]) != 0) : ?>
                                    <span class="is-6"><strong style="color: #00c4a7">Guionista:</strong></span>
                                    <?php foreach ($creditMovie[2] as $writer) : ?> <a href="<?= base_url('people/' . $writer['id']) ?>" class="people-link">
                                            <p class="subtitle is-6" style="margin-bottom: 2px"><?= $writer['name'] ?> </p>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if ($data['genres'] <= 1) : ?>
                                    <p class="is-6"><b style="color: #00c4a7">Género: </b>
                                        <?php foreach ($data['genres'] as $genre) : ?>
                                            <?= $genre['name'] ?>
                                        <?php endforeach; ?>
                                    </p>
                                <?php else : ?>
                                    <p class="is-6"><b style="color: #00c4a7">Géneros: </b>
                                        <?php foreach ($data['genres'] as $genre) : ?>
                                            <?= $genre['name'] ?> /
                                        <?php endforeach; ?>
                                    </p>
                                <?php endif; ?>

                            <?php endif; ?>

                            <?php if (isset($data['name'])) : ?>
                                <p class="is-6"><b style="color: #00c4a7">Temporadas: </b> <?= $data['number_of_seasons'] ?></p>
                                <p class="is-6"><b style="color: #00c4a7">Episodios: </b> <?= $data['number_of_episodes'] ?></p>
                            <?php else : ?>
                                <p class="is-6"><b style="color: #00c4a7">Duración: </b> <?= $data['runtime'] ?> minutes</p>
                            <?php endif; ?>

                            <p class="is-6"><b style="color: #00c4a7">Puntuación: </b> <?= $data['vote_average'] . " (" . $data['vote_count'] . ")" ?>

                        </figure>
                    </div>
                </div>

                <div class="column is-half-desktop is-full-mobile is-two-thirds-tablet">
                    <div class="media-content">
                        <?php if (isset($data['name'])) : ?>
                            <p class="title is-3" style="color: #00c4a7"><?= $data['name'] . " (" . substr($data['first_air_date'], 0, -6) . ")" ?></p>
                            <p class="subtitle is-6" style="color: #fff"> <span style="color: #fff"> Título original:</span> <?= $data['original_name'] ?></p>
                        <?php else : ?>
                            <p class="title is-3" style="color: #00c4a7"><?= $data['title'] . " (" . substr($data['release_date'], 0, -6) . ")" ?></p>
                            <p class="subtitle is-6" style="color: #fff"> <span style="color: #fff"> Título original:</span> <?= $data['original_title'] ?></p>
                        <?php endif; ?>

                        <?php if ((count($providers) > 0)) : ?>

                            <?php if (isset($providers[0]['flatrate'])) : ?>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde ver: </b></p>
                                <?php foreach ($providers as $provider) : ?>
                                    <?php foreach ($provider['flatrate'] as $flatrate) : ?>
                                        <a target="_blank" href="<?= $provider['link'] ?>" class="link"> <img style="margin-bottom: 10px; margin-right: 5px" width="100" height="100" src="<?= "https://image.tmdb.org/t/p/w500" . $flatrate['logo_path'] ?>" alt=""> </a>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>

                            <?php elseif (isset($providers[0]['rent'])) : ?>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde ver: No hay servicios de stream disponibles para este objeto</b></p>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde alquilar: </b></p>
                                <?php foreach ($providers as $provider) : ?>
                                    <?php foreach ($provider['rent'] as $rent) : ?>
                                        <a target="_blank" href="<?= $provider['link'] ?>" class="link"> <img style="margin-bottom: 10px; margin-right: 5px" width="100" height="100" src="<?= "https://image.tmdb.org/t/p/w500" . $rent['logo_path'] ?>" alt=""> </a>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php elseif (isset($providers[0]['ads'])) : ?>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde ver: No hay servicios de stream disponibles para este objeto</b></p>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde alquilar: </b></p>
                                <?php foreach ($providers as $provider) : ?>
                                    <?php foreach ($provider['ads'] as $ads) : ?>
                                        <a target="_blank" href="<?= $provider['link'] ?>" class="link"> <img style="margin-bottom: 10px; margin-right: 5px" width="100" height="100" src="<?= "https://image.tmdb.org/t/p/w500" . $ads['logo_path'] ?>" alt=""> </a>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>

                            <?php else : ?>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde ver: No hay servicios de stream disponibles para este objeto</b></p>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Dónde comprar: </b></p>
                                <?php foreach ($providers as $provider) : ?>
                                    <?php foreach ($provider['buy'] as $buy) : ?>
                                        <a target="_blank" href="<?= $provider['link'] ?>" class="link"> <img style="margin-bottom: 10px; margin-right: 5px" width="100" height="100" src="<?= "https://image.tmdb.org/t/p/w500" . $buy['logo_path'] ?>" alt=""> </a>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>

                            <?php endif; ?>

                        <?php else : ?>
                            <p class="subtitle is-6"><b style="color: #00c4a7">Dónde ver: No hay servicios de stream disponibles para este producto</b></p>
                            <img width="100" height="100" src="<?= base_url(ASSET_APP . 'images/providers/no-provider.png') ?>" alt="">
                        <?php endif; ?>

                        <?php if ($data['overview']) : ?>
                            <div class="content">
                                <b style="color: #00c4a7">Sinopsis: </b>
                                <?= $data['overview'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (count($video) == 0) : ?>
                            <p></p>
                        <?php else : ?>
                            <?php if (isset($data['title'])) : ?>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Trailer: </b> <iframe style="margin-top: 10px" width="100%" height="315" src=<?= "https://www.youtube.com/embed/" . $video[0]['key'] ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> </p>
                            <?php else : ?>
                                <p class="subtitle is-6"><b style="color: #00c4a7">Trailer: </b> <iframe style="margin-top: 10px" width="100%" height="315" src=<?= "https://www.youtube.com/embed/" . $video[0]['key'] ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> </p>
                            <?php endif; ?>
                        <?php endif; ?>


                        <?php if (isset($creditMovie[0])) : ?>
                            <span class="is-6"><strong style="color: #00c4a7;">Reparto:</strong></span>
                            <?php foreach ($creditMovie[0] as $cast) : ?> <a href="<?= base_url('people/' . $cast['id']) ?>" class="people-link">
                                    <p class=" subtitle is-6" style="margin-bottom: 1px;"><?= $cast['name'] . " (" . $cast['character'] . ")"  ?> </p>
                                </a>
                            <?php endforeach; ?>

                        <?php else : ?>
                            <span class="is-6"><strong style="color: #00c4a7;">Reparto:</strong></span>
                            <?php foreach ($creditTvShow[0] as $cast) : ?> <a href="<?= base_url('people/' . $cast['id']) ?>" class="people-link">
                                    <p class=" subtitle is-6" style="margin-bottom: 1px;"><?= $cast['name'] . " (" . $cast['character'] . ")"  ?> </p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<h1 style="font-size: 2rem; padding: 20px 20px;">Películas o series similares</h1>
<div class="columns is-multiline is-mobile" style="width: 100%">
    <?php if (isset($similarTvShows)) : ?>
        <?php foreach ($similarTvShows as $similarShow) : ?>
            <div class="column is-2 mobile-column is-half-desktop is-full-mobile is-two-thirds-tablet">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-3by5">
                            <a href="<?= base_url("movie_info/" . $similarShow['id']) ?>">
                                <?php if (session()->get('logued')) : ?>
                                    <div class="">
                                        <i class="fa-solid fa-tv" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($similarShow['vote_average'], 1) ?> </i>
                                        <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $similarShow['poster_path'] ?> alt="Placeholder image">
                                        <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/tvShow/' . $similarShow['id']) ?>"><i class="fa-solid fa-bookmark fa-2xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                    </div>
                                <?php else : ?>
                                    <i class="fa-solid fa-tv" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                    <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($similarShow['vote_average'], 1) ?> </i>
                                    <img class="main-image" src=<?= "https://image.tmdb.org/t/p/w500" . $similarShow['poster_path'] ?> alt="Placeholder image">
                                <?php endif; ?>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    <?php else : ?>
        <?php foreach ($similarMovies as $similarMovie) : ?>
            <div class="column is-2 mobile-column is-half-desktop is-full-mobile is-two-thirds-tablet">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-3by5">
                            <a href="<?= base_url("movie_info/" . $similarMovie['id']) ?>">
                                <?php if (session()->get('logued')) : ?>
                                    <div class="">
                                        <i class="fa-solid fa-clapperboard " style="z-index: 999; position: absolute; top: 92%; right: 85%; color: #fff ; background-color: transparent;"></i>

                                        <?php if (!isset($similarMovie['vote_average'])) : ?>
                                            <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span> 0</i>
                                        <?php else : ?>
                                            <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span> <?= round($similarMovie['vote_average'], 1) ?></i>
                                        <?php endif; ?>

                                        <img class="main-image" style="border-radius: 10px" src=<?= "https://image.tmdb.org/t/p/w500" . $similarMovie['poster_path'] ?> alt="Placeholder image">
                                        <a style="z-index: 999; position: absolute; top: 15px; left: 11px; background-color: transparent;" href="<?= base_url('add_to_watchlist/movie/' . $similarMovie['id']) ?>"><i class="fa-solid fa-bookmark fa-xl" style="color: #00c4a7;background-color: transparent"></i></a>
                                    </div>
                                <?php else : ?>
                                    <div class="">
                                        <i class="fa-solid fa-clapperboard" style="z-index: 999; position: absolute; top: 92%; right: 82%; color: #fff ; background-color: transparent;"></i>
                                        <i class="fa-brands fa-mdb" style="z-index: 999; position: absolute; top: 87%; left: 79%; color:#e2b616 ; background-color: transparent;"> <span style="color:#e2b616 ; background-color: transparent; margin-left: 25px"></span><?= round($similarMovie['vote_average'], 1) ?> </i>
                                        <img class="main-image" style="border-radius: 10px" src=<?= "https://image.tmdb.org/t/p/w500" . $similarMovie['poster_path'] ?> alt="Placeholder image">
                                    </div>
                                <?php endif; ?>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>