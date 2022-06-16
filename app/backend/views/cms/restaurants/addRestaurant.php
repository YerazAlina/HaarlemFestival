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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/css/cms.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<body>
    <?php require __DIR__ . '../../include/navbar.php'; ?>

    <input type="button" class="btn btn-dark" value="Back" onclick="history.back()">

    <div class="wrapper" style="margin: auto; padding: 30px; width: 400px;">
        <h2>Add Restaurant</h2>
        <p>Add a new restaurant to the Haarlem Festival restaurants</p>
        <form action="addRestaurant" method="post">
        <!-- $location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact -->
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description">
            </div>
            <div class="form-group">
                <label>Number of Stars</label>
                <input type="text" name="stars">
            </div>
            <div class="form-group">
                <label>Number of Seats</label>
                <input type="text" name="seats">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phoneNumber">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price">
            </div>
            <div class="form-group">
                <label>Parking Information</label>
                <input type="text" name="parking">
            </div>
            <div class="form-group">
                <label>Website (link)</label>
                <input type="text" name="website">
            </div>
            <div class="form-group">
                <label>Menu (link)</label>
                <input type="text" name="menu">
            </div>
            <div class="form-group">
                <label>Contact (link)</label>
                <input type="text" name="contact">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>

    </div>
    <?php //require __DIR__ . '../../include/footer.php'; ?>
</body>

</html>