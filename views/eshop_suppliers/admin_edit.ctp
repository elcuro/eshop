<div class="suppliers form">
        <h2><?php __d( 'eshop', 'Edit supplier'); ?></h2>
        <?php echo $form->create('EshopSupplier');?>
        <fieldset>
                <?php
                echo $form->input('id');
                echo $form->input('name',array('label' => __('Name', true)));
                ?>
        </fieldset>
        <?php echo $form->end(__d( 'eshop', 'Submit', true ));?>
</div>