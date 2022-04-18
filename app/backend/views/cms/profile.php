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
    <?php require __DIR__ . '/navbar.php'; ?>

    <div class="wrapper" style="margin: auto; width: 360px; padding: 30px;">
        <h2>Profile Settings</h2>
        <form action="profileSettings" method="post">
            <div class="form-group">
                <label>Update Email</label>
                <input type="text" name="email_new" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_new; ?>">
                <span class="invalid-feedback"><?php echo $email_new_err; ?></span>
                <br>
            </div>
            <div class="form-group">
                <a href="saveChanges">
                    <button type="button" class="btn btn-primary me-2"> Update Email
                    </button>
                </a>
                <a href="deleteAccount">
                    <button type="button" class="btn btn-danger me-3">
                        Delete Account
                    </button>
                </a>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <?php require __DIR__ . '/footer.php'; ?>
</body>

</html>