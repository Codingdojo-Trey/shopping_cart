<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {

	public function display()
	{
		$this->load->model('product');
		$view_data['products'] = $this->product->get_products();
		$this->load->view('display_view', $view_data);
		$this->output->enable_profiler();
	}

	public function add($id)
	{
		// grab data from post!
		$quantity = $this->input->post('quantity');
		// we know with CI sessions that if there is no key in the userdata array, the method returns false!
		$cart = $this->session->userdata('cart');
		// there is in fact a shopping cart and we have to add to it!
		if($cart)
		{
			// here, we have to add to $cart, which is already an array!
			//but first, let's see if the user already ordered some of this item:
			if(isset($cart[$id]))
			{
				$cart[$id] += $quantity;
			}
			else
			{
				$cart[$id] = $quantity;
			}
			// now that we set the temp variable, update the actual session!!
			// let's be tricky and calculate the total number of items in my session:
			$count = 0;
			foreach($cart as $item)
			{	
				//this calculates the total number of items in my shopping cart!
				$count += $item;
			}

			$this->session->set_userdata('cart', $cart);
			$this->session->set_userdata('count', $count);
			
		}
		else //we need to make that cart item!
		{	
			// this is still an associative array, it's just using the numbers as the key...very strange with php!
			$cart = array($id => $quantity);
			$this->session->set_userdata('cart', $cart);
			$this->session->set_userdata('count', $quantity);
		}
		redirect(base_url('/'));
	}

	public function clear_cart()
	{
		$this->session->unset_userdata('cart');
		$this->session->unset_userdata('count');
		redirect(base_url('/'));
	}

	public function checkout()
	{
		$this->load->model('product');
		$view_data = $this->product->get_cart($this->session->userdata('cart'));
		$this->load->view('checkout_view', $view_data);
	}
}

//end of main controller