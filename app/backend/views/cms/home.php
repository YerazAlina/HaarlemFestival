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
    <br> <br> <br>

    <div class="container">
		<div class="row">
			<div class="col">
				<p style="color: black; font-weight: bold; font-size:20px;">KEEP IN MIND <br>
					THE POLICY FOR ALL THE ATTENDEES</p>
				<p style="font-weight:bold; font-size:18px;">Festival policies</p>

				<p style="font-weight:550;">What to bring with you</p>
				<ul style="list-style-type: square; font-weight:450;">
					<li>Your Ticket</li>
					<li>Photo ID</li>
					<li>QR Code (Negative test / Vaccination)</li>
				</ul>

				<p style="font-weight:550;">Festival policies</p>
				<ul style="list-style-type: square; font-weight:450;">
					<li>No sitting on designated dance floor areas</li>
					<li>No refunds or exchanges</li>
					<li>No unauthorized vendors</li>
					<li>No smoking</li>
				</ul>

				<a href="?">
					<button type="button" class="btn btn-light" style="background-color:#844242; color:white; height:50px; width: 240px;">Visit the website</button>
				</a>
			</div>

			<div class="col-8 d-flex justify-content-center text-center">
				<a href="manageUsers">
                    <br> <br> <br> <br>
					<button type="button" class="btn btn-light" style="background-color:#844242; color:white; height:160px; width: 240px;"> Manage Users </button>
				</a>
				<a href="manageContent">
                    <br> <br> <br> <br>
					<button type="button" class="btn btn-light" style="background-color:#844242; color:white; height:160px; width: 240px;"> Manage Content </button>
				</a>
			</div>

		</div>
	</div>
    <?php require __DIR__ . '/include/footer.php'; ?>
</body>

</html>