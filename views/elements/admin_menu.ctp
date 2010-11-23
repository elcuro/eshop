<a href="#"><?php __('Eshop'); ?></a>
<ul>
        <li><?php echo $html->link(__('Orders', true), array('plugin' => 'eshop', 'controller' => 'eshop_orders', 'action' => 'index'));?></li>
        <li><?php echo $html->link(__('Suppliers', true), array('plugin' => 'eshop', 'controller' => 'eshop_suppliers', 'action' => 'index'));?></li>
        <li><?php echo $html->link(__('Configure', true), array('plugin' => '', 'controller' => 'settings', 'action' => 'prefix', 'Eshop')); ?></li>
</ul>