<div class="suppliers form">
    <h2><?php __d( 'eshop', 'Add supplier'); ?></h2>
    <?php echo $form->create('EshopSupplier');?>
        <fieldset>
        <?php
            echo $form->input('name',array('label' => __d( 'eshop', 'Name', true)));
        ?>
        </fieldset>
    <?php echo $form->end( __d( 'eshop', 'Submit', true ) );?>
</div>