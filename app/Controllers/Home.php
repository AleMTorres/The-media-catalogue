<?php

namespace App\Controllers;

use App\Libraries\TopRated;
use App\Libraries\MostPopular;
use App\Libraries\WeekTrending;
use App\Libraries\TrendingMovies;
use App\Libraries\GetVideosForMovies;
use App\Libraries\GetVideosForTv;
use App\Libraries\GetWatchProviders;
use App\Libraries\GetSimilar;
use App\Libraries\GetCredits;
use App\Libraries\PeopleInfo;



function array_sort_by(&$arrIni, $vote_average, $order = SORT_DESC)
{
    $arrAux = array();
    foreach ($arrIni as $average => $row) {
        $arrAux[$average] = is_object($row) ? $arrAux[$average] = $row->$vote_average : $row[$vote_average];
        $arrAux[$average] = strtolower($arrAux[$average]);
    }
    array_multisort($arrAux, $order, $arrIni);
    return $arrIni;
}

function delete_repeat_array($arr)
{
    $sortedArray = array_sort_by($arr, 'id');
    $uniqueArray = [];

    for ($i = 1; $i < count($sortedArray); $i++) {
        if ($sortedArray[$i]['id'] != $sortedArray[$i - 1]['id']) {
            array_push($uniqueArray, $sortedArray[$i]);
        }
    }

    return $uniqueArray;
}

class Home extends BaseController
{
    public function index()
    {

        $mostPopularMoviesLibrary = new MostPopular;
        $getMostPopularMovies = $mostPopularMoviesLibrary->getMostPopularMovies();
        $getMostPopularTvShows = $mostPopularMoviesLibrary->getMostPopularTvShows();

        $allMostPopular = [];

        foreach ($getMostPopularMovies as $popularMovies) {
            if ($popularMovies['original_language'] != 'hi') {
                if (is_null($popularMovies['poster_path'])) {
                    unset($popularMovies);
                } else {
                    array_push($allMostPopular, $popularMovies);
                }
            }
        }
        foreach ($getMostPopularTvShows as $popularTvShows) {
            if ($popularTvShows['original_language'] != 'hi') {
                if (is_null($popularTvShows['poster_path'])) {
                    unset($popularTvShows);
                } else {
                    array_push($allMostPopular, $popularTvShows);
                }
            }
        }


        $allTheMostPopular = array_sort_by($allMostPopular, 'vote_average');
        $theMostPopularShows = array_slice($allTheMostPopular, 0, 36);

        // dd($theMostPopularShows);


        return view('index', ['allMostPopular' => $theMostPopularShows]);
    }

    public function popular_movies()
    {
        $mostPopularMoviesLibrary = new MostPopular;
        $mostPopularMovies = $mostPopularMoviesLibrary->getMostPopularMovies();
        $mostPopularMoviesSorted = array_sort_by($mostPopularMovies, 'vote_average');

        return view('popular_movies', ['mostPopularMovies' => $mostPopularMoviesSorted]);
    }

    public function top_rated_movies()
    {
        $topRatedibrary = new TopRated;
        $getTopRatedMovies = $topRatedibrary->getTopRatedMovies();
        $topRatedMovies = array_sort_by($getTopRatedMovies, 'vote_average');


        return view('top_rated_movies', ['getTopRatedMovies' => $topRatedMovies]);
    }

    public function trending_movies()
    {
        $trendingMoviesLibrary = new TrendingMovies;
        $getTrendingMovies = $trendingMoviesLibrary->getTrendingMovies();
        $trendingMovies = array_sort_by($getTrendingMovies, 'vote_average');

        return view('trending_movies', ['trendingMovies' => $trendingMovies]);
    }

    public function movie_info($id)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $id . "?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        curl_close($curl);

