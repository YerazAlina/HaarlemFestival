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
        <h3>Manage Jazz Events</h3>
        <br>
        <table class="table table-striped" style="width:88%">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Date</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Ticket Price</th>
                    <th scope="col">Number of Tickets</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($events as $e) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $e->activityId; ?> </th>
                        <td><?php echo $e->name ?></td>
                        <td><?php echo $e->date ?></td>
                        <td><?php echo $e->startTime ?></td>
                        <td><?php echo $e->endTime ?></td>
                        <td>
                            <?php
                            if ($e->activityHall == "None") {
                                echo "Grote Markt";
                            } else {
                                echo $e->activityHall . " Hall, Patronaat";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($e->price == 0) {
                                echo "Free Event";
                            } else {
                                echo $e->price;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($e->ticketsLeft == 0) {
                                echo "No Maximum";
                            } else {
                                echo $e->ticketsLeft;
                                //TODO:THIS SHOULD BE TOTAL NR OF TICKETS 
                            }
                            ?>
                        </td>

                        <form action="editAccount" method="post">
                            <td><a href="editEvent">
                                    <button type="submit" id="editEvent" name="editEvent" value="<?php echo $e->activityId; ?>" formaction="editEvent" class="btn"><i class="fa fa-pencil"></i></button>
                                </a>
                            </td>
                            <td><a href="deleteEvent">
                                    <button type="submit" id="deleteEvent" name="deleteEvent" value="<?php echo $e->activityId; ?>" formaction="deleteEvent" class="btn"><i class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </form>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <a href="addEventView">
            <button type="button" class="btn btn-dark"> Add Event </button>
        </a>
    </div>
    <?php //require __DIR__ . '../../include/footer.php'; 
    ?>
</body>

</html>