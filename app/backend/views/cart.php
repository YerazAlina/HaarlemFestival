
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		          <p>You have <?php if(empty($_SESSION['cart'])){ echo '0' ; } else { echo count($_SESSION['cart']); } ?> event(s) in your shopping cart</p>
				  	<form method="post">   
						<button type="submit" id="clearCart" name="clearCart" formaction="cart" class="btn btn-outline-danger btn-sm">Clear Cart</button>
										
					</form>

		        </div>

		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="cart-items">

								<?php 
								
								if(!empty($_SESSION['cart'])) {

									
									foreach($_SESSION['cart'] as $items=>$values){ 
										//printf($values['id']) ;
										?>
										

										<div class="event">
											<div class="row">
												<div class="col-md-3">
												
													<img class="img-fluid mx-auto d-block image" src="../img/cart/<?php echo $values['name']?>.png">
												</div>
												<div class="col-md-8">
													<div class="info">
														<div class="row">
															<div class="col-md-5 event-name">
																<div class="event-name">
																	<b><?php echo $values['name']?></b>
																	<div class="event-info">
																		<div>Time: <span class="value"><?php echo $values['startTime'] ?> - <?php echo $values['endTime']?></span></div>
																		<div>Date: <span class="value"><?php echo $values['date']?></span></div>
																		<div>Price: <span class="value">$<?php echo $values['price']?></span></div>
																		<div>Location: <span class="value"><?php

																		if(empty($values['location'])){
																			echo $values['address'];
																		}else{
																			echo $values['location'];
																		}
																		
																		
																		?></span></div>
																	</div>
																</div>
															</div>
															<div class="col-md-4 cart-quantity"> 
																<form method="post">
																	<button type="submit" id="subtractQuantity" name="subtractQuantity" value="<?php echo $values['id']?>" formaction="cart"> - </button>
																	<label for="cart-quantity"> <?php echo $values['quantity']?> </label>
																	<?php if($values['quantity'] == $values['ticketsLeft']) { ?>
																		<button type="button" disabled> + </button>
																	<?php } 
																	else {?> <button type="submit" id="addQuantity" name="addQuantity" value="<?php echo $values['id']?>" formaction="cart"> + </button> <?php } ?>

																	
																</form>	
															</div>
															
															<form method="post">   
																<button type="submit" id="removeTicket" name="removeTicket" value="<?php echo $values['id']?>" formaction="cart" class="btn btn-outline-warning btn-sm">Remove from cart</button>
											
															</form> 
									

											
														</div>
													</div>
												</div>
											</div>
										</div>
										
									<?php 
									}
									
								} else {
									echo "CART IS EMPTY ! ";
								} ?>

							</div>
						</div>
						<div class="col-md-12 col-lg-4">

						
							<form method="post">
								<div class="cart-summary">
									<h3>Summary</h3>
									<div class="summary-item" >
										<span class="text" >
											Subtotal
										</span>
										<span class="price" id="cart_subtotal" name="cart_subtotal">
											<?php 
													$total = 0;
													if(!empty($_SESSION['cart'])){
														foreach($_SESSION['cart'] as $items=>$values){
															$total += $values['price'] * $values['quantity'];
														} 
													}	
													
													echo '$'. $total;
																														
												?>
										</span>
									</div>
									
									<div class="summary-item" >
										<span class="text" >
											VAT (21%)
										</span>

										<span class="price" id="cart_vat" name="cart_vat">
											<?php echo '$'. $total * (0.21) ?>
										</span>
									</div>

									<div class="summary-item" >
										<span class="text" >
											Total
										</span>

										<span class="price" id="cart_total" name="cart_total">
											<?php echo '$'. ($total * (0.21)) + $total ?>
										</span>
									</div>
									
									<br> </br>
									<h6> <b>  Enter your details :  <b> </h6>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="customer_full_name">Full name</label>
												<input type="text" class="form-control" id="customer_full_name" name="customer_full_name" placeholder="Full name">
											</div>
											<div class="form-group col-md-6">
												<label for="customer_email">Email</label>
												<input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email">
											</div>
											<div class="form-group col-md-6">
												<label for="customer_phone_number">Phone number</label>
												<input type="text" class="form-control" id="customer_phone_number" name="customer_phone_number" placeholder="Phone number">
											</div>
											<div class="form-group">
												<label for="customer_address">Address</label>
												<input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="1234 Main St">
											</div>
											<div class="form-group">
												<label for="customer_house_num">House number</label>
												<input type="text" class="form-control" id="customer_house_num" name="customer_house_num" placeholder="Apartment, studio, or floor">
											</div>
											<div class="form-row">
												<label for="customer_city">City</label>
												<input type="text" class="form-control" id="customer_city" name="customer_city">
											</div>
											<div class="form-row">
												<label for="customer_post_code">Post Code</label>
												<input type="text" class="form-control" id="customer_post_code" name="customer_post_code">
											</div>
										</div>	
									
									<button type="submit" id="purchaseTickets" name="purchaseTickets" formaction="purchase" class="btn btn-danger btn-lg btn-block">Confirm Order</button>
									
								</div>
							</form>

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



