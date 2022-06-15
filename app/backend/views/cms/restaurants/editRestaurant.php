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
        <h2>Edit Restaurant</h2>
        <p>Edit the information of the restaurant. Please note that this might also effect the events.</p>
        <form action="updateRestaurantCMS" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $restaurant->name; ?>">
            </div>

            <div class="form-group">
                <a href="saveChanges">
                    <input type="submit" class="btn btn-primary" value="Save">
                </a>
            </div>
        </form>

    </div>
    <?php require __DIR__ . '../../include/footer.php'; ?>
</body>

</html>
