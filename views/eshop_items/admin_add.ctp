<div class="items form">
        <h2>
                <?php __('Add item for'); ?>&nbsp;
                <?php 
                echo $html->link($node['Node']['title'], array(
                    'plugin' => false,
                    'controller' => 'nodes',
                    'action' => 'edit',
                    $node['Node']['id'])
                );?>
        </h2>
        <?php echo $form->create('EshopItem', array('url' => array($node['Node']['id'])));?>
                <fieldset>
                        <?php
                        echo $form->hidden('node_id', array('value' => $node['Node']['id']));
                        echo $form->hidden('parent_id', array('value' => $node['Node']['id']));
                        echo $form->input('eshop_supplier_id', array('options' => $suppliers, 'label' => __('Supplier', true)));
                        echo $form->input('title', array('label' => __('Title', true)));
                        echo $form->input('description', array('label' => __('Description', true)));
                        echo $form->input('order_code', array('label' => __('Our order code (if any)', true)));
                        echo $form->input('vat', array('value' => 19, 'label' => __('VAT (in %)', true)));
                        echo $form->input('price_without_vat', array('label' => __('Price without VAT', true)));
                        echo $form->input('delivery_days', array('value' => 7,'label' => __('Delivery (days)', true)));
                        echo $form->input('on_stock', array('value' => 1, 'label' => __('On stock (pcs.)', true)));
                        echo $form->input('supplier_price', array('label' => __('Supplier price', true)));
                        echo $form->input('supplier_order_code', array('label' => __('Supplier order code', true)));
                        echo $form->input('discount_percentage', array('label' => __('Discount (in %)', true)));
                        ?>
                </fieldset>
        <?php echo $form->end('Submit');?>
</div>