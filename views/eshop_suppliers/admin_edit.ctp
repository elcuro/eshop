<div class="suppliers form">
        <h2><?php __('Edit supplier'); ?></h2>
        <?php echo $form->create('EshopSupplier');?>
        <fieldset>
                <?php
                echo $form->input('id');
                echo $form->input('name',array('label' => __('Name', true)));
                ?>
        </fieldset>
        <?php echo $form->end('Submit');?>
</div>