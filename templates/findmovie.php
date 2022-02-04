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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../static/js/script.js"></script>
    <link rel="icon" href="/mcu/static/img/icons/FavIcon.png" type="image/png">
    <title>Find Movie</title>
</head>
<body class="findmovie">
    <!-- NavBar -->
    <nav class="sticky-top card slimNavbarr">
        <!-- Marvel Logo -->
        <a href="/mcu"><img class="" src="../static/img/elements/MarvelLogo.svg" height="60" /></a>
    </nav>

    <!-- Site content -->
    <div class="mt-5 container-full siteContent">

        <div id="findmovie" action="" method="post">

            <div class="signupBox smallBox card fade-in pl-5 pr-5 mx-auto container-full" id="findBox">
                <p class="input-label flex-row justify-content-start marvelText largeText azureText mt-4"> Find a Movie </p>
                <p class="input-label flex-row justify-content-start marvelText bigText azureDarkText"> Search by: </p>

                <div class="row">
                    <div class="column pr-5 mr-1 mt-4 container-full">

                        <!-- Selection -->
                        <div class="row ml-3 container-full">
                            <label class="ml-3 mr-5">
                                <div class="row">
                                    <input type="radio" name="selection" value="title" id="title" onclick="searchMovie();" checked >
                                    <img src="../static/img/icons/SelectionIcon.svg">
                                    <p class="blueText queryTypes marvelText mediumText mt-3 ml-2">Title</p>
                                </div>
                            </label>
                              
                            <label class="ml-3 mr-5">
                                <div class="row">
                                    <input type="radio" name="selection" value="hero" onclick="searchMovie();">
                                    <img src="../static/img/icons/SelectionIcon.svg">
                                    <p class="blueText queryTypes marvelText mediumText mt-3 ml-2">Hero</p>
                                </div>
                            </label>

                            <label class="ml-3 mr-5">
                                <div class="row">
                                    <input type="radio" name="selection" value="director" onclick="searchMovie();">
                                    <img src="../static/img/icons/SelectionIcon.svg">
                                    <p class="blueText queryTypes marvelText mediumText mt-3 ml-2">Director</p>
                                </div>
                            </label>

                            <label class="ml-3 mr-3">
                                <div class="row">
                                    <input type="radio" name="selection" value="id" onclick="searchMovie();">
                                    <img src="../static/img/icons/SelectionIcon.svg">
                                    <p class="blueText queryTypes marvelText mediumText mt-3 ml-2">ID</p>
                                </div>
                            </label>
                        </div>

                        <!-- Query Input -->
                        <div class="column ml-5">
                            <div class="input-group">
                                <span class="input-group-text addon"><img src="../static/img/icons/SearchIcon.svg" height="35"/></span>
                                <input class="signfieldInput p-2 pl-3"  name="search" id="search" type="text" placeholder="Search what you want..." onchange="searchMovie();" required>
                            </div>
                            <div class="row container-full flex-row justify-content-end pr-2">
                                <p class="marvelText mediumText azureLabel mr-5 pr-5 mt-2"> Search Movie </p>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="row flex-row justify-content-end">
                            <p class="mr-3 mt-4 pt-1"> <a class="mediumText marvelText textButton"  href="javascript:history.back();"> Cancel </a> </p>
                            <button class="marvelText redButton register mediumButton pl-1 pr-1 mb-4 mr-3 mt-4 mb-5" type="button" onclick="searchMovie();"> Search </button>
                        </div>
                        
                    </div>
                </div>

                <!-- Table Output -->
                <table class="customTable table marvelText d-none" id="tableTitles"> 
                    <!-- /////////////////// -->
                    <!-- <div class="hover-container">
                        <p class="hover-target mediumText grayText marvelText" tabindex="0">Hover me, or tab to mex</p>
                        <aside class="hover-popup">
                            <h4 class="azureLabel">Iron Man</h4>
                            <p class="blueText"> Superpotere: <b class="power">armatura</b> <br> Potenza: <b class="rank">8</b></p>
                        </aside>
                    </div> -->
                    <!-- ////////////////////// -->
                    <thead>
                      <tr class="azureLabel tableFields">
                        <th class="noTopBorder" scope="col"></th>
                        <th class="noTopBorder" scope="col">ID</th>
                        <th class="noTopBorder" scope="col">Title</th>
                        <th class="noTopBorder" scope="col">Duration</th>
                        <th class="noTopBorder" scope="col">Date</th>
                        <th class="noTopBorder" scope="col">Director</th>
                        <th class="noTopBorder" scope="col">Heroes</th>
                      </tr>
                    </thead>
                    <tbody class="grayText" id="tableContent">
                        <!-- Here the data is dinamically loaded by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>