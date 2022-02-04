<?php 
    require "../api/dbConnApi.php";

    //Starts the session
    session_start();

    //Gets the values
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    //Connects to the db
    $connection = connect();

    //SQL query to get given account
    $account_query = "SELECT * FROM account WHERE mail= '$mail';";

    //Checks if the account exists
    $account_data = $connection -> query($account_query);
    if ($account_data == TRUE) {
        $account_data_array = $account_data -> fetch_assoc();
        $account_mail = $account_data_array['mail'];
        $account_password = $account_data_array['passwd'];
        $account_username = $account_data_array['username'];

        if (password_verify($password, $account_password)) {
            $_SESSION["login_success"] = true;
            $_SESSION["logged"] = true;
            $_SESSION["mail"] = $mail;
            $_SESSION["username"] = $account_username;

            header('Location: '. 'http://localhost/mcu');
        } else {
            $_SESSION["login_success"] = false;
            $_SESSION["error"] = "Wrong mail or password";
            echo "wrong mail or password";
            header('Location: '. 'http://localhost/mcu/templates/login.php');
        }
    } else {
        echo "email not found.";
        $_SESSION["login_success"] = false;
        $_SESSION["error"] = "Email not found";
        header('Location: '. 'http://localhost/mcu/templates/login.php');
    }
    
?>