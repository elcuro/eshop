<div class="items form">
        <h2><?php __('Edit item'); ?></h2>
        <?php echo $form->create('EshopItem');?>
                <fieldset>
                        <?php
                        echo $form->hidden('id');
                        echo $form->hidden('node_id');
                        echo $form->input('eshop_supplier_id', array(
                            'options' => $suppliers,
                            'selected' => $this->data['EshopItem']['eshop_supplier_id'],
                            'label' => __('Supplier', true))
                        );
                        echo $form->input('title', array('label' => __('Title', true)));
                        echo $form->input('description', array('label' => __('Description', true)));
                        echo $form->input('order_code', array('label' => __('Our order code (if any)', true)));
                        echo $form->input('vat', array('label' => __('VAT (in %)', true)));
                        echo $form->input('price_without_vat', array('label' => __('Price without VAT', true)));
                        echo $form->input('delivery_days', array('label' => __('Delivery (days)', true)));
                        echo $form->input('on_stock', array('label' => __('On stock (pcs.)', true)));
                        echo $form->input('supplier_price', array('label' => __('Supplier price', true)));
                        echo $form->input('supplier_order_code', array('label' => __('Supplier order code', true)));
                        echo $form->input('discount_percentage', array('label' => __('Discount (in %)', true)));
                        ?>
                </fieldset>
        <?php echo $form->end('Submit');?>
</div>