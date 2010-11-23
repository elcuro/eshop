<?php
        Croogo::hookBehavior('Node', 'Eshop.Eshop');
        Croogo::hookHelper('*', 'Number');
        Croogo::hookHelper('Nodes', 'Eshop.Eshop');
        Croogo::hookAdminMenu('Eshop');
        Croogo::hookAdminTab('Nodes/admin_edit', 'Eshop', 'eshop.admin_tab_node', array('type' => array('product')));
?>