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
    <?php require __DIR__ . '../../include/navbar.php'; ?>
    <input type="button" class="btn btn-dark" value="Back" onclick="history.back()">
    <div class="wrapper" style="margin: auto; padding: 30px;">
        <h3>Manage Food Sessions</h3>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Number of Stars</th>
                    <th scope="col">Seats</th>
                    <th scope="col">Price</th>
                    <th scope="col">Parking Information</th>
                    <th scope="col">Website (link)</th>
                    <th scope="col">Menu (link)</th>
                    <th scope="col">Contact (link)</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($restaurants as $r) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $r->id; ?> </th>
                        <td><?php echo $r->name; ?></td>
                        <td><?php echo substr($r->description, 0, 18) . '...'; ?></td>
                        <td><?php echo $r->stars; ?></td>
                        <td><?php echo $r->seats; ?></td>
                        <!-- <td><?php //echo $r->phoneNumber; ?></td> -->
                        <td><?php echo $r->price; ?></td>
                        <td><?php echo substr($r->parking, 0, 18) . '...'; ?></td>
                        <td><?php echo $r->website; ?></td>
                        <td><?php echo $r->menu; ?></td>
                        <td><?php echo $r->contact; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <?php //require __DIR__ . '../../include/footer.php'; 
    ?>
</body>

</html>