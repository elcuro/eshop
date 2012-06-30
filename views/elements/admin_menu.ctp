<a href="#"><?php __d( 'eshop', 'Eshop'); ?></a>
<ul>
        <li><?php echo $html->link(__d( 'eshop', 'Orders', true), array('plugin' => 'eshop', 'controller' => 'eshop_orders', 'action' => 'index'));?></li>
        <li><?php echo $html->link(__d( 'eshop', 'Suppliers', true), array('plugin' => 'eshop', 'controller' => 'eshop_suppliers', 'action' => 'index'));?></li>
        <li><?php echo $html->link(__d( 'eshop', 'Configure', true), array('plugin' => '', 'controller' => 'settings', 'action' => 'prefix', 'Eshop')); ?></li>
</ul>