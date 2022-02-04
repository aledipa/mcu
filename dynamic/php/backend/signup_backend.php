<?php 
    require "../api/dbConnApi.php";

    //Starts the session
    session_start();

    //Gets the values
    $mail = $_POST['mail'];
    $username = $_POST['name'];
    $password = $_POST['password'];
    $confirmed_password = $_POST['password_confirm'];

    //Connects to the db
    $connection = connect();

    //Saves the new user
    if ($password == $confirmed_password) {
        //Hashes the password
        $password = PASSWORD_HASH($password, PASSWORD_DEFAULT);
        //SQL query
        $account_query = "INSERT INTO account (mail, username, passwd) VALUES ('$mail', '$username', '$password');";

        //Executes the query
        if ($connection -> query($account_query) == TRUE) {
            //Closes the connection to the db
            $connection -> close();

            //Save the session data
            $_SESSION["logged"] = true;
            $_SESSION["signup_success"] = true;
            $_SESSION["mail"] = $mail;
            $_SESSION["username"] = $username;

            //returns to the homepage
            header('Location: ' . 'http://localhost/mcu');
        } else {
            // echo "Error creating the account.";
            $_SESSION["signup_success"] = false;
            $_SESSION["error"] = "Error creating the account";
            Header('Location: '. 'http://localhost/mcu/templates/signup.php');

        }
    } else {
        // echo "Password mismatch";
        $_SESSION["signup_success"] = false;
        $_SESSION["error"] = "Password mismatch";
        Header('Location: '. 'http://localhost/mcu/templates/signup.php');
    }
    
?>