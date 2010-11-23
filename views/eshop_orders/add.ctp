<div class="eshop-order">
        <h2><?php __('Your delivery informations');?></h2>

        <?php
        echo $form->create('EshopOrder');

        echo $form->input('name', array('label' => __('Full name', true)));
        echo $form->input('adress_street', array('label' => __('Street', true)));
        echo $form->input('adress_city', array('label' => __('City', true)));
        echo $form->input('adress_zip', array('label' => __('ZIP', true)));
        echo $form->input('adress_country', array('label' => __('Country', true)));

        echo $form->input('contact_phone', array('label' => __('Phone', true)));
        echo $form->input('contact_email', array('label' => __('Email', true)));

        echo $form->input('companyid', array('label' => __('Company ID', true)));
        echo $form->input('companyid_vat', array('label' => __('Company VAT ID', true)));

        // you can add delivery details such as delivery_name, delivery_adress_stree etc.

        echo $form->input('payement', array('label' => __('Payement', true)));
        echo $form->input('shipping', array('label' => __('Shipping', true)));

        echo $form->input('order_note', array('label' => __('Note', true)));


        echo $form->end(__('Order!', true));

        ?>
        
</div>




