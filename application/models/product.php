<?php 
	class Product extends CI_Model {
		public function get_products()
		{
			$query = "SELECT * FROM products";
			return $this->db->query($query)->result_array();
		}

		// this function is going to do a lot of heavy lifting for us because we don't want to do it on the controller side
		public function get_cart($array_of_ids)
		{
			$data = array('total' => 0, 'products' => array());
			foreach ($array_of_ids as $id => $quantity) 
			{
				$query = "SELECT * FROM products WHERE id = {$id}";
				// add to data!
				$product = $this->db->query($query)->row_array();
				$data['total'] += ($quantity * $product['price']);
				$data['products'][] = array( $product, $quantity);
			}
			return $data;
		}
	}
 ?>
