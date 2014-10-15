<html>
<head>
	<title></title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<h1>Checkout and buy your unicorn paraphernalia</h1>
	<a href="/store/clear_cart">empty cart!</a>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
	<?php 
		foreach ($products as $product) 
		{
			echo "<tr>
					<td>{$product[0]['name']}</td>
					<td>{$product[0]['description']}</td>
					<td>{$product[0]['price']}</td>
					<td>
						$product[1]
						<form action='/store/remove/{$product[0]['id']}' method='post'>
							<input type='submit' value='delete from cart!'>
						</form>
					</td>
				</tr>";
		}
	 ?>
	</tbody>
	</table>
	<h2>Your total: <?php echo $total; ?></h2>
	<h2>Checkout</h2>
	<form action='/store/complete_order' method='post'>
		Name: <input type='text' name='name'>
		Address: <input type='text' name='address'>
		Credit card #: <input type='text' name='card_number'>
		<input type='submit' value='complete order!'>
	</form>
</body>
</html>