<?php 
    //Starts the session
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" href="../static/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Marvel" /><link rel='stylesheet' href='//fonts.googleapis.com/css?family=Lato' type='text/css' />
    <link rel="icon" href="/mcu/static/img/icons/FavIcon.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Registration</title>
</head>
<body class="access">
    <!-- NavBar -->
    <nav class="sticky-top card slimNavbar">
        <!-- Marvel Logo -->
        <a href="/mcu"><img src="../static/img/elements/MarvelLogo.svg" height="60" /></a>
    </nav>

    <!-- Site content -->
    <div class="mt-5 container-full siteContent">

        <form name="SignupForm" action="../dynamic/php/backend/signup_backend.php" method="post">

            <div class="signupBox card fade-in pl-5 pr-5 mx-auto">
                <p class="input-label flex-row justify-content-start marvelText largeText azureText mt-4"> Create a new account </p>

                <div class="row">
                    <div class="column pr-5 mr-5 mt-4 container-full">

                        <!-- eMail Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon" id="basic-addon1"><img src="../static/img/icons/EmailIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="mail" id="mail" type="mail" placeholder="Enter mail..."  aria-label="Email" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Email </p>
                            </div>
                        </div>


                        <!-- Name Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/UsernameIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3"  name="name" id="name" type="text" placeholder="Enter name..." required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Username </p>
                            </div>
                        </div>
                    </div>

                    <div class="column pr-5 mr-5 mt-4 container-full">

                        <!-- Password Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/PasswordIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3"  name="password" id="password" type="password" placeholder="Enter password..." required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <?php 
                                    if ($_SESSION["signup_success"] == FALSE) { ?>
                                        <p class="marvelText mediumText redText mr-3 mt-2"> Password </p>
                                <?php 
                                    } else { ?>
                                        <p class="marvelText mediumText azureLabel mr-3 mt-2"> Password </p>
                                <?php 
                                    } ?>
                                </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/ConfirmPasswordIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="password_confirm" id="password_confirm" type="password" placeholder="Confirm password..." required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <?php 
                                    if ($_SESSION["signup_success"] == FALSE) { ?>
                                        <p class="marvelText mediumText redText mr-3 mt-2"> Confirm Password </p>
                                <?php 
                                    } else { ?>
                                        <p class="marvelText mediumText azureLabel mr-3 mt-2"> Confirm Password </p>
                                <?php 
                                    } ?>
                                <!-- </div> -->
                                <!-- <p class="marvelText mediumText azureLabel mr-3 mt-2"> Confirm Password </p> -->
                            </div>
                        </div>

                        <div class="row flex-row justify-content-end">
                            <p class="mr-3 mt-4 pt-1"> <a class="mediumText marvelText textButton"  href="javascript:history.back();"> Cancel </a> </p>
                            <button class="marvelText redButton register mediumButton pl-1 pr-1 mb-4 mr-3 mt-4" type="submit"> Register </button>
                        </div>

                        <!-- Prompt -->
                        <div class="row  flex-row justify-content-end">
                            <p class="signPrompt azureText pt-1"> Already registered? <a class="textButton azureDarkText" href="login.php">Login</a>. </p>
                        </div>

                    </div>
                    <!-- Error Prompt -->
                    <div class="row  flex-row justify-content-end">
                        <?php 
                            if ($_SESSION["signup_success"] == FALSE) {
                                echo '<img class="mt-1 mr-2" src="../static/img/icons/ErrorIcon.png" height="20" />';
                                echo '<p class="signPrompt redText pt-1"> ' . $_SESSION["error"] . ' </p>';
                            }
                        ?> 
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>