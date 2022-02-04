<?php 
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);

    // require_once(__DIR__ . "/../API/dbConnAPI.php");
    require 'dbConnApi.php';


    class Movie {
        //Initializes the movies data/columns
        var $id_movie;
        var $title;
        var $running_time;
        var $release_date;
        var $director;


        public function save() {
            //Connects to DB
            $connection = connect();

            //Defines the query with the movies' parameters
            $save_query = "INSERT INTO movies(title, running_time, release_date, director)
                           VALUES ('$this->$title', '$this->$running_time', '$this->$release_date', '$this->$director');";
            
            //Returns how the query process ended
            return $connection -> query($save_query);
        }


        public function delete() {
            $delete_query = "DELETE FROM movies WHERE id_movie = $this->$id_movie;";

            $connection = connect();

            return $connection -> query($delete_query);
        }

        public static function deleteRow($del_id_in) {
            $deleterow_query = "DELETE FROM movies WHERE id_movie = $del_id_in";

            $connection = connect();

            return $connection -> query($deleterow_query);
        }

        public static function loadRowByTitle($title) {
            $load_query = "SELECT * FROM movies WHERE title='$title';";
            $response = movie::execQuery($load_query);

            if (count($response) > 0) {
                return $response;
            }
        }

        public static function loadRow($id_in) {
            $load_query = "SELECT * FROM movies WHERE id_movie=$id_in;";
            $response = movie::execQuery($load_query);

            if (count($response) > 0) {
                return $response;
            }
        }

        public static function loadRowByHero($hero) {
            $connection = connect();

            // //Gets the hero's ID
            $hero_id_query = "SELECT id_superhero FROM superheroes WHERE name='$hero';";
            $hero_id = $connection -> query($hero_id_query);
            $hero_id = $hero_id->fetch_array()[0] ?? '';
            // //Gets the associated movies' id
            $movie_ids_query = "SELECT movie FROM featuring WHERE superhero=$hero_id;";
            $movie_ids = $connection -> query($movie_ids_query);
            $movie_ids_array = Array();
            while ($row = $movie_ids -> fetch_assoc()) {
                $movie_ids_array[] = $row['movie'];
            }
            //Gets the movies in which there's the hero
            $response = Array();
            for ($i=0; $i<count($movie_ids_array); $i++) {
                $response[] = movie::loadRow($movie_ids_array[$i]);
            }

            if (count($response) > 0) {
                return $response;
            }
        }

        public static function loadRowByDirector($director) {
            $load_query = "SELECT * FROM movies WHERE director='$director';";
            $response = movie::execQuery($load_query);

            if (count($response) > 0) {
                return $response;
            }
        }

        public static function loadHeroesByMovie($movie) {
            $connection = connect();

            //Gets the movie's ID
            $movie_id_query = "SELECT id_movie FROM movies WHERE title='$movie';";
            $movie_id = $connection -> query($movie_id_query);
            $movie_id = $movie_id -> fetch_array()[0] ?? '';

            //Gets the IDs of the superheroes in it
            $heroes_ids_query = "SELECT superhero FROM featuring WHERE movie=$movie_id;";
            $heroes_ids = $connection -> query($heroes_ids_query);
            $ids = Array();
            while ($row = $heroes_ids -> fetch_array()) {
                $ids[] = $row['superhero'];
            }

            //Gets the names of the superheroes by their ID
            $heroes = Array();
            for ($i=0; $i<count($ids); $i++) {
                $current_id = $ids[$i];
                $hero_query = "SELECT name FROM superheroes WHERE id_superhero = $current_id";
                $hero = $connection -> query($hero_query);
                $heroes[] = $hero -> fetch_array()[0] ?? '';
            }

            return $heroes;
        }

        public static function loadPowers($hero) {
            $connection = connect();

            //Gets the hero's superpower
            $powers_query = "SELECT powers FROM superheroes WHERE name = '$hero';";
            $powers = $connection -> query($powers_query);
            $powers = $powers -> fetch_array()[0] ?? '';
            
            //Gets the hero's rankning
            $rank_query = "SELECT power_ranking FROM superheroes WHERE name = '$hero';";
            $rank = $connection -> query($rank_query);
            $rank = $rank -> fetch_array()[0] ?? '';

            //Wraps the data
            $hero_powers = Array();
            $hero_powers[] = $powers;
            $hero_powers[] = $rank;

            return $hero_powers;
        }

        public static function getAllMovies() {
            $load_all_query = "SELECT * FROM movies";
            $response = movie::execQuery($load_query);

            return $response;
        }

        private static function execQuery($load_query) {
            $connection = connect();
            $response = $connection -> query($load_query);
            // $response = $response -> fetch_assoc();
            $movies = array();

            while($row = $response->fetch_array()) {
                $mov = new Movie();

                $mov -> id_movie = $row["id_movie"];
                $mov -> title = $row["title"];
                $mov -> running_time = $row["running_time"];
                $mov -> release_date = $row["release_date"];
                $mov -> director = $row["director"];

                $movies[] = $mov;
            }

            return $movies;
        }
    }

?>