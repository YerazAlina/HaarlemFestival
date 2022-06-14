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

<?php

include_once ('include/navbar.php')
?>
    <header class="w3-container w3-border w3-bottombar w3-transparent w3-border-black">
        <section class="w3-padding-32 w3-margin ">
            <div class="w3-right">
                <img src="../img/food/<?php echo $restaurant->name ?>.png" alt="">
            </div>

            <h2> <?php echo $restaurant->name ?></h2>

            <p> <i class="fas fa-euro"></i> Price: <?php echo $restaurant->price ?>.00 EUR </p>

            <p> <i class="fas fa-map-marker-alt"></i> Address: <?php echo $restaurant->address ?> </p>

            <p> <?php echo $restaurant->description ?> </p>
        </section>
    </header>

    <section class=" w3-display-container  w3-container">
        <section>
            <h1>Book your table </h1>
            <p>A reservation fee of €10,- per person wil be charged when a reservation is made on the Haarlem Festival site. This fee will be deducted from the final check a visiting the restaurant.</p>

        </section>

        <section>
            <?php $startTime = $restaurant->startTime ?>
            <?php $endTime = $restaurant->endTime ?>
        </section>
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





</body>

</html>