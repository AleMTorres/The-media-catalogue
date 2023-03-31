<?php

namespace App\Libraries;


class GetSimilar
{

    public function getSimilarMovies($id)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $id . "/similar?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&page=1";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $extractMovies = array_reverse($data['results']);
        $similarMovies = array_slice($extractMovies, 0, 6);


        curl_close($curl);

        return $similarMovies;
    }

    public function getSimilartvShows($id)
    {
        $url = "https://api.themoviedb.org/3/tv/" . $id . "/similar?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&page=1";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $extractTvShows = array_reverse($data['results']);
        $similarTvShows = array_slice($extractTvShows, 0, 6);

        curl_close($curl);

        return $similarTvShows;
    }
}
