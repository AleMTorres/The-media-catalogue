<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\GetWatchProviders;

class User extends BaseController
{
    public function display_watchlist()
    {
        $user_name = session()->get('user_name');
        $modelUser = new UserModel();
        $watchlist = $modelUser->where('user_name', $user_name)->findAll();


        return view('watchlist', ['data' => $watchlist]);
    }

    public function add_tvShow_to_watchlist($id)
    {
        $modelUser = new UserModel();
        $tvProvidersLibrary = new GetWatchProviders;
        $tvProviders = $tvProvidersLibrary->getTvWatchProviders($id);

        $tvUrl = "https://api.themoviedb.org/3/tv/" . $id . "?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $tvUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $response = curl_exec($curl);
        $tvShow = json_decode($response, true);

        curl_close($curl);

        if (count($tvProviders) == 0) {
            $showData = $modelUser->where('object_id', $id)->first();

            if (isset($showData)) {
                return redirect()->to('watchlist')->with('msg', ['type' => 'warning', 'body' => 'Este show ya se encuentra en tu watchlist']);
            } else {
                $movie_id = $tvShow['id'];
                $title = $tvShow['name'];
                $image = "https://image.tmdb.org/t/p/w300" . $tvShow['poster_path'];
                $year = " (" . substr($tvShow['first_air_date'], 0, -6) . ")";
                $provider_link = "";
                $provider_logo = base_url('images/providers/no-provider.png');
                $user_name = session()->get('user_name');

                $query = [
                    'object_id'     => $movie_id,
                    'type'          => "tv",
                    'title'         => $title,
                    'image'         => $image,
                    'year'          => $year,
                    'provider_link' => $provider_link,
                    'provider_logo' => $provider_logo,
                    'user_name'     => $user_name
                ];
                $modelUser->insert($query);

                return redirect()->to('watchlist')->with('msg', ['type' => 'primary', 'body' => 'Agregado exitoxamente a tu watchlist']);
            }
        } elseif (count($tvProviders) > 1) {
            $showData = $modelUser->where('object_id', $id)->first();

            if (isset($showData)) {
                return redirect()->to('watchlist')->with('msg', ['type' => 'warning', 'body' => 'Este show ya se encuentra en tu watchlist']);
            } else {
                $movie_id = $tvShow['id'];
                $title = $tvShow['name'];
                $image = "https://image.tmdb.org/t/p/w300" . $tvShow['poster_path'];
                $year = " (" . substr($tvShow['first_air_date'], 0, -6) . ")";
                $provider_link = $tvProviders[0]['link'];
                $provider_logo = "https://image.tmdb.org/t/p/w500" . $tvProviders[0]['flatrate'][0]['logo_path'];
                $user_name = session()->get('user_name');

                $query = [
                    'object_id'     => $movie_id,
                    'type'          => "tv",
                    'title'         => $title,
                    'image'         => $image,
                    'year'          => $year,
                    'provider_link' => $provider_link,
                    'provider_logo' => $provider_logo,
                    'user_name'     => $user_name
                ];
                $modelUser->insert($query);

                return redirect()->to('watchlist')->with('msg', ['type' => 'primary', 'body' => 'Agregado exitoxamente a tu watchlist']);
            }
        } else {
            $showData = $modelUser->where('object_id', $id)->first();

            if (isset($showData)) {
                return redirect()->to('watchlist')->with('msg', ['type' => 'warning', 'body' => 'Este show ya se encuentra en tu watchlist']);
            } else {
                $tv_id = $tvShow['id'];
                $title = $tvShow['name'];
                $image = "https://image.tmdb.org/t/p/w300" . $tvShow['poster_path'];
                $year = " (" . substr($tvShow['first_air_date'], 0, -6) . ")";
                $provider_link = $tvProviders[0]['link'];
                $provider_logo = "https://image.tmdb.org/t/p/w500" . $tvProviders[0]['flatrate'][0]['logo_path'];
                $user_name = session()->get('user_name');

                $query = [
                    'object_id'     => $tv_id,
                    'type'          => "tv",
                    'title'         => $title,
                    'image'         => $image,
                    'year'          => $year,
                    'provider_link' => $provider_link,
                    'provider_logo' => $provider_logo,
                    'user_name'     => $user_name
                ];
                $modelUser->insert($query);

                return redirect()->to('watchlist')->with('msg', ['type' => 'primary', 'body' => 'Agregado exitoxamente a tu watchlist']);
            }
        }
    }

