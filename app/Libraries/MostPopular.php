<?php

namespace App\Libraries;

class MostPopular
{

    public function getMostPopularMovies()
    {
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&page=1";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $mostPopularMovies = $data['results'];

        // dd($mostPopularMovies);

        curl_close($curl);
        return $mostPopularMovies;
    }

    public function getMostPopularTvShows()
    {
        $url = "https://api.themoviedb.org/3/tv/popular?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&page=1";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $mostPopularTvShows = $data['results'];

        // dd($mostPopularMovies);

        curl_close($curl);
        return $mostPopularTvShows;
    }
}
