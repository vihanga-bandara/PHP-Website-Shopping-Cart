
<html>
<?php 
session_start();
include("functions/functions.php");
?>
<head>
	<title>Categories | X-Music </title>
	<meta name="keywords" value="xmusic, music">
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="style/style.css">
	<link rel="shortcut icon" href="Images/favicon.ico"/>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-OiWEn8WwtH+084y4yW2YhhH6z/qTSecHZuk/eiWtnvLtU+Z8lpDsmhOKkex6YARr" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="Testimonials/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="Testimonials/jquery.bxslider.min.js" type="text/javascript"></script>
<link href="Testimonials/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
         $(document).ready(function () {           
             $('.bxslider').bxSlider({
                 mode: 'vertical',
                 slideMargin: 3,
                 auto:true
             });             
         });
    </script>

</head>

<body>
<?php include 'header.php';?>


<div id="horizontal" align="center">
<div class="btn-group-horizontal">

    <a href="category.php?cat=1" class="btn btn-info">Brass Instruments</a>
    <a href="category.php?cat=2" class="btn btn-primary">KeyBoard Instruments</a>
    <a href="category.php?cat=3" class="btn btn-success">Percussion Instruments</a>
    <a href="category.php?cat=4" class="btn btn-danger">String Instruments</a>
    <a href="category.php?cat=5" class="btn btn-warning">WoodWind Instruments</a>
 
</div>
</div>
<div id="inside2">
				<div class="frontcart">
				<h3><img src="Images/cart.jpg" height="40px" width="40px">
				Shopping Cart</h3><br>
				<label>Total Items: </label>
				<?php total_items(); ?> |
				<label>Total Price: </label>
				<?php total_price(); ?><br><a href="cart.php" id="button" style="color:;text-decoration:none;">Go to Cart</a> <br>
				</div>

				<div class="product-content">
				</div>				
				<?php getCatPro(); ?> </div>
				<?php cart(); ?>
				
				</div>
</div>

<?php include 'footer.php';?>

</body>
</html>