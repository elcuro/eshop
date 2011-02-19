<div class="items form">
        <h2>
                <?php __('Add item for'); ?>&nbsp;
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
                        echo $this->Form->input('eshop_supplier_id', array('options' => $suppliers, 'label' => __('Supplier', true)));
                        echo $this->Form->input('title', array('label' => __('Title', true)));
                        echo $this->Form->input('description', array('label' => __('Description', true)));
                        echo $this->Form->input('order_code', array('label' => __('Our order code (if any)', true)));
                        echo $this->Form->input('vat', array('value' => Configure::read('Eshop.vat'), 'label' => __('VAT (in %)', true)));
                        echo $this->Form->input('price_without_vat', array('label' => __('Price without VAT', true)));
                        echo $this->Form->input('delivery_days', array('value' => 7,'label' => __('Delivery (days)', true)));
                        echo $this->Form->input('on_stock', array('value' => 1, 'label' => __('On stock (pcs.)', true)));
                        echo $this->Form->input('supplier_price', array('label' => __('Supplier price', true)));
                        echo $this->Form->input('supplier_order_code', array('label' => __('Supplier order code', true)));
                        echo $this->Form->input('discount_percentage', array('label' => __('Discount (in %)', true)));
                        ?>
                </fieldset>
        <?php echo $this->Form->end(__('Submit', true));?>
</div>