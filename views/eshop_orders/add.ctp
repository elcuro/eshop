<div class="eshop-order">
        <h2><?php __('Your delivery informations');?></h2>

        <?php
        echo $form->create('EshopOrder');

        echo $form->input('name');
        echo $form->input('adress_street');
        echo $form->input('adress_city');
        echo $form->input('adress_zip');
        echo $form->input('adress_country');

        echo $form->input('contact_phone');
        echo $form->input('contact_email');

        echo $form->input('companyid');
        echo $form->input('companyid_vat');

        // you can add delivery details such as delivery_name, delivery_adress_stree etc.

        echo $form->input('payement');
        echo $form->input('shipping');

        echo $form->input('note');


        echo $form->end(__('Order!', true));

        ?>
        
</div>




