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
            
            
        <nav id="navbar" class="navbar navbar-expand bg-dark navbar-dark" style="padding-top:0px; padding-bottom:0px;">
            <a class="navbar-brand" href="#">            
                <h1 id="date"></h1>
            </a>        
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <!--<h1 class="text-white display-4"><b>Stulecie Zespołu Szkół Technicznych 1919 - 2019</b></h1>-->
                </li>   
                </ul>
            
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item active">
                    <h1 id="temp" class="nav-link text-center" href="#">0°C</h1>
                </li>
                
                <li class="nav-item active">
                    <h1 id="time" class="nav-link text-center" href="#">00:00</h1>
                </li>    
            </ul>
        </nav>

        <div id="demo" class="carousel slide" data-interval="500000000" data-ride="carousel">
            
        <!-- style="background-image:url('https://wallpapertag.com/wallpaper/full/7/d/8/593845-snow-background-pictures-1920x1080-hd-1080p.jpg')" -->

            <div id="carousel" class="carousel-inner h-100">
            <div class="carousel-item active bck" >
            <div class="row">
                <div class="col-md-6"><h1 class="konkurs display-5 text-center">Konkurs 1</h1></div>
                <div class="col-md-6"><h1 class="konkurs display-5 text-center">Ranking globalny</h1></div>
            </div>
            <div class="row" style="height:100%">
                <div class="col-md-6" style="padding:0px; padding-left:2px; padding-right:2px;"><iframe style="padding-left:15px; width:100%; height:100%; scrolling:no; border:0" src="konkurs1.php"></iframe></div>
                <div class="col-md-6" style="padding:0px; padding-left:2px; padding-right:18px;"><iframe style="width:100%; height:100%; scrolling:no; border:0" src="konkurs2.php"></iframe></div>
            </div>
            </div>    
            <!-- <div style="clear: both;"></div> -->
            </div>
        </div>
        <?php
            $fileDir = "images";
            $result = scandir($fileDir);
            array_shift($result);
            array_shift($result);
                        
            ?>
            <script>
            var list = <?php echo json_encode($result) ?>;
            createSlides(list);
            </script>

        <script src="scripts\weather.js"></script>
        <script src="scripts\resize.js"></script>
        <script src="scripts\time.js"></script>
        <script src="scripts\refresh.js"></script>
        
    </body>
</html>