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
    <input type="button" class="btn btn-dark" value="Back" onclick="history.back()">
    <div class="wrapper" style="margin: auto; padding: 30px;">
        <h3>Manage Reservation Status</h3>
        <p> Activate and Deactivate reservations using the CMS</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Food Activity ID</th>
                    <th scope="col">Number of Guests</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Change Reservation Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($reservations as $r) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $r->id; ?> </th>
                        <td><?php echo $r->foodActivityId; ?></td>
                        <td><?php echo $r->nrOfGuests; ?></td>
                        <td>
                            <?php
                            if ($r->isActive == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?>
                        </td>

                        <form action="reservationChangeStatus" method="post">
                            <td><a href="reservationChangeStatus">
                                    <button type="submit" id="reservationChangeStatus" name="reservationChangeStatus" value="<?php echo $r->id; ?>" formaction="reservationChangeStatus" class="btn"><i class=" <?php if ($r->isActive == 1) {
                                                                                                                                                                                                                    echo "fa fa-fa fa-toggle-on";
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo "fa fa-fa fa-toggle-off";
                                                                                                                                                                                                                } ?>"></i></button>
                                </a>
                            </td>
                        </form>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <?php require __DIR__ . '../../include/footer.php';
    ?>
</body>

</html>