<?php 
    //Starts the session
    session_start();

    //Logs out
    $_SESSION["logged"] = false;
    $_SESSION["mail"] = "";
    $_SESSION["username"] = "";

    //Redirects to the home
    header('Location: '. 'http://localhost/mcu');
?>