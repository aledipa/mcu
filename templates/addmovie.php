<?php 
    //Starts the session
    session_start();

    //Blocks the user if the tries to add a movie without being logged
    if ($_SESSION["logged"] == FALSE) {
        header('Location: ' . 'http://localhost/mcu');
    }

    $loadedmovie = $_GET["loadedmovie"];
    $loadedhero = $_GET["loadedhero"];
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
    <title>Add Movie</title>
</head>
<body class="addmovie">
    <!-- NavBar -->
    <nav class="sticky-top card slimNavbarr">
        <!-- Marvel Logo -->
        <a href="/mcu"><img class="" src="../static/img/elements/MarvelLogo.svg" height="60" /></a>
    </nav>

    <!-- Site content -->
    <div class="mt-5 container-full siteContent">

        <form name="SignupForm" action="../dynamic/php/backend/addmovie_backend.php" method="post">

            <div class="signupBox card fade-in pl-5 pr-5 mx-auto">
                <p class="input-label flex-row justify-content-start marvelText largeText azureText mt-4"> Add a Movie </p>

                <div class="row">
                    <div class="column pr-5 mr-5 mt-4 container-full">

                        <!-- Title Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon" id="basic-addon1"><img src="../static/img/icons/TitleIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="title" id="title" type="text" value="<?php echo $loadedmovie; ?>" placeholder="Iron Man 2"  aria-label="Title" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Title </p>
                            </div>
                        </div>


                        <!-- Date Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/DateIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="date" id="date" type="date"  aria-label="Date" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-4 mt-2"> Date </p>
                            </div>
                        </div>

                        <!-- Time Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/TimeIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="duration" id="duration" type="number" placeholder="126"  aria-label="Duration" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-4 mt-2"> Duration (Mins)</p>
                            </div>
                        </div>
                    </div>

                    <div class="column pr-5 mr-5 mt-4 container-full">

                        <!-- Director Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/DirectorIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3"  name="director" id="director" type="text" placeholder="Jon Favreau" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> Director </p>
                            </div>
                        </div>

                        <!-- Hero Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/HeroIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3" name="superhero" id="superhero" type="text" value="<?php echo $loadedhero; ?>" placeholder="Iron Man" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end">
                                <p class="marvelText mediumText azureLabel mr-3 mt-2"> SuperHero </p>
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
                        if ($_SESSION["addmovie_success"] == 1) {
                            echo '<img class="mt-1 mr-2" src="../static/img/icons/DoneIcon.png" height="20" />';
                            echo '<p class="signPrompt greenText pt-1"> Movie added successfully </p>';
                        }
                    ?> 
                </div>
                
                <!-- Error Prompt -->
                <div class="row flex-row justify-content-end">
                    <?php 
                        if ($_SESSION["addmovie_success"] == 0) {
                            echo '<img class="mt-1 mr-2" src="../static/img/icons/ErrorIcon.png" height="20" />';
                            echo '<p class="signPrompt redText pt-1"> Unable to add movie </p>';
                        }
                    ?> 
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>