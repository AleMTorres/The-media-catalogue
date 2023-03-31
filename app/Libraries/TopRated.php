<?php

namespace App\Libraries;


class TopRated
{

    public function getTopRatedMovies()
    {
        $url = "https://api.themoviedb.org/3/movie/top_rated?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&page=1";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $topRatedMovies = $data['results'];

        // dd($topRatedMovies);

        curl_close($curl);

        return $topRatedMovies;
    }

    public function getTopRatedTvShows()
    {
        $url = "https://api.themoviedb.org/3/tv/top_rated?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&page=1";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $topRatedTvShows = $data['results'];

        // dd($topRatedTvShows);

        curl_close($curl);

        return $topRatedTvShows;
    }
}
