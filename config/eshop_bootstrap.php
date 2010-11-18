<?php
        Croogo::hookAdminMenu('Eshop');
        Croogo::hookBehavior('Node', 'Eshop.Eshop');
        //Croogo::hookAdminRowAction('Nodes/admin_index', 'Eshop', 'plugin:eshop/controller:eshop_items/action:index/:id');
        Croogo::hookAdminTab('Nodes/admin_edit', 'Eshop', 'eshop.admin_tab_node', array('type' => array('product')));
?>