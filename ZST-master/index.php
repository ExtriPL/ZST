<!DOCTYPE html>
<html lang="pl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="scripts\galeria.js"></script>

        <title>Strona dla ZST</title>
    </head>
    <body>
            
            
        <nav id="navbar" class="navbar navbar-expand bg-dark navbar-dark">
            <a class="navbar-brand" href="#">            
                <h1 id="date"></h1>
            </a>        
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <h1 id="temp" class="nav-link text-center" href="#">0°C</h1>
                </li>   
                <li class="nav-item active">
                    <h1 id="time" class="nav-link text-center" href="#">00:00</h1>
                </li>    
            </ul>
        </nav>

        <div id="demo" class="carousel slide" data-interval="5000" data-ride="carousel">
            <!-- Indicators 
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3" class="active"></li>
            </ul>
            -->

            <!-- The slideshow -->
            <div id="carousel" class="carousel-inner h-100">
                <!--<div id="weatherSlide" class="carousel-item h-100 active">
                    <div class="row h-100">
                        <div class="col-sm h-100" style="background-color:rgb(84, 103, 128)">
                            <div class="row h-100">
                                <div class="col-sm-3">
                                    <div id="weatherTempMin" class="row h-25" style="background-color: blue"></div>
                                    <div id="weatherHumidity" class="row h-25" style="background-color: rgb(255, 0, 76)"></div>
                                    <div id="weatherPressure" class="row h-25" style="background-color: rgb(21, 255, 0)"></div>
                                    <div id="weatherSunRise" class="row h-25" style="background-color: rgb(255, 0, 0)"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="weatherImage"></div>
                                    <div id="weatherTemp"></div>
                                </div>
                                <div class="col-sm-3">
                                    <div id="weatherTempMax" class="row h-25" style="background-color: blue"></div>
                                    <div id="weatherWindSpeed" class="row h-25" style="background-color: rgb(30, 255, 0)"></div>
                                    <div id="weatherWindDeg" class="row h-25" style="background-color: rgb(255, 0, 85)"></div> 
                                    <div id="weatherSunSet" class="row h-25" style="background-color: rgb(255, 238, 0)"></div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <?php
            $fileDir = "images";
            $result = scandir($fileDir);
            array_shift($result);
            array_shift($result);
            //echo json_encode($result);
            
            ?>
            <script>
            var list = <?php echo json_encode($result) ?>;
            createSlides(list);
            </script>

        <script src="scripts\weather.js"></script>
        <script src="scripts\script.js"></script>
        <script src="scripts\time.js"></script>
        <script src="scripts\refresh.js"></script>
        
    </body>
</html>