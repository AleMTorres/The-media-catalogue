<?php

namespace App\Libraries;


class GetCredits
{

    public function getCreditMovies($id)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $id . "/credits?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        $castMovie = array_slice($data['cast'], 0, 8);
        $movieDirector = [];
        $movieWriter = [];

        // dd($data['crew']);

        foreach ($data['crew'] as $director) {
            if ($director['job'] == 'Director') {
                $movieDirector = $director;
            }
        }
        foreach ($data['crew'] as $writer) {
            if ($writer['job'] == 'Writer' || $writer['job'] == 'Story' || $writer['job'] == 'Screenplay') {
                array_push($movieWriter, $writer);
            }
        }

        curl_close($curl);

        return [$castMovie, $movieDirector, $movieWriter];
    }

    public function getCreditTvShows($id)
    {
        $url = "https://api.themoviedb.org/3/tv/" . $id . "/credits?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        curl_close($curl);

        $tvCast = array_slice($data['cast'], 0, 8);
        $crew = array_slice($data['crew'], 0, 6);

        return [$tvCast, $crew];
    }
}
