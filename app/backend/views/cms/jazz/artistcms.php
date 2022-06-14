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
    <?php require __DIR__ . '../../include/navbar.php'; ?>
    <div class="wrapper" style="margin: auto; padding: 30px;">
        <!-- <input type="button" class="btn btn-dark" value="Back" onclick="history.back()">
        <br> <br> <br> -->
        <h3>Manage Jazz Artist</h3>
        <br>
        <table class="table table-striped" style="width:80%">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Artist Name</th>
                    <th scope="col">Description</th>
                    <!-- <th scope="col">Pictures</th> -->
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($artists as $a) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $a->id ?> </th>
                        <td><?php echo $a->artistname ?></td>
                        <td style="width:40%;"><?php echo $a->description ?></td>
                        <form action="editArtist" method="post">
                            <td><a href="editArtist">
                                    <button type="submit" id="editArtist" name="editArtist" value="<?php echo $a->id; ?>" formaction="editArtist" class="btn"><i class="fa fa-pencil"></i></button>
                                </a>
                            </td>
                        </form>
                        <form action="deleteArtist" method="post">
                            <td><a href="deleteArtist">
                                    <button type="submit" id="deleteArtist" name="deleteArtist" value="<?php echo $a->id; ?>" formaction="deleteArtist" class="btn"><i class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </form>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <a href="addArtistView">
            <button type="button" class="btn btn-dark"> Add Artist </button>
        </a>
    </div>
    <?php //require __DIR__ . '../../include/footer.php'; 
    ?>
</body>

</html>