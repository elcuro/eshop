<?php
	
	/**
	 * CONTEUDO PARA O UNIQUALI
	 */
	CroogoRouter::connect('/loja/carrinho', array( 
		'plugin'		=> 'eshop', 
		'controller'	=> 'eshop_basket', 
		'action'		=> 'view'
	));
	
	
	CroogoRouter::connect('/loja/finalizar', array( 
		'plugin'		=> 'eshop', 
		'controller'	=> 'eshop_orders', 
		'action'		=> 'add'
	));
	
	
	// produtos index
	CroogoRouter::connect('/produtos', array(
		'controller'	=> 'nodes', 
		'action'		=> 'index', 
		'type'			=> 'product', 
	));
	
	// produto view
	CroogoRouter::connect('/produto/:slug', array(
		'controller'	=> 'nodes', 
		'action'		=> 'view', 
		'type'			=> 'product', 
	));
	

?>