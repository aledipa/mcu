<?php 
    require "../api/dbConnApi.php";

    // ini_set("display_errors",1);
    // error_reporting(E_ALL);

    //Starts the session
    session_start();

    //Gets the values
    $name = $_POST["name"];
    $ranking = $_POST["ranking"];
    $power = $_POST["power"];
    $movie = $_POST["movie"];
    

    //Connects to the db
    $connection = connect();

    //SQL query
    $hero_query = "INSERT INTO superheroes (name, powers, power_ranking) VALUES ('$name', '$power', '$ranking');";

    //Executes the query
    if ($_SESSION["logged"] == true) {
        if ($connection -> query($hero_query) == TRUE) {
            //Gets the last hero ID
            $last_hero_id_query = "SELECT MAX(id_superhero) FROM superheroes;";
            $last_hero_id = $connection -> query($last_hero_id_query);
            $last_hero_id = $last_hero_id -> fetch_array()[0] ?? '';

            if (strlen($movie) > 0) {
                //Searches the movie's ID in movies
                $movie_id_query = "SELECT id_movie FROM movies WHERE title = '$movie';";
                $movie_id = $connection -> query($movie_id_query);
                $movie_id = $movie_id -> fetch_array()[0] ?? '';

                //Cheks if the hero exists
                if ($movie_id != null) {
                    //Adds the new movie and the hero in featuring
                    $featuring_query = "INSERT INTO featuring (movie, superhero) VALUES ($movie_id, $last_hero_id)";
                    if ($connection -> query($featuring_query) == TRUE) {
                        //Closes the connection to the db
                        $connection -> close();

                        //Save the session data
                        $_SESSION["addhero_success"] = 1;

                        //Refresh the page
                        header('Location: ' . 'http://localhost/mcu/templates/addhero.php');
                    }
                } else {
                    //Creates the new movie
                    header('Location: ' . 'http://localhost/mcu/templates/addmovie.php?loadedmovie=' . $movie . '&loadedhero=' . $name);
                }
            } else {
                //Refresh the page
                header('Location: ' . 'http://localhost/mcu/templates/addhero.php');
            }
            
        } else {
            // echo "Error creating the account.";
            $_SESSION["addhero_success"] = 0;
            Header('Location: '. 'http://localhost/mcu/templates/addhero.php');
        }
    } else {
        $_SESSION["addhero_success"] = 1;
        Header('Location: '. 'http://localhost/mcu/templates/addhero.php');
    }
    
    
    

?>