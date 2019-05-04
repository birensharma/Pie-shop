<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
?>

<?php 
	if (isset($_GET['fid']) && isset($_GET['qty'])) {
		$fid = $_GET['fid'];
		$qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
		$wasFound = false;
		$i = 0;
		if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
			$_SESSION["cart_array"] = array(0 => array("item_id" => $fid, "quantity" => $qty));
		} else {
			
			$qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
			
			foreach ($_SESSION["cart_array"] as $each_item) { 
				  $i++;
				  while (list($key, $value) = each($each_item)) {
					  if ($key == "item_id" && $value == $fid) {
						  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $fid, "quantity" => $each_item['quantity'] + $qty)));
						  $wasFound = true;
					  } 
				  } 
			   } 
			   if ($wasFound == false) {
				   array_push($_SESSION["cart_array"], array("item_id" => $fid, "quantity" => $qty));
			   }
		}
		header("location: basket.php"); 
		exit();
	}
	
?>

<?php
 	if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
		unset($_SESSION["cart_array"]);
	}
	
?>



<?php 
	if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
		$key_to_remove = $_POST['index_to_remove'];
		if (count($_SESSION["cart_array"]) <= 1) {
			unset($_SESSION["cart_array"]);
		} else {
			unset($_SESSION["cart_array"]["$key_to_remove"]);
			sort($_SESSION["cart_array"]);
		}
	}
	
?>

<?php 
$cartOutput = "";
	$cartTotal = "";
	$chkbtn = "";
	$empty_cart = "";
	$chkprice = "";
	$product_id_array = "";
	
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
		
		$cartOutput = "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>";
		
	}else{
		
		$cartOutput = "<div class='single_order_head'>
				
							<h3>Food</h3>
							<h3>Price(₹)</h3>
							<h3>Qty</h3>
							<h3>Total</h3>
							<h3></h3>
							
						</div>";
						
		
		$i = 0;
		
		foreach ($_SESSION["cart_array"] as $each_item) { 
			$item_id = $each_item['item_id'];
			$sql = $db->query("SELECT * FROM food WHERE id='$item_id' LIMIT 1");
			while ($row = $sql->fetch_assoc()) {
				
				$foodName = $row['food_name'];
				$price = $row['food_price'];
				
			}
			$pricetotal = $price * $each_item['quantity'];
			$cartTotal = $pricetotal + $cartTotal;
			
			$x = $i + 1;
			
			$empty_cart = '<div class="btn btn-danger">
								<a href="basket.php?cmd=emptycart" 
								style="text-decoration:none" class="text-light">
								Empty Basket</a>
							</div>';
			
			$chkbtn = '<div class="btn btn-success">
				
							<a href="#" onclick="show_overlay();return false"
							style="text-decoration:none" class="text-light">
							 Checkout</a>
							
						</div>';
			
			$product_id_array .= "$foodName-".$each_item['quantity'].", "; 
			
			$cartOutput .= '<form style="display: inline; padding: 0; margin: 0;" action="basket.php" method="post">
			
				<div class="single_order">
					
					<p>' . $foodName . '</p>
					<p>₹' . $price . '</p>
					<p><select name="quantity" id="'.$item_id.'" onChange="update_qty(\''.$item_id.'\')"> 
						'.render_options($each_item['quantity'], $item_id).'
					</select></p>
					<p id="ajax_qty_'.$item_id.'">₹'.$pricetotal.'</p>
					<p><input name="deleteBtn' . $item_id . '" class="remove" onclick="return verify_choice();" type="submit" value="x" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></p>		
				</div>
			</form>';
			
			$chkprice .= '<input  id="chkprice" name="chkprice" value="'.$cartTotal.'" />';
			$chkfood = '<input type="hidden" id="chkfood" name="chkfood" value="'.$product_id_array.'" />';
				
			$i++; 
		}
		
		$cartTotal = '<p class="p_total"><span>Basket Total</span> : ₹'.$cartTotal.'</p>';
		
	}
	
?>

<!Doctype html>

<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<title>PieShop</title>

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>

</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax_basket" onclick="remove_class()">
	
	<div class="parallax_head_basket">
		
		<h2>Your</h2>
		<h3>Basket</h3>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="cart">Food Basket</span></h2>
		
		<div class="order_holder">
			
			<?php echo $cartOutput; ?>
			
		</div>
		
		<?php echo $cartTotal; ?>
		
		<div class="checkout_section">
			
			<?php echo $empty_cart; ?>
			
			<?php echo $chkbtn; ?>
			
		</div>
		
	</div>
	
</div>

<div class="footer_parallax" onclick="remove_class()">



		<div class="on_footer_parallax">
			<div class="content_footer" onclick="remove_class()">

				<div class="inner_content">

					<div class="contact">

						<div class="left">

							<h3>LOCATION</h3>
							<p>Niit University</p>
							<p>NH 8, Delhi- Jaipur Highway, District Alwar, Neemrana, Rajasthan 301705</p>

						</div>

						<div class="left">

							<h3>CONTACT</h3>
							<p>9928115635</p>
							<p>local.pieshop@yahoo.com</p>

						</div>
					</div>

				</div>

				<div class="footer_copyright">
					<div>
						<p>&copy; <?php echo strftime("%Y", time()); ?> <span>MyRestaurant</span>. All Rights Reserved</p>
					</div>
					<div class="icon_holder">
						<a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
						<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png" /></a>
						<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png" /></a>
					</div>
				</div>

			</div>

		</div>

<div class="overlay" id="overlay" onclick="hide_overlay()"></div>
	
	<div class="info_holder">
		
		<p class="close_p"><span class="close_sp" onclick="hide_overlay()"></span></p>
		
		<h2><span class="tag">Complete Your Order</span></h2>
		
		<form method="post" action="checkout.php">
			
			<div class="form_group">
					 
				<!-- <div class="form_group">
					
					<label>Name</label>
					<input type="text" id="name" name="name" placeholder="Enter your full name" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Address</label>
					<input type="text" id="addr"  name="addr" placeholder="Enter your address" required>
					
				</div>
				 -->
				<div class="form_group">
					
					<label>Email</label>
					<input type="Email" id="email" name="email" placeholder="Enter your email" value="shan@gmail.com">
					
				</div>
				
				 <div class="form_group">
					
					<label>Price</label>
					<!-- <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required> --> 
					<?php echo $chkprice ?>			
				</div>
				
				<div class="form_group">
					<input type="submit" class="submit" value="CONFIRM CHECKOUT" />
				</div>
				
			</div>
			
		</form>
		
	</div>

</body>

</html>