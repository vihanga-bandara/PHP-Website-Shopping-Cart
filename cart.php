
<html>
<?php 
session_start();
include("functions/functions.php");
?>
<head>
	<title>View Cart | X-Music </title>
	<meta name="keywords" value="xmusic, music">
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="shortcut icon" href="Images/favicon.ico"/>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-OiWEn8WwtH+084y4yW2YhhH6z/qTSecHZuk/eiWtnvLtU+Z8lpDsmhOKkex6YARr" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
<?php include 'header.php';?>

<div id="inside2">

<h1 align="center">View Cart</h1>

<div class="backtable">
				<form action="#" method="post" enctype="multipart/form-data">
					<table width="960px">
						<thead>
						<tr>
							<th>Remove</th>
							<th>Product(s)</th>
							<th>Quantity</th>
							<th>TotalPrice</th>
						</tr>
						</thead>
					<?php 
						$total_price=0;
	global $con;
	
	$ip=getIp();
	
	$sel_price="SELECT * FROM cart WHERE ip_add='$ip'";
	
	$run_price=mysqli_query($con, $sel_price);
	
	
	while ($pro_price=mysqli_fetch_array($run_price)){
		
		$pro_id=$pro_price['p_id'];
		$pro_qty=$pro_price['qty'];
		$pro_price="SELECT * FROM products WHERE product_id='$pro_id'";
		
		$run_pro_price=mysqli_query($con,$pro_price);
		
		while($row_p_price = mysqli_fetch_array($run_pro_price)){
			$pro_price = $row_p_price['product_price'];
			$pro_title = $row_p_price['product_title'];
			$pro_image = $row_p_price['product_image'];
			$single_price = $row_p_price['product_price'];
			if($pro_qty>1){
				$pro_price = $pro_price*$pro_qty;
			}
			$total_price = $total_price+$pro_price;		


						
						?><tr align="center">
							<td><input type="checkbox" name="remove[]"value="<?php echo $pro_id;?>"/></td>
							<td><?php echo $pro_title ;?><br>
							<img src="admin_area/product_images/<?php echo $pro_image;?>" width="60" height="60"/>
							</td>
							<td><input type="text" value="<?php echo $pro_qty;?>"size="3"name="qty"/></td>
							<?php
		if(isset($_POST['update_cart_qty'])){
					
							$qty=$_POST['qty'];
							
							$update_qty="UPDATE  `ecommerce`.`cart` SET  `qty` =  '$qty' WHERE ip_add='$ip' ANd p_id='$pro_id'";
							$run_qty=mysqli_query($con,$update_qty);
		}
							?>
							<td><?php echo "Rs ".$single_price;?></td>
						</tr>						
	<?php }} ?>
	
						<tr align="right">
							<td colspan="3"><b>Sub Total: </b></td>
							<td align="center"colspan="4"><?php echo "Rs ".$total_price; ?></td>
						</tr>
			
						<tr align="center">
							<td><input id="button" type="submit" value="Remove Product" name="update_cart"/></td>
							<td><input id="button" type="submit" value="Update Quantity" name="update_cart_qty"/></td>
							<td><button id="button" ><a href="category.php" style="text-decoration:none;">Continue Shopping</a></button></td>
							<td><button id="button" ><a href="checkoutdetails.php" style="text-decoration:none;color:#FF0033;">Checkout</a></button></td>
						</tr>
					</table>
				</form>
	<?php
	if(isset($_POST['update_cart'])){
		
		foreach($_POST['remove'] as $remove_id){ //foreach is use to delete all ids at once
			
		$delete_product="DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'";
		$run_delete = mysqli_query($con,$delete_product);
			if($run_delete){
				header("Refresh:0");
			}
		}
		
		
	}

	?>
</div></div>
<?php include 'footer.php';?>

</body>
</html>