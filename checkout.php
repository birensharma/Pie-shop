<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title>Merchant Check Out Page</title>
	<meta name="GENERATOR" content="Evrsoft First Page">
</head>

<body style="background-image:url(./image/dish_2.jpg)">
<center>
    <form method="post" action="./paytm/PaytmKit/pgRedirect.php" class="card mt-5 p-5" style="width:40%">
    <h1 class="card-title">Checkout</h1>

		<table>
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
			
				<tr>
					<td>3</td>
					<td><label>Amount</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value=<?php echo $_POST['chkprice'] ?>>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit" onclick="" class="btn btn-primary"></td>
				</tr>
			</tbody>
		</table>
    </form>
</center>
</body>

</html>