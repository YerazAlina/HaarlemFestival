<?php   

//  foreach ($restaurants as $r){ 
//      echo $r->name . "     "; 
//      echo $r->price; 
//      echo $r->description; 
//  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style/food.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="../../style/jazzevents.css?<?php echo time(); ?>" />
    <title>Festival Info</title>

</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #A42323">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="../../img/logo.png" alt="logo" width="116" height="34"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FOOD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">JAZZ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">DANCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shoppingCart">cart :)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            English
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Dutch</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <img src="">
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">HISTORY</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <?php

include_once ('include/navbar.php')
?>
    <header>

        <section><img class="foodbanner" src="../img/food/food1.png"></section>

        <section class="w3-display-topleft" style="padding:150px">
            <span class="w3-jumbo  w3-text-black ">Welcome to Haarlem festival</span><br>
            <span class="w3-display-bottommiddle w3-jumbo w3-text-black">Food</span><br>
        </section>

    </header>

    

        <section class="w3-container">

            <h1 class="w3-center"> Choose your restaurant</h1>

            <!-- Dropdown button -->



            <!-- Resturants cards start here -->

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php  foreach ($restaurants as $e) {
                    ?>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-top">
                            <img src="../img/food/<?php echo $e->name?>.png" class="card-img-top img-fluid" alt="..."
                                height="200px">
                        </div>


                        <div class="card-body-event">
                            <h5 class="card-title"> <?php echo $e->name ?> </h5>
                            <p class="card-text"> <?php echo $e->description ?> </p>
                            <p class="card-subtitle">Stars: <?php echo $e->stars ?> </p>
                            <p class="card-subtitle">Price: <?php echo $e->price ?> EUR</p>
                            <p class="card-subtitle">Address: <?php echo $e->address ?> </p>
                            <!-- <p class="card-subtitle"> $ <?php echo $e->price ?> </p> -->
                            <!-- <br/> -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg></button>
                            <form method="post">
                                <p><button type="submit" id="addTicket" name="addTicket" value="<?php echo $e->id ?>"
                                        formaction="food" class="btn btn-outline-success btn-sm">Add to cart</button></p>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div> 


            <!-- Resturants cards end  here -->

        </section>

   


    <div class="row recommended-events">
        <h3 class="rec-title"> Complete your day </h3>
        <div class="col mt-md-4">
            <div class="card h-100 complete-day">
                <img src="../img/jazz/backgrounds/history-image.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">"Event title" </h5>
                    <p class="card-subtitle">Short description</p>
                    <p> time of event </p>
                    <button type="submit" class="btn btn-warning btn-md">tickets >> </button>

                </div>
            </div>
        </div>
        <div class="col mt-md-4">
            <div class="card h-100 complete-day">
                <img src="../img/jazz/backgrounds/history-image.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">"Event title" </h5>
                    <p class="card-subtitle">Short description</p>
                    <p> time of event </p>
                    <button type="submit" class="btn btn-warning btn-md">tickets >> </button>

                </div>
            </div>
        </div>
        <div class="col mt-md-4">
            <div class="card h-100 complete-day">
                <img src="../img/jazz/backgrounds/history-image.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">"Event title" </h5>
                    <p class="card-subtitle">Short description</p>
                    <p> time of event </p>
                    <button type="submit" class="btn btn-warning btn-md">tickets >> </button>

                </div>
            </div>
        </div>
        <div class="col mt-md-4">
            <div class="card h-100 complete-day">
                <img src="../img/jazz/backgrounds/history-image.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">"Event title" </h5>
                    <p class="card-subtitle">Short description</p>
                    <p> time of event </p>
                    <button type="submit" class="btn btn-warning btn-md">tickets >> </button>

                </div>
            </div>
        </div>
    </div>





    <br><br>



    <div class="card explore-more-card col-md-12">
        <div class="card-header explore-more">
            EXPLORE MORE
        </div>

        <div class="card-body-images">
            <div class="row">
                <div class="col-md-4">
                    <img src="../img/jazz/backgrounds/dance-image.png" alt="dance">
                    <p class="explore-label"> Dance > </p>
                </div>

                <div class="col-md-4">
                    <img src="../img/jazz/backgrounds/food-image.png" alt="food">
                    <p class="explore-label"> JAZZ > </p>


                </div>

                <div class="col-md-4">
                    <img src="../img/jazz/backgrounds/history-image.png" alt="history">
                    <p class="explore-label"> History > </p>

                </div>

            </div>
        </div>
    </div>


    <div class="container newsletter-box">
        <div class="container newsletter-inner">
            <h2>SIGN UP </h2>
            <h6> Sign up to our newsletter to get first access to our line-up announcements, limited ticket releases and
                all our latest news </h6>
            <br><br>
            <div class="row">
                <div class="col">

                    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-warning btn-md">SUBSCRIBE</button>
                </div>
            </div>
        </div>
    </div>

    <script></script>

</body>

</html>