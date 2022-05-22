
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style/cart.css?<?php echo time(); ?>" />
    <title>Shopping Cart</title>

</head>
<body>
    <?php include_once('include/navbar.php') ?>
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          <p>You have "number" items in your shopping cart</p>

				  <?php

				  foreach($tickets as $t){ ?>
					  <p class="card-subtitle"> <?php echo $t->artistname?></p>
				  <?php
				    }
				  ?>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="cart-items">
				 				<div class="event">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="../img/jazz/backgrounds/haarlem-jazz-background.png">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 event-name">
							 							<div class="event-name">
								 							<a href="#">Event title</a>
								 							<div class="event-info">
									 							<div>Time: <span class="value">...</span></div>
									 							<div>Date: <span class="value">...</span></div>
									 							<div>Location: <span class="value">...</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 cart-quantity">
							 							<label for="cart-quantity">Quantity:</label>
							 							<input id="cart-quantity" type="number" value ="1" class="form-control cart-quantity-input">
							 						</div>
							 						<div class="col-md-3 price">
							 							<span>$...</span>
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
				 				<div class="event">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="../img/jazz/backgrounds/haarlem-jazz-background.png">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 event-name">
							 							<div class="event-name">
								 							<a href="#">Event title</a>
								 							<div class="event-info">
									 							<div>Time: <span class="value">...</span></div>
									 							<div>Date: <span class="value">...</span></div>
									 							<div>Location: <span class="value">...</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 cart-quantity">
							 							<label for="cart-quantity">Quantity:</label>
							 							<input id="cart-quantity" type="number" value ="1" class="form-control cart-quantity-input">
							 						</div>
							 						<div class="col-md-3 price">
							 							<span>$...</span>
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
                                
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="cart-summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">$...</span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">$...</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">$...</span></div>
			 					<button type="button" class="btn btn-danger btn-lg btn-block">Checkout</button>
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>



