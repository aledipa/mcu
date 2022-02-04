var global_heroes = Array();

//This is the loading Ajax function
function loadData(hotlink) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var movie = JSON.parse(this.responseText);
            var results = new Array();
            var global_movies = Array();

            try {
              if (movie[0].id_movie == undefined) {
                for (var j=0; j<movie.length; j++) {
                  for (var i=0; i<movie[j].length; i++) {
                    global_movies.push(movie[j][i].title);
                    results.push(
                      "<tr>" + 
                        "<td> <input type='image' class='binButton' src='../static/img/icons/DeleteIcon.png' height='10' onclick='deleteMovie("+movie[j][i].id_movie+");' /> </td>" + 
                        "<td>" + movie[j][i].id_movie + "</td>" +
                        "<td>" + movie[j][i].title + "</td>" +
                        "<td>" + movie[j][i].running_time + "</td>" +
                        "<td>"  + movie[j][i].release_date + "</td>" +
                        "<td>" + movie[j][i].director +  "</td>" +
                      "</tr>");
                  }
                  showData(results);
                }
                showHeroes(global_movies);
              } else {
                for (var i=0; i<movie.length; i++) {
                  global_movies.push(movie[i].title);
                  results[i] = 
                  "<tr> " + 
                    "<td> <input type='image' class='binButton' src='../static/img/icons/DeleteIcon.png' height='10' onclick='deleteMovie("+movie[i].id_movie+");' /> </td>" + 
                    "<td>" + movie[i].id_movie + "</td>" + 
                    "<td>" + movie[i].title + "</td>" +
                    "<td>" + movie[i].running_time + "</td>" +
                    "<td>"  + movie[i].release_date + "</td>" +
                    "<td>" + movie[i].director +  "</td>" +
                  "</tr>";
                }
                // setTimeout(showData(results), 2000);
                showData(results);
                showHeroes(global_movies);
              }
              console.log(results);
            } catch (error) {
              console.log("nothing found");
              showData("<tr></tr>");
            }
            
        }
    };
    xhttp.open("GET", hotlink, true);
    // xhttp.open("GET", "/mcu/dynamic/php/api/movieApi.php?director=Jon Favreau", true);
    xhttp.send();
}


//This is the removing film Ajax function
function removeData(hotlink) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if (this.responseText == "true") {
            setTimeout(searchMovie(), 2000);
          } else {
            window.location.href = "http://localhost/mcu/templates/login.php";
          }
      }
  };
  xhttp.open("GET", hotlink, true);
  xhttp.send();
}

//Loads the heroes Ajax
function loadHeroes(hotlink, element) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var heroes = JSON.parse(this.responseText);
      var results = "<div class='row'>"; //= "<td> ";//new Array();
      try {
        if (heroes.length > 0) {
          for (var i=0; i<heroes.length; i++) {
            results += 
              '<div class="hover-container">' + 
                '<p class="hover-target mediumText grayText marvelText" tabindex="0"><u class="heroname textButton">' + heroes[i] + '</u>,&#160;</p>' + 
                '<aside class="hover-popup">' + 
                    '<h4 class="azureLabel">' + heroes[i] + '</h4>' + 
                    '<p class="blueText"> Superpotere: <b class="power"></b> <br> Potenza: <b class="rank"></b></p>' + 
                '</aside>' + 
              '</div>';
          }
        }
        element.innerHTML += "<td>" + results + "</div> </td>";
        global_heroes = heroes;
        showPowers();
        global_movies = [];
      } catch(error) {
        console.log("no heroes found");
        element.innerHTML += "<td></td>";
      }
    }
  };
  xhttp.open("GET", hotlink, true);
  xhttp.send();
}

//Loads the heroes Ajax
function loadPowers(hotlink, elem_power, elem_rank) { //indice
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var powers = JSON.parse(this.responseText);
      // var results = "";
      try {
        if (powers.length > 0) {
          elem_power.innerText = powers[0];
          elem_rank.innerText = powers[1];
        }
      } catch(error) {
        element.innerHTML += "N/A";
      }
    }
  };
  xhttp.open("GET", hotlink, true);
  xhttp.send();
}


//Shows the data loaded by ajax
function showData(results) {
  var rows;
  for (var i=0; i<results.length; i++) {
      rows += results[i];
  }
  $("#tableTitles").removeClass("d-none");
  $("#findBox").removeClass("smallBox");
  $("#tableContent").html(rows);

}

//Shows the heroes
function showHeroes(global_movies) {
  for (var i=1; i<$("tr").length; i++) {
    var hotlink = "/mcu/dynamic/php/api/movieApi.php?heroesbymovie=" + global_movies[i-1];
    loadHeroes(hotlink, $("tr")[i]);
  }
}

//shows the powers
function showPowers() {
  for (var i=0; i<$(".heroname").length; i++) {
    var hotlink = "/mcu/dynamic/php/api/movieApi.php?powersbyhero=" + $(".heroname")[i].innerHTML; 
    loadPowers(hotlink, $(".power")[i], $(".rank")[i]);
    // loadPowers(hotlink, i);
  }
}

//This script manages the IronMan's glowing effect on scroll
$(document).on("scroll", function() {
  var pageTop = $(document).scrollTop();
  var pageBottom = pageTop + $(window).height();
  var tags = $(".bn-to-color");

  for (var i = 0; i < tags.length; i++) {
    var tag = tags[i];

    if ($(tag).position().top < pageBottom) {
      $(tag).addClass("visible");
    } else {
      $(tag).removeClass("visible");
    }
  }
});

//Shows up the logout button
function triggerDropdown() {
  $("#logout").removeClass("d-none");
}

//Tells to ajax to which data look for
function searchMovie() {
  var searchType = $("input[name=selection]:checked", "#findmovie").val();
  var query = $("#search").val();
  var hotlink = "/mcu/dynamic/php/api/movieApi.php?" + searchType + "=" + query;
  loadData(hotlink);
}

//Deletes the selected movie
function deleteMovie(movieID) {
  var hotlink = "/mcu/dynamic/php/api/movieApi.php?delid=" + movieID;
  removeData(hotlink);
}


  