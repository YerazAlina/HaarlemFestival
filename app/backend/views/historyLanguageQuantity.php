<!DOCTYPE html>
<html lang="en">
	<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../css/historystyle.css?<?php echo time(); ?>">


	</head>

<header>
<?php

require __DIR__ . '/navbar.php';
?>
</header>


<body>





 <br> 
 <br> 
 
  <!-- creating language and quantity -->
<div class="container">
 <div class="row">
 <div class="col-md-6">
 <h3>Language: </h3>
 <br>
 <input type="radio" id="languages" name="language" value="English">
 <label for="html">English</label><br>
  <input type="radio" id="languages" name="language" value="Dutch">
 <label for="css">Dutch</label><br>
  <input type="radio" id="languages" name="language" value="Chinese">
 <label for="javascript">Chinese</label>

 </div>
 



 <div class="col-md-6">
 <h3>Quantity: </h3>
   <br> 

        <button type="button" class="qtyBtn" onclick="increase_by_one('<?php echo $formNumber ?>','amount');">+</button>
            	<input id="<?php echo $formNumber ?>" type="text" value="0" name="J1" style="width:10%;"/>                          
                    <button type="button" class="qtyBtn" onclick="decrease_by_one('<?php echo $formNumber ?>','amount');">-</button>
                    <br><br><br><br><br>

        <button class="btn-add-to-cart" type="button" onclick="location.href='historyLanguageQuantity'">Add to cart >></button>
    </div>

    </div>
    
</div>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>  


<?php require __DIR__ . '/footer.php';?>

</body>
</html>