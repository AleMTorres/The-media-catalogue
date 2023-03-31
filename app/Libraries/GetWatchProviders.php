<?php

namespace App\Libraries;


class GetWatchProviders
{

    public function getMovieWatchProviders($id)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $id . "/watch/providers?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        // $movieProviders = $data['results']['AR'];

        $movieProviders = [];

        if (isset($data['results']['AR'])) {
            array_push($movieProviders, $data['results']['AR']);
        } elseif (isset($data['results']['US'])) {
            array_push($movieProviders, $data['results']['US']);
        } elseif (isset($data['results']['TW'])) {
            array_push($movieProviders, $data['results']['TW']);
        } else {
            $movieProviders = [];
        }


        curl_close($curl);

        return $movieProviders;
    }

    public function getTvWatchProviders($id)
    {
        $url = "https://api.themoviedb.org/3/tv/" . $id . "/watch/providers?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        $tvProviders = [];

        if (isset($data['results']['AR'])) {
            array_push($tvProviders, $data['results']['AR']);
        } elseif (isset($data['results']['US'])) {
            array_push($tvProviders, $data['results']['US']);
        } elseif (isset($data['results']['TW'])) {
            array_push($tvProviders, $data['results']['TW']);
        } else {
            $tvProviders = [];
        }
        curl_close($curl);

        return $tvProviders;
    }
}
