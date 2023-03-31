<?php

namespace App\Libraries;


class PeopleInfo
{
    public function getPeopleInfo($id)
    {
        $url = "https://api.themoviedb.org/3/person/" . $id . "?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        // dd($movieGenres);

        curl_close($curl);

        return $data;
    }

    public function getPeopleMovies($id)
    {
        $url = "https://api.themoviedb.org/3/person/" . $id . "/movie_credits?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);


        curl_close($curl);

        return $data;
    }

    public function getPeopleTv($id)
    {
        $url = "https://api.themoviedb.org/3/person/" . $id . "/tv_credits?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        // dd($movieGenres);

        curl_close($curl);

        return $data;
    }
}
