<?php

namespace App\Libraries;


class TrendingMovies
{

    public function getTrendingMovies()
    {
        $url = "https://api.themoviedb.org/3/trending/movie/day?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $trendingMovies = $data['results'];

        // dd($trendingMovies);

        curl_close($curl);

        return $trendingMovies;
    }
}