        if (count($data) <= 3) {
            return redirect()->back()->with('msg', ['type' => 'danger', 'body' => 'La información no está disponible']);
        } else {
            $moviesCreditsLibrary = new GetCredits;
            $creditMovie = $moviesCreditsLibrary->getCreditMovies($id);

            $moviesSimilarLibrary = new GetSimilar;
            $similarMovies = $moviesSimilarLibrary->getSimilarMovies($id);

            $moviesProvidersLibrary = new GetWatchProviders;
            $moviesProviders = $moviesProvidersLibrary->getMovieWatchProviders($id);

            $moviesVideosLibrary = new GetVideosForMovies;
            $getVideosForMovies = $moviesVideosLibrary->getVideosForMovies($id);
            $trailerMovie = [];

            if (count($getVideosForMovies['results']) <= 0) {
                foreach ($getVideosForMovies['results'] as $trailer) {
                    if ($trailer['type'] == 'Trailer')
                        array_push($trailerMovie, $trailer);
                }
            } else {
                $trailerMovie = $getVideosForMovies['results'];
            }

            return view('media_info', ['data' => $data, 'video' => $trailerMovie, 'providers' => $moviesProviders, 'similarMovies' => $similarMovies, 'creditMovie' => $creditMovie]);
        }
    }

    public function popular_tv_shows()
    {
        $mostPopularLibrary = new MostPopular;
        $getMostPopularTvShows = $mostPopularLibrary->getMostPopularTvShows();
        $allPopularTvShows = [];

        foreach ($getMostPopularTvShows as $popularTvShows) {
            if ($popularTvShows['original_language'] != 'hi' && $popularTvShows['original_language'] != 'tl' && $popularTvShows['original_language'] != 'ar' && $popularTvShows['original_language'] != 'el') {
                array_push($allPopularTvShows, $popularTvShows);
            }
        }

        $popularTvShows = array_sort_by($allPopularTvShows, 'vote_average');
        // dd($popularTvShows);

        return view('popular_tv_shows', ['mostPopularTvShows' => $popularTvShows]);
    }


    public function top_rated_tv_shows()
    {
        $topRatedLibrary = new TopRated;
        $getTopRatedTvShows = $topRatedLibrary->getTopRatedTvShows();
        $topRatedTvShows = array_sort_by($getTopRatedTvShows, 'vote_average');
        // dd($getTopRatedTvShows);

        return view('best_rated_tv_shows', ['getTopRatedTvShows' => $topRatedTvShows]);
    }

    public function week_trending()
    {
        $weekTrendingLibrary = new WeekTrending;
        $weekTrending = $weekTrendingLibrary->getWeekTrending();
        $allWeekTrending = array_sort_by($weekTrending, 'vote_average');

        // dd($weekTrending);

        return view('week_trending', ['weekTrending' => $allWeekTrending]);
    }

    public function tv_show_info($id)
    {
        $moviesCreditsLibrary = new GetCredits;
        $creditTvShow = $moviesCreditsLibrary->getCreditTvShows($id);

        // dd($creditTvShow);

        $moviesSimilarLibrary = new GetSimilar;
        $similarTvShows = $moviesSimilarLibrary->getSimilartvShows($id);

        $tvProvidersLibrary = new GetWatchProviders;
        $tvProviders = $tvProvidersLibrary->getTvWatchProviders($id);

        $tvVideosLibrary = new GetVideosForTv;
        $getVideosForTv = $tvVideosLibrary->getVideosForTv($id);
        $trailerTv = [];

        // dd($getVideosForTv);

        if (count($getVideosForTv['results']) > 1) {
            foreach ($getVideosForTv['results'] as $trailer) {
                if ($trailer['type'] == 'Trailer')
                    array_push($trailerTv, $trailer);
            }
        } elseif ($getVideosForTv['results'] == '') {
            $trailerTv = [];
        } else {
            $trailerTv = $getVideosForTv['results'];
        }

        // dd($trailerTv);

        $url = "https://api.themoviedb.org/3/tv/" . $id . "?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        // dd($data);

        curl_close($curl);

        return view('media_info', ['data' => $data, 'video' => $trailerTv, 'providers' => $tvProviders, 'similarTvShows' => $similarTvShows, 'creditTvShow' => $creditTvShow]);
    }

    public function search()
    {
        $search = $_POST['search'];
        $userSearch = str_replace(' ', '%20', $search);

        // dd($userSearch);

        $url = "https://api.themoviedb.org/3/search/multi?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&query=" . $userSearch . "&page=1&include_adult=false";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $results = [];


        if ($data['total_results'] <= 0) {
            return redirect()->to(base_url())->with('msg', ['type' => 'primary', 'body' => 'No se encontraron resultados para la búsqueda']);
        } else {
            foreach ($data['results'] as $result) {
                if ($result['media_type'] == "tv" || $result['media_type'] == "movie") {
                    array_push($results, $result);
                }
            }
        }

        curl_close($curl);

        return view('search_results', ['results' => $results]);
    }

    public function search_results($search)
    {
        $search = $this->request->getVar('search');
        $userSearch = str_replace(' ', '%20', $search);

        // dd($userSearch);

        $url = "https://api.themoviedb.org/3/search/multi?api_key=ece2ff8d19e8f3af2b7a24679d0f8ea4&language=es-AR&query=" . $userSearch . "&page=1&include_adult=false";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        $results = [];


        if ($data['total_results'] <= 0) {
            return redirect()->to(base_url())->with('msg', ['type' => 'primary', 'body' => 'No se encontraron resultados para la búsqueda']);
        } else {
            foreach ($data['results'] as $result) {
                if ($result['media_type'] == "tv" || $result['media_type'] == "movie") {
                    if (count($result['genre_ids']) <= 0 || is_null($result['poster_path'])) {
                        unset($result);
                    } else {
                        array_push($results, $result);
                    }
                }
            }
        }

        curl_close($curl);

        return view('search_results', ['results' => $results]);
    }

    public function people_info($id)
    {
        $peopleLibrary = new PeopleInfo;
        $peopleInfo = $peopleLibrary->getPeopleInfo($id);
        $peopleMovies = $peopleLibrary->getPeopleMovies($id);
        $peopleTv = $peopleLibrary->getPeopleTv($id);

        $peopleShows = [];
        foreach ($peopleMovies as $role) {
            if (is_array($role)) {
                foreach ($role as $movie) {
                    if (is_null($movie['poster_path'])) {
                        unset($movie);
                    } else {
                        array_push($peopleShows, $movie);
                    }
                }
            }
        }
        foreach ($peopleTv as $role) {
            if (is_array($role)) {
                foreach ($role as $tv) {
                    if (is_null($tv['poster_path'])) {
                        unset($movie);
                    } else {
                        array_push($peopleShows, $tv);
                    }
                }
            }
        }

        $peopleShowUnique = delete_repeat_array($peopleShows);

        return view('people_info', ['peopleInfo' => $peopleInfo, 'peopleShows' => $peopleShowUnique]);
    }
};
