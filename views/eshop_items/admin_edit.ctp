<div class="items form">
        <h2><?php __d( 'eshop', 'Edit item'); ?></h2>
        <?php echo $form->create('EshopItem');?>
                <fieldset>
                        <?php
                        echo $form->hidden('id');
                        echo $form->hidden('node_id');
                        echo $form->input('eshop_supplier_id', array(
                            'options' => $suppliers,
                            'selected' => $this->data['EshopItem']['eshop_supplier_id'],
                            'label' => __d( 'eshop', 'Supplier', true))
                        );
                        echo $form->input('title', array('label' => __d( 'eshop', 'Title', true)));
                        echo $form->input('description', array('label' => __d( 'eshop', 'Description', true)));
                        echo $form->input('order_code', array('label' => __d( 'eshop', 'Our order code (if any)', true)));
                        echo $form->input('vat', array('label' => __d( 'eshop', 'VAT (in %)', true)));
                        echo $form->input('price_without_vat', array('label' => __d( 'eshop', 'Price without VAT', true)));
                        echo $form->input('delivery_days', array('label' => __d( 'eshop', 'Delivery (days)', true)));
                        echo $form->input('on_stock', array('label' => __d( 'eshop', 'On stock (pcs.)', true)));
                        echo $form->input('supplier_price', array('label' => __d( 'eshop', 'Supplier price', true)));
                        echo $form->input('supplier_order_code', array('label' => __d( 'eshop', 'Supplier order code', true)));
                        echo $form->input('discount_percentage', array('label' => __d( 'eshop', 'Discount (in %)', true)));
                        ?>
                </fieldset>
        <?php echo $form->end(__d( 'eshop', 'Submit', true ));?>
</div>