<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../style/jazzevents.css?<?php echo time(); ?>" />
    <title>Festival Info</title>

</head>

<body>



<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #A42323">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">

                <div class="col-4">

                    <li class="nav-item">
                        <a class="navbar-brand" href="#"> 
                            <img src="../img/Logo.png" alt="logo" width="116" height="34"> 
                        </a>
                    </li>
                </div>    

                <div class="col-8">

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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                
                </div>

            </ul>

           
        </div>
    </div>
</nav>

-->

<?php

include_once ('include/navbar.php')
?>

<div class="jazz-image">
    <img src="../img/jazz/backgrounds/haarlem-jazz-background.png" class="jazz-band" alt="background">
    <h3 class="title">HAARLEM JAZZ</h3>
    <div class="line-up-box">
        <div class="line-up">
            <p>
                Gumbo Kings . Evolve . Ntjam Rosie .Wicked Jazz Sounds . Tom Thomsom Assemble .
                Jonna Frazer .  Fox & The Mayors . Uncle Sue . Chris Allen . Myles Sanko . Ruis Soundsystem .
                The Family XL . Gare du Nord . Rilan & The Bombadiers . Soul Six  . Han Bennink . The Nordanians
                Lilith Merlot

            </p>
        </div>
    </div>
</div>


<div class="container">
  <div class="col-md-12">
    <div class="row day-buttons">
    <button type="button" formaction="thursdayEvents" name="thursday" class="thursday-button btn btn-default col-md-2"> Thursday </button>
    <button type="button" formaction="fridayEvents" name="friday" class="friday-button btn btn-default col-md-2"> Friday </button>
    <button type="button" formaction="saturdayEvents" name="saturday" class="saturday-button btn btn-default col-md-2"> Saturday </button>
    <button type="button" formaction="sundayEvents" name="sunday" class="sunday-button btn btn-default col-md-2"> Sunday </button>
    </div>
  </div>
</div>


<div class="events">

    <div class="row row-cols-1 row-cols-md-3 g-4">

   
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-top day-pass-3">

                    <div class="day-pass-heading">
                        <p> 1 DAY </p>
                        <p>ALL- ACCESS PASS </p>
                    </div>
                    <div class="day-pass-subtitle">
                        <p>€ 35.00 </p>
                    </div>
                </div>
            
                

                <div class="card-body-event">
                    <h5 class="card-title"> 1 Day Access Pass </h5>
                    <p class="card-text"> Get access to all events on saturday with this all access pass.  </p>
                    <br/>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg></button>
                    <button type="submit" class="btn btn-outline-success btn-sm">Add to cart</button>
                </div>
            </div>
        </div>

        <?php foreach ($events as $e){ 
            ?>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-top">
                    <img src="../img/jazz/artists/<?php echo $e->artistname ?>.png" class="card-img-top img-fluid" alt="..." height="200px">
                </div>

                
                    <div class="card-body-event">
                        <h5 class="card-title" name="artistname" id="artistname" > <?php echo $e->artistname ?> </h5>
                        <p class="event-time">  <?php echo $e->date ?> at <?php echo $e->startTime ?>  -  <?php echo $e->endTime ?> 
                        <p class="card-text"> <?php echo $e->description ?> </p>
                        <p class="card-subtitle"> <?php echo $e->startTime ?> - <?php echo $e->endTime ?> </p>
                        <?php
                        if($e->activityHall != "None"){ ?> <p class="card-subtitle"> <?php echo $e->name ?></p>
                        <?php } else {   ?> <p class="card-subtitle"> <?php echo $e->name ?> </p> <?php } ?>
                        <p class="card-subtitle"> $ <?php echo $e->price ?> </p>
                        <br/>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg></button>

                        <form method="post">
                         <button type="submit" id="addTicket" name="addTicket" value="<?php echo $e->activityId?>" formaction="cart" class="btn btn-outline-success btn-sm">Add to cart</button>
                         </form>
                    </div>
                
            </div>
        </div>

        <?php }  ?>

       
        <!-----------------------Location box ----------------------------->

        <section class="col-md-8 mb-4">
            <section class="card">
                <section class="card-header location">
                    LOCATION
                </section>

                <div class="card-body-location">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Patronaat,
                                <br><br>
                                Zijlsingel 2
                                2013 DN Haarlem
                            </p>

                            <br><br>

                            <p>
                                E-mail/telefoon

                                <br><br>
                                info@patronaat.nl
                                phone:
                                023 - 517 58 50
                                (office) -  10.00 u - 17.00 u

                                <br><br>
                                023 - 517 58 58
                                (cash desk /information number)


                            </p>

                        </div>

                        <div class="col-md-6">
                            <img class="patronaat-map" src="../img/jazz/backgrounds/patronaat-map.png" alt="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



<div class="card day-pass">
    <div class="row">
        <div class="col-4">
            <div class="day-pass-3">
                <div class="day-pass-heading">
                    <p> 3 DAY </p>
                    <p>ALL- ACCESS PASS </p>
                </div>
                <div class="day-pass-subtitle">
                    <p>€ 80.00 </p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card-body">
                <h5 class="card-title">Thursday - Saturday </h5>
                <p class="card-text">All jazz events, thursday through saturday, will be accessible for the low price of € 80.00 with this 3 day all-access pass. </p>
                <button type="submit" class="btn btn-warning btn-md">Add to cart</button>
            </div>
        </div>
    </div>
</div>



<br><br>

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
                <p class="explore-label"> Food > </p>


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
        <h6> Sign up to our newsletter to get first access to our line-up announcements, limited ticket releases and all our latest news </h6>
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