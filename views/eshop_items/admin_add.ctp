<div class="items form">
        <h2>
                <?php __d( 'eshop', 'Add item for'); ?>&nbsp;
                <?php 
                echo $this->Html->link($node['Node']['title'], array(
                    'plugin' => false,
                    'controller' => 'nodes',
                    'action' => 'edit',
                    $node['Node']['id'])
                );?>
        </h2>
        <?php echo $this->Form->create('EshopItem', array('url' => array($node['Node']['id'])));?>
                <fieldset>
                        <?php
                        echo $this->Form->hidden('node_id', array('value' => $node['Node']['id']));
                        echo $this->Form->hidden('parent_id', array('value' => $node['Node']['id']));
                        echo $this->Form->input('eshop_supplier_id', array('options' => $suppliers, 'label' => __d( 'eshop', 'Supplier', true)));
                        echo $this->Form->input('title', array('label' => __d( 'eshop', 'Title', true)));
                        echo $this->Form->input('description', array('label' => __d( 'eshop', 'Description', true)));
                        echo $this->Form->input('order_code', array('label' => __d( 'eshop', 'Our order code (if any)', true)));
                        echo $this->Form->input('vat', array('value' => Configure::read('Eshop.vat'), 'label' => __d( 'eshop', 'VAT (in %)', true)));
                        echo $this->Form->input('price_without_vat', array('label' => __d( 'eshop', 'Price without VAT', true)));
                        echo $this->Form->input('delivery_days', array('value' => 7,'label' => __d( 'eshop', 'Delivery (days)', true)));
                        echo $this->Form->input('on_stock', array('value' => 1, 'label' => __d( 'eshop', 'On stock (pcs.)', true)));
                        echo $this->Form->input('supplier_price', array('label' => __d( 'eshop', 'Supplier price', true)));
                        echo $this->Form->input('supplier_order_code', array('label' => __d( 'eshop', 'Supplier order code', true)));
                        echo $this->Form->input('discount_percentage', array('label' => __d( 'eshop', 'Discount (in %)', true)));
                        ?>
                </fieldset>
        <?php echo $this->Form->end(__d( 'eshop', 'Submit', true));?>
</div>