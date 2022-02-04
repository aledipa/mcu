<?php 
    //Starts the session
    session_start();

    //Blocks the user if the tries to add a movie without being logged
    if ($_SESSION["logged"] == FALSE) {
        header('Location: ' . 'http://localhost/mcu');
    }

    $loadedhero = $_GET["loadedhero"];
    $loadedmovie = $_GET["loadedmovie"];
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
    <title>Add Hero</title>
</head>
<body class="addhero">
    <!-- NavBar -->
    <nav class="sticky-top card slimNavbarr">
        <!-- Marvel Logo -->
        <a href="/mcu"><img class="" src="../static/img/elements/MarvelLogo.svg" height="60" /></a>
    </nav>

    <!-- Site content -->
    <div class="mt-5 container-full siteContent">

        <form name="SignupForm" action="../dynamic/php/backend/addhero_backend.php" method="post">

            <div class="signupBox card fade-in pl-5 pr-5 mx-auto">
                <p class="input-label flex-row justify-content-start marvelText largeText azureText mt-4"> Add a Hero </p>

                <div class="row">
                    <div class="column pr-5 mr-5 mt-4 container-full">
                        <?php 
                            //echo $loadedhero;
                        ?>

                        <!-- Name Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon" id="basic-addon1"><img src="../static/img/icons/HeroIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="name" id="name" type="text" placeholder="Iron Man" value="<?php echo $loadedhero ?>" aria-label="name" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Name </p>
                            </div>
                        </div>

                        <!-- Ranking Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/RankIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3 w-75" name="ranking" id="ranking" type="number" min="1" max="10" placeholder="7"  aria-label="ranking" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-4 mt-2"> Power Rankning</p>
                            </div>
                        </div>
                        
                    </div>

                    <div class="column pr-5 mr-5 mt-4 container-full">

                        <!-- Powers Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/PowerIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="power" id="power" type="text" placeholder="Armor" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Powers </p>
                            </div>
                        </div>

                        <!-- Movie Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/FilmIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="movie" id="movie" type="text" value="<?php echo $loadedmovie ?>" placeholder="Iron Man 2 - [Optional]">
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Movie </p>
                            </div>
                        </div>

                        <div class="row flex-row justify-content-end">
                            <p class="mr-3 mt-4 pt-1"> <a class="mediumText marvelText textButton"  href="javascript:history.back();"> Cancel </a> </p>
                            <button class="marvelText redButton register mediumButton pl-1 pr-1 mb-4 mr-3 mt-4 mb-5" type="submit"> Insert </button>
                        </div>

                    </div>
                </div>

                <!-- Confirm Prompt -->
                <div class="row flex-row justify-content-end">
                    <?php 
                        if ($_SESSION["addhero_success"] == 1) {
                            echo '<img class="mt-1 mr-2" src="../static/img/icons/DoneIcon.png" height="20" />';
                            echo '<p class="signPrompt greenText pt-1"> Hero added successfully </p>';
                        }
                    ?> 
                </div>
                
                <!-- Error Prompt -->
                <div class="row flex-row justify-content-end">
                    <?php 
                        if ($_SESSION["addhero_success"] == 0) {
                            echo '<img class="mt-1 mr-2" src="../static/img/icons/ErrorIcon.png" height="20" />';
                            echo '<p class="signPrompt redText pt-1"> Unable to add hero </p>';
                        }
                    ?> 
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>