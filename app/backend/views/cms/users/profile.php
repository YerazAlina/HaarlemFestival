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

<!-- user can edit email, name and password -->

<body>
    <?php require __DIR__ . '../../include/navbar.php'; ?>
    <div class="wrapper" style="margin: auto; width: 400px; padding: 30px;">
        <h3>Edit Personal Information</h3>
        <br>
        <form action="profile" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $currentUserDetails->email; ?>">
            </div>
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $currentUserDetails->firstname; ?>">
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $currentUserDetails->lastname; ?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="reset" class="btn btn-secondary" value="Cancel">
                <a href="saveChanges">
                    <input type="submit" class="btn btn-primary" value="Save">
                </a>
                <br>
                <br>
                <a href="deleteAccount">
                    <button type="button" class="btn btn-danger"> Delete Account </button>
                </a>
        </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <?php require __DIR__ . '../../include/footer.php'; ?>
</body>

</html>