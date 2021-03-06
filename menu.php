<?php

session_start();
require "admin/includes/functions.php";
require "admin/includes/db.php";

$bfast = "";
$lunch = "";
$dinner = "";
$special = "";

$get_recent = $db->query("SELECT * FROM food");

if ($get_recent->num_rows) {

	while ($row = $get_recent->fetch_assoc()) {

		if ($row['food_category'] == "crust") {

			$bfast .= "<div class='parallax_item'>
				
							<a href='detail.php?fid=" . $row['id'] . "'><img src='image/FoodPics/" . $row['id'] . ".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>" . $row['food_name'] . "</h4>
								<p class='desc'>" . substr($row['food_description'], 0, 33) . "...</p>
								<p class='price'>#" . $row['food_price'] . "</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
		} elseif ($row['food_category'] == "cream") {

			$lunch .=	"<div class='parallax_item'>
				
							<a href='detail.php?fid=" . $row['id'] . "'><img src='image/FoodPics/" . $row['id'] . ".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>" . $row['food_name'] . "</h4>
								<p class='desc'>" . substr($row['food_description'], 0, 33) . "...</p>
								<p class='price'>#" . $row['food_price'] . "</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
		} elseif ($row['food_category'] == "fillings") {

			$dinner .= "<div class='parallax_item'>
				
							<a href='detail.php?fid=" . $row['id'] . "'><img src='image/FoodPics/" . $row['id'] . ".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>" . $row['food_name'] . "</h4>
								<p class='desc'>" . substr($row['food_description'], 0, 33) . "...</p>
								<p class='price'>#" . $row['food_price'] . "</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
		} elseif ($row['food_category'] == "special") {

			$special .= "<div class='parallax_item'>
				
							<a href='detail.php?fid=" . $row['id'] . "'><img src='image/FoodPics/" . $row['id'] . ".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>" . $row['food_name'] . "</h4>
								<p class='desc'>" . substr($row['food_description'], 0, 33) . "...</p>
								<p class='price'>#" . $row['food_price'] . "</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
		}
	}
} else { }

?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>

	<title>PieShop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/main.css" />

	<script src="js/jquery.min.js"></script>

	<script src="js/myscript.js"></script>

</head>

<body>

	<?php require "includes/header.php"; ?>

	<div class="parallax" onclick="remove_class()">

		<div class="parallax_head">

			<h2>Discover</h2>
			<h3>FOOD MENU</h3>

		</div>

	</div>

	<div class="content" onclick="remove_class()">

		<div class="inner_content on_parallax">

			<h2><span class="fresh">Crust</span></h2>

			<div class="parallax_content">

				<?php echo ($bfast == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $bfast; ?>

				<p class="clear"></p>

			</div>

		</div>

	</div>

	<div class="content" onclick="remove_class()">

		<div class="inner_content on_parallax">

			<h2><span class="fresh">Cream</span></h2>

			<div class="parallax_content">

				<?php echo ($lunch == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $lunch; ?>

				<p class="clear"></p>

			</div>

		</div>

	</div>

	<div class="content" onclick="remove_class()">

		<div class="inner_content on_parallax">

			<h2><span class="fresh">Fillings</span></h2>

			<div class="parallax_content">

				<?php echo ($dinner == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $dinner; ?>

				<p class="clear"></p>

			</div>

		</div>

	</div>

	<div class="content" onclick="remove_class()">

		<div class="inner_content on_parallax">

			<h2><span class="fresh">Special</span></h2>

			<div class="parallax_content">

				<?php echo ($special == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Your shopping basket is empty</h3>" : $special; ?>

				<p class="clear"></p>

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
						<p>&copy; <?php echo strftime("%Y", time()); ?> <span>pieshop</span>. All Rights Reserved</p>
					</div>
					<div class="icon_holder">
						<a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
						<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png" /></a>
						<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png" /></a>
					</div>
				</div>

			</div>

		</div>

</body>

</html>