<?php
	
	/**
	 * Short and friendly URIs
	 */
	// cart
	CroogoRouter::connect( __d( 'eshop', '/shop/cart', true ), array( 
		'plugin'		=> 'eshop', 
		'controller'	=> 'eshop_basket', 
		'action'		=> 'view'
	));
	
	// checkout
	CroogoRouter::connect( __d( 'eshop', '/shop/checkout', true ), array( 
		'plugin'		=> 'eshop', 
		'controller'	=> 'eshop_orders', 
		'action'		=> 'add'
	));
	
	
	// products index
	CroogoRouter::connect( __d( 'eshop', '/products', true ), array(
		'controller'	=> 'nodes', 
		'action'		=> 'index', 
		'type'			=> 'product', 
	));
	
	// product view
	CroogoRouter::connect( __d( 'eshop', '/product/:slug', true ), array(
		'controller'	=> 'nodes', 
		'action'		=> 'view', 
		'type'			=> 'product', 
	));
	

?>