<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->renderSection('title') ?></title>
    <link rel="shortcut icon" href="<?= base_url(ASSET_APP . 'images/tmc-favicon.png') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="<?= base_url(ASSET_APP . 'css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url(ASSET_APP . 'css/credentials.css') ?>">
    <script src="https://kit.fontawesome.com/9bae38f407.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container is-widescreen is-flex is-align-content-center is-align-items-center is-flex-direction-column">

        <?php echo $this->renderSection('navbar') ?>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?= base_url() ?>">
                    <img src="<?= base_url(ASSET_APP . 'images/logo_TMC.png') ?>" width="112" height="28">
                </a>

                <a role="button" class="navbar-burger" id="navbarBurguer" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarMobileMenu" class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="<?= base_url('movies') ?>" class="navbar-link">
                            Películas
                        </a>

                        <div class="navbar-dropdown">
                            <a href="<?= base_url('best_rated_movies') ?>" class="navbar-item">Mejor puntuadas</a>
                            <a href="<?= base_url('trending_movies') ?>" class="navbar-item">En tendencia</a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="<?= base_url('tv_shows') ?>" class="navbar-link">
                            Series
                        </a>

                        <div class="navbar-dropdown">
                            <a href="<?= base_url('best_rated_tv_shows') ?>" class="navbar-item">Mejor puntuadas</a>
                        </div>
                    </div>

                    <a href="<?= base_url('week_trending') ?>" class="navbar-item">Tendencias de la semana</a>


                    <form action="<?= base_url('search_results/(:any)') ?>" method="GET" role="search" class="search">
                        <input class="input is-primary is-small" name="search" type="text" placeholder="Buscar">
                        <button class="button is-primary is-small" type="submit">Buscar</button>
                    </form>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">

                        <?php if (session()->get('logued')) : ?>
                            <div class="d-flex justify-content-start align-items-baseline">
                                <a href="<?= base_url('watchlist') ?>" class="button is-primary is-light"><i class="fa-regular fa-bookmark" style="color: #0094a6; background-color: #defffa"></i></a>
                                <a href="<?= base_url('log_out') ?>" class="button is-danger is-light">Cerrar sesión</a>
                            </div>
                        <?php else : ?>
                            <div class="buttons">
                                <a href="<?= base_url('login') ?>" class="button is-primary is-light">Iniciar sesión</a>
                                <a href="<?= base_url('sign_up') ?>" class="button is-success">Registrarse</a>
                            </div>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </nav>

        <?php echo $this->renderSection('content') ?>


        <?php echo $this->renderSection('footer') ?>
        <footer class="footer" style="margin-top: 20px">

            <div class="content footer-content is-small has-text-centered is-flex is-flex-direction-row is-justify-content-space-around is-align-items-center">
                <div class="is-flex is-flex-direction-column is-align-items-center">
                    <a href="<?= base_url() ?>">
                        <p class="footer-text" style="font-size: 1.25rem; color: #00c4a7; font-weight: bold">The Media Catalogue</p>
                    </a>

                    <a href="<?= base_url('login') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Iniciar sesión</p>
                    </a>
                    <a href="<?= base_url('sign_up') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Registrarse</p>
                    </a>
                </div>



                <div class="is-flex is-flex-direction-column is-align-items-center">
                    <h3>Películas</h3>
                    <a href="<?= base_url('movies') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Populares</p>
                    </a>
                    <a href="<?= base_url('best_rated_movies') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Mejor puntuadas</p>
                    </a>
                    <a href="<?= base_url('trending_movies') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Tendencia</p>
                    </a>
                </div>

                <div class="is-flex is-flex-direction-column is-align-items-center">
                    <h3>Series</h3>
                    <a href="<?= base_url('tv_shows') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Populares</p>
                    </a>
                    <a href="<?= base_url('best_rated_tv_shows') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Mejor puntuadas</p>
                    </a>
                </div>

                <div class="is-flex is-flex-direction-column is-align-items-center">
                    <a href="<?= base_url('week_trending') ?>" style="margin-bottom: 10px">
                        <p class="footer-text">Tendencias de la semana</p>
                    </a>
                </div>
            </div>
            <div class="is-flex is-align-content-center is-flex-direction-column is-justify-content-center is-align-items-center">
                <p style="font-size: 1.25rem; color: #00c4a7; font-weight: bold"><strong style="color: #828282">The media catalogue © 2022 <a style="color: #00c4a7" href="https://www.instagram.com/stories/alejandrotmnt/3067018214627297377/">by Alejandro Torres</a> </strong></p>
                <p class="" style="font-size: 0.75rem;">es una página de recomendación de películas y series, y es un medio totalmente independiente donde podés crear tu propia lista y llevar el control de lo que viste y lo que te falta ver.</p>
            </div>

        </footer>


    </div>

    <script src="<?= base_url(ASSET_APP . 'js/navbar.js') ?>"></script>
    <script src="<?= base_url(ASSET_APP . 'js/watchlist.js') ?>"></script>
</body>

</html>