<?php 

/**
* 
*/
class ProductController extends MY_Controller
{
	
	public function index()
	{
		return $this->layout('product/product_detail');
	}
}