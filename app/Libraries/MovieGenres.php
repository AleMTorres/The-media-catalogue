<?php

namespace App\Libraries;


class MovieGenres
{

    public function getMovieGenres()
    {
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $movieGenres = $data['genres'];

        // dd($movieGenres);

        curl_close($curl);

        return view('templates/navbar_footer', ['movieGenres' => $movieGenres]);
    }
}
