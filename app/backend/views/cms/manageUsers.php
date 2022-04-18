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

    <div class="wrapper" style="margin: auto; padding: 30px;">
        <h3>Manage Users</h3>
        <!-- A superadministrator can create, edit or delete other administrators and users -->
        <!-- name (firstname + lastname) -- email -- role -- edit -- delete -->
        <!-- button to create a new user + checkbox for someone who is an administrator -->

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- this is static -->
                <tr>
                    <th scope="row">1</th>
                    <td>Mark de Haan</td>
                    <td>mark@live.com</td>
                    <td>superadministrator</td>
                    <td><a href="editAccount">
                            <button type="button" class="btn btn-dark"> Edit </button>
                        </a>
                    </td>
                    <td><a href="deleteAccount">
                            <button type="button" class="btn btn-danger"> Delete Account </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <?php require __DIR__ . '/include/footer.php'; ?>
</body>

</html>