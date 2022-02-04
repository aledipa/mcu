<?php 
    require_once('../models/movie.php');
    require_once('dbConnApi.php');

    //Starts the session
    session_start();

    if ($_GET["id"] != null) {
        $id = $_GET["id"];
        $id = explode("?", $id)[0];
        $e = movie::loadRow($id);

    } else if($_GET["title"] != null) {
        $title = $_GET["title"];
        $title = explode("?", $title)[0];
        $title = explode("%20", $title)[0] . explode("%20", $title)[1];
        $e = movie::loadRowByTitle($title);

    } else if($_GET["director"] != null) {
        $director = $_GET["director"];
        $director = explode("?", $director)[0];
        $director = explode("%20", $director)[0] . explode("%20", $director)[1];
        $e = movie::loadRowByDirector($director);

    } else if($_GET["hero"] != null) {
        $hero = $_GET["hero"];
        $hero = explode("?", $hero)[0];
        $hero = explode("%20", $hero)[0] . explode("%20", $hero)[1];
        $e = movie::loadRowByHero($hero);

    } else if($_GET["delid"] != null) {
        $delete_id = $_GET["delid"];
        $delete_id = explode("?", $delete_id)[0];
        if ($_SESSION["logged"] == true) {
            $e = movie::deleteRow($delete_id);
        } else {
            $e = false;
        }
    }
    if($_GET["heroesbymovie"] != null) {
        $heroes_by_movie = $_GET["heroesbymovie"];
        $heroes_by_movie = explode("?", $heroes_by_movie)[0];
        $e = movie::loadHeroesByMovie($heroes_by_movie);
    }
    if ($_GET["powersbyhero"] != null) {
        $powersbyhero = $_GET["powersbyhero"];
        $powersbyhero = explode("?", $powersbyhero)[0];
        $e = movie::loadPowers($powersbyhero);
    }

    echo json_encode($e);

?>