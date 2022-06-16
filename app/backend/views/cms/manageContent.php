<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Haarlem Festival </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/cms.css">
</head>

<body>
    <?php require __DIR__ . '/include/navbar.php'; ?>

    <div class="wrapper" style="margin: auto; width: 500px; padding: 30px;">
        <h3>Content Management System</h3>
        <p>The website can be edited here choose a category that you want to edit</p>

        <div class="list-group">
            <!-- works -->
            <a href="locationcms" class="list-group-item list-group-item-action">All Locations and Venues</a> 
            <a href="artistcms" class="list-group-item list-group-item-action">Jazz Artists</a>
            <a href="jazzcms" class="list-group-item list-group-item-action">Jazz Events</a>
            <a href="foodcms" class="list-group-item list-group-item-action">Restaurants</a>
            
            <!-- <a href="foodcms" class="list-group-item list-group-item-action">Restaurants Reservations</a> -->
            <!-- <a href="foodcms" class="list-group-item list-group-item-action">Restaurants Events</a> -->

            <!-- <a href="#" class="list-group-item list-group-item-action disabled">History (currently unavailable)</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Music (currently unavailable)</a> -->
        </div>

    </div>
    <?php require __DIR__ . '/include/footer.php'; ?>
</body>

</html>