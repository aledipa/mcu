<?php 
    require "../api/dbConnApi.php";
    // require "../api/movieApi.php";

    ini_set("display_errors",1);
    error_reporting(E_ALL);

    //Starts the session
    session_start();

    //Gets the values
    $title = $_POST["title"];
    $date = $_POST["date"];
    $duration = $_POST["duration"];
    $director = $_POST["director"];
    $superhero = $_POST["superhero"];
    

    //Connects to the db
    $connection = connect();

    //SQL query
    $movie_query = "INSERT INTO movies (title, running_time, release_date, director) VALUES ('$title', $duration, '$date', '$director');";

    //TODO
    //Checks if the hero already exists and gets his ID if so
    // $last_movie_id_query = "SELECT MAX(id_movie) FROM movies;"
    // $last_movie_id = $connection -> query($last_movie_id_query);
    // $last_movie_id = $last_movie_id -> fetch_array()[0] ?? '';
    //If the hero does not exists creates a new one and gets his ID
    //Gets the new movie ID and in 'featuring' associates both


    //Executes the query
    if ($_SESSION["logged"] == true) {
        if ($connection -> query($movie_query) == TRUE) {
            //Gets the last movie ID
            $last_movie_id_query = "SELECT MAX(id_movie) FROM movies;";
            $last_movie_id = $connection -> query($last_movie_id_query);
            $last_movie_id = $last_movie_id -> fetch_array()[0] ?? '';

            //Searches the hero's ID in superheroes
            $hero_id_query = "SELECT id_superhero FROM superheroes WHERE name = '$superhero';";
            $hero_id = $connection -> query($hero_id_query);
            $hero_id = $hero_id -> fetch_array()[0] ?? '';

            //Cheks if the hero exists
            if ($hero_id != null) {
                //Adds the new movie and the hero in featuring
                $featuring_query = "INSERT INTO featuring (movie, superhero) VALUES ($last_movie_id, $hero_id)";
                if ($connection -> query($featuring_query) == TRUE) {
                    //Closes the connection to the db
                    $connection -> close();

                    //Save the session data
                    $_SESSION["addmovie_success"] = 1;

                    //Refresh the page
                    header('Location: ' . 'http://localhost/mcu/templates/addmovie.php');
                }
            } else {
                //Creates the new hero
                header('Location: ' . 'http://localhost/mcu/templates/addhero.php?loadedhero=' . $superhero . '&loadedmovie=' . $title);
                
            }

            
        } else {
            // echo "Error creating the account.";
            $_SESSION["addmovie_success"] = 0;
            Header('Location: '. 'http://localhost/mcu/templates/addmovie.php');
        }
    } else {
        Header('Location: '. 'http://localhost/mcu/templates/addmovie.php');
    }
    
    
    

?>