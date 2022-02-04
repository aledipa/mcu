<?php
    //Connects to the database
    function connect() {
        $servername = "localhost";
        $username = "root";
        $pwd = "";
        $dbname = "mcu";

        //Connects to the database
        $connection = new mysqli($servername, $username, $pwd, $dbname);

        //Checks the integrity/success of the connection
        if ($connection -> connect_error) {
            die("DB Connection failed :) <3");
        } else {
            return $connection;
        }
    }

  
?>