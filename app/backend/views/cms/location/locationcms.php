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

    <script>

    </script>
</head>

<body>
<body>
    <?php require __DIR__ . '../../include/navbar.php'; ?>
    <div class="wrapper" style="margin: auto; padding: 30px;">
        <h3>Manage Locations</h3>
        <table class="table table-striped" style="width:62%">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">City</th>
                    <!-- <th scope="col">Capacity</th> -->
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($locations as $l) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $l->id; ?> </th>
                        <td><?php echo $l->locationName; ?></td>
                        <td><?php echo $l->address; ?></td>
                        <td><?php echo $l->postalCode; ?></td>
                        <td><?php echo $l->city; ?></td>
                        <!-- <td><?php //echo $l->capacity; ?></td> -->

                        <form action="editLocation" method="post">
                            <td><a href="editLocation">
                                    <button type="submit" id="editLocation" name="editLocation" value="<?php echo $l->id; ?>" formaction="editLocation" class="btn"><i class="fa fa-pencil"></i></button>
                                </a>
                            </td>
                        </form>
                        <form action="deleteLocation" method="post">
                            <td><a href="deleteLocation">
                                    <button type="submit" id="deleteLocation" name="deleteLocation" value="<?php echo $l->id; ?>" formaction="deleteLocation" class="btn"><i class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </form>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <a href="addLocationView">
            <button type="button" class="btn btn-dark"> Add Location </button>
        </a>
    </div>
    <?php //require __DIR__ . '../../include/footer.php'; 
    ?>
</body>
</body>

</html>