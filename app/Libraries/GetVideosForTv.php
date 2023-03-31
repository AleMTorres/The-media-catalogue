<?php

namespace App\Libraries;


class GetVideosForTv
{

    public function getVideosForTv($id)
    {
        $url = "https://api.themoviedb.org/3/tv/" . $id . "/videos?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=en-US";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        // dd($data);

        curl_close($curl);

        return $data;
    }
}
