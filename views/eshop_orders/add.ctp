<div class="eshop-order index">
        <h2><?php __d( 'eshop', 'Your delivery informations');?></h2>

        <?php
        echo $form->create('EshopOrder');

        echo $form->input('name', array('label' => __d( 'eshop', 'Full name', true)));
        echo $form->input('adress_street', array('label' => __d( 'eshop', 'Street', true)));
        echo $form->input('adress_city', array('label' => __d( 'eshop', 'City', true)));
        echo $form->input('adress_zip', array('label' => __d( 'eshop', 'ZIP', true)));
        echo $form->input('adress_country', array('label' => __d( 'eshop', 'Country', true)));

        echo $form->input('contact_phone', array('label' => __d( 'eshop', 'Phone', true)));
        echo $form->input('contact_email', array('label' => __d( 'eshop', 'Email', true)));

        echo $form->input('companyid', array('label' => __d( 'eshop', 'Company ID', true)));
        echo $form->input('companyid_vat', array('label' => __d( 'eshop', 'Company VAT ID', true)));

        // you can add delivery details such as delivery_name, delivery_adress_stree etc.

        echo $form->input('payement', array('label' => __d( 'eshop', 'Payement', true)));
        echo $form->input('shipping', array('label' => __d( 'eshop', 'Shipping', true)));

        echo $form->input('order_note', array('label' => __d( 'eshop', 'Note', true)));


        echo $form->end(__d( 'eshop', 'Order!', true));

        ?>
        
</div>




