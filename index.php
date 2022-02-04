<?php 
    //Starts the session
    session_start();

    //Resets the error sessions
    $_SESSION["login_success"] = true;
    $_SESSION["signup_success"] = true;
    $_SESSION["addmovie_success"] = 2;
    $_SESSION["addhero_success"] = 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
    <link rel="stylesheet" href="static/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Marvel" /><link rel='stylesheet' href='//fonts.googleapis.com/css?family=Lato' type='text/css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="icon" href="/mcu/static/img/icons/FavIcon.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="static/js/script.js"></script>
    <title>MCU</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top blackBackground">
        <div class="form-row flex-row justify-content-start">
            <?php 
                if ($_SESSION["logged"] == FALSE) { ?>
                    <!-- User Icon -->
                    <img src="static/img/elements/User.svg" height="50">
                    <!-- Access actions -->
                    <div class="accountButtons form-row ml-4">
                        <p class="mr-3 mt-2"> <a class="mediumText marvelText textButton" href="templates/login.php"> Log In </a> </p>
                        <img class="mt-1 mr-3" src="static/img/elements/ObliqueDivider.svg" height="40" />
                        <a href="templates/signup.php"><button class="marvelText mediumButton redButton mt-1"> Register </button></a>
                    </div>
            <?php 
                } else { ?>
                    <div class="row ml-1">
                        <button class="dropbtn user" onclick="triggerDropdown();"> 
                            <?php echo "<p class='user_char' onclick='triggerDropdown();'>" . strtoupper($_SESSION["username"][0]) . " </p>" ?>
                        </button>
                        <a class="ml-3 mt-1 slide-in-left d-none" id="logout" href="dynamic/php/backend/logout_backend.php"><button class="marvelText mediumButton redButton mt-1"> Log Out </button></a>
                    </div>
            <?php 
                } ?>
        </div>
        <!-- Marvel Logo -->
        <a href="/mcu"><img class="" src="static/img/elements/MarvelLogo.svg" height="60" /></a>
    </nav>

    <!-- Site's Content -->
    <div class="siteContent">
        <div class="homePage navbar p-0">
            <div class="title column form-row">
                <p class="ml-5 robotoText grayText gigaText">Explore the <br> <a class="redText">Marvel</a> <br> Cinematic <br></p>
                <img src="static/img/elements/Universe.png" height="85"/>
                <img id="arrow" class="justify-content-end" src="static/img/elements/DownArrow.svg" height="75"/>
            </div>
            <!-- form-row justify-content-end -->
            <div class="justify-content-end">
                <img src="static/img/backgrounds/DeadPoolBackground.svg"/>
            </div>
        </div>

        <!-- Warp Zone -->
        <div class="navbar">
            <div class="title column form-row mt-5">
                <img class="bn-to-color mt-5 mb-4 pb-5" src="static/img/backgrounds/IronManBackground.png" width="855" height="865"/>
            </div>
            <div class="justify-content-end column">
                <p id="subtitle" class="robotoText grayText gigaText mr-4">What are <a class="redText">You</a> <br> looking for? <br></p>
                <div class="buttonSection pt-3">
                    <div class="row ml-5">
                        <?php 
                        if ($_SESSION["logged"] == FALSE) { ?>
                            <p class="mt-1 mr-3"> <a class="largeText marvelText textButton grayDarkText"> Add a Movie </a> </p>
                        <?php 
                        } else { ?>
                            <div class="cloumn">
                                <p class="mt-1 mr-3"> <a class="largeText marvelText textButton" href="templates/addmovie.php"> Add a Movie </a> </p>
                                <p class="mediumText marvelText ml-5"> Or an <a class="textButton azureLabel" href="templates/addhero.php"> Hero </a></p>
                            </div>
                        <?php 
                        } ?>
                        <img class="mt-1 mr-3" src="static/img/elements/ObliqueDivider.svg" height="55" />
                        <p class="mt-1 mr-3"> <a class="largeText marvelText textButton" href="templates/findmovie.php"> Find a Movie </a> </p>
                    </div>
                    <?php 
                    if ($_SESSION["logged"] == FALSE) { ?>
                        <div class="row">
                            <p class="mediumText marvelText ml-5"> <a class="textButton azureLabel" href="templates/login.php"> Login </a> or <a class="textButton azureLabel" href="templates/signup.php"> Register </a> to add movies.</p>
                        </div>
                    <?php 
                    } ?>
                </div>
                
            </div>
        </div>
    </div>



</body>
</html>
