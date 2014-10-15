<html>
<head>
	<title></title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<h1>Buy pretty unicorns!</h1>
	<a href="/store/clear_cart">empty cart!</a>
	<a href="/store/checkout">view your cart (<?php echo $this->session->userdata('count'); ?>)</a>
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
					<td>{$product['name']}</td>
					<td>{$product['description']}</td>
					<td>{$product['price']}</td>
					<td>
						<form action='/store/add/{$product['id']}' method='post'>
							<input type='number' min='0' max='10' name='quantity'>
							<input type='submit' value='add to cart!'>
						</form>
					</td>
				</tr>";
		}
	 ?>
	</tbody>
	</table>
</body>
</html>