    public function add_movie_to_watchlist($id)
    {
        $modelUser = new UserModel();
        $moviesProvidersLibrary = new GetWatchProviders;
        $moviesProviders = $moviesProvidersLibrary->getMovieWatchProviders($id);

        $movieUrl = "https://api.themoviedb.org/3/movie/" . $id . "?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $movieUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $response = curl_exec($curl);
        $movie = json_decode($response, true);

        curl_close($curl);


        if (count($moviesProviders) == 0) {
            $showData = $modelUser->where('object_id', $id)->first();

            if (isset($showData)) {
                return redirect()->to('watchlist')->with('msg', ['type' => 'warning', 'body' => 'Este show ya se encuentra en tu watchlist']);
            } else {
                $movie_id = $movie['id'];
                $title = $movie['title'];
                $image = "https://image.tmdb.org/t/p/w300" . $movie['poster_path'];
                $year = " (" . substr($movie['release_date'], 0, -6) . ")";
                $provider_link = "";
                $provider_logo = base_url('images/providers/no-provider.png');
                $user_name = session()->get('user_name');

                $query = [
                    'object_id'     => $movie_id,
                    'type'          => "movie",
                    'title'         => $title,
                    'image'         => $image,
                    'year'          => $year,
                    'provider_link' => $provider_link,
                    'provider_logo' => $provider_logo,
                    'user_name'     => $user_name
                ];
                $modelUser->insert($query);

                return redirect()->to('watchlist')->with('msg', ['type' => 'primary', 'body' => 'Agregado exitoxamente a tu watchlist']);
            }
        } elseif (count($moviesProviders) >= 1) {
            $showData = $modelUser->where('object_id', $id)->first();

            if (isset($showData)) {
                return redirect()->to('watchlist')->with('msg', ['type' => 'warning', 'body' => 'Este show ya se encuentra en tu watchlist']);
            } else {
                $movie_id = $movie['id'];
                $title = $movie['title'];
                $image = "https://image.tmdb.org/t/p/w300" . $movie['poster_path'];
                $year = " (" . substr($movie['release_date'], 0, -6) . ")";
                $provider_link = $moviesProviders[0]['link'];
                $user_name = session()->get('user_name');
                if (isset($moviesProviders[0]['flatrate'])) {
                    $provider_logo = "https://image.tmdb.org/t/p/w500" . $moviesProviders[0]['flatrate'][0]['logo_path'];
                } elseif (isset($moviesProviders[0]['buy'])) {
                    $provider_logo = "https://image.tmdb.org/t/p/w500" . $moviesProviders[0]['buy'][0]['logo_path'];
                } elseif (isset($moviesProviders[0]['rent'])) {
                    $provider_logo = "https://image.tmdb.org/t/p/w500" . $moviesProviders[0]['rent'][0]['logo_path'];
                } elseif (isset($moviesProviders[0]['rent'])) {
                    $provider_logo = "https://image.tmdb.org/t/p/w500" . $moviesProviders[0]['ads'][0]['logo_path'];
                } else {
                    $provider_logo = "";
                }

                $query = [
                    'object_id'     => $movie_id,
                    'type'          => "movie",
                    'title'         => $title,
                    'image'         => $image,
                    'year'          => $year,
                    'provider_link' => $provider_link,
                    'provider_logo' => $provider_logo,
                    'user_name'     => $user_name
                ];
                $modelUser->insert($query);

                return redirect()->to('watchlist')->with('msg', ['type' => 'primary', 'body' => 'Agregado exitoxamente a tu watchlist']);
            }
        } else {
            $showData = $modelUser->where('object_id', $id)->first();

            if (isset($showData)) {
                return redirect()->to('watchlist')->with('msg', ['type' => 'warning', 'body' => 'Este show ya se encuentra en tu watchlist']);
            } else {
                $movie_id = $movie['id'];
                $title = $movie['title'];
                $image = "https://image.tmdb.org/t/p/w300" . $movie['poster_path'];
                $year = " (" . substr($movie['release_date'], 0, -6) . ")";
                $provider_link = $moviesProviders[0]['link'];
                $provider_logo = "https://image.tmdb.org/t/p/w500" . $moviesProviders[0]['flatrate'][0]['logo_path'];
                $user_name = session()->get('user_name');

                $query = [
                    'object_id'     => $movie_id,
                    'type'          => "movie",
                    'title'         => $title,
                    'image'         => $image,
                    'year'          => $year,
                    'provider_link' => $provider_link,
                    'provider_logo' => $provider_logo,
                    'user_name'     => $user_name
                ];
                $modelUser->insert($query);

                return redirect()->to('watchlist')->with('msg', ['type' => 'primary', 'body' => 'Agregado exitoxamente a tu watchlist']);
            }
        }
    }

    public function delete_from_watchlist($id)
    {
        $modelUser = new UserModel();

        // $data = $modelUser->where('object_id', $id)->first();
        // dd($data);
        $modelUser->where('object_id', $id);
        $modelUser->delete();

        // $modelUser->delete(['object_id' => $id]);

        if ($modelUser->where('object_id', $id)->first()) {
            return redirect()->route('watchlist')->with('msg', ['type' => 'danger', 'body' => 'No se pudo borrar el show']);
        } else {
            return redirect()->route('watchlist')->with('msg', ['type' => 'success', 'body' => 'Show borrado de tu watchlist']);
        }
    }
};
