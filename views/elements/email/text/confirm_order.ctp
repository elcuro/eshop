<?php echo sprintf(__d( 'eshop', 'Order no.%d confirmation email', true), $order_id);?>
================================================

<?php __d( 'eshop', 'Client'); ?>
--------------------------------------
<?php echo sprintf(__d( 'eshop', 'Name: %s', true), $this->data['EshopOrder']['name']);?>
<?php echo sprintf(__d( 'eshop', 'Street: %s', true), $this->data['EshopOrder']['adress_street']);?>
<?php echo sprintf(__d( 'eshop', 'City: %s', true), $this->data['EshopOrder']['adress_city']);?>
<?php if (isset($this->data['EshopOrder']['adress_zip']))  echo sprintf(__d( 'eshop', 'ZIP: %s'), $this->data['EshopOrder']['adress_zip']);?>
<?php if (isset($this->data['EshopOrder']['adress_country'])) echo sprintf(__d( 'eshop', 'Country: %s'), $this->data['EshopOrder']['adress_zip']);?>

<?php echo sprintf(__d( 'eshop', 'Email: %s', true), $this->data['EshopOrder']['contact_email']);?>
<?php if (isset($this->data['EshopOrder']['contact_phone'])) sprintf(__d( 'eshop', 'Phone: %s', true), $this->data['EshopOrder']['contact_phone']);?>

<?php if ($this->data['EshopOrder']['companyid']) {?>
<?php __d( 'eshop', 'Invoice data'); ?>
--------------------------------------
<?php echo sprintf(__d( 'eshop', 'Company ID: %s', true), $this->data['EshopOrder']['companyid']); ?>
<?php echo sprintf(__d( 'eshop', 'Company Vat ID: %s', true), $this->data['EshopOrder']['companyid_vat']); ?>
<?php } ?>

<?php __d( 'eshop', 'Shipping and payement'); ?>
--------------------------------------
<?php sprintf(__d( 'eshop', 'Shipping: %s', true), $this->data['EshopOrder']['shipping']);?>
<?php sprintf(__d( 'eshop', 'Payement: %s', true), $this->data['EshopOrder']['payement']);?>

<?php __d( 'eshop', 'Items for order'); ?>

<?php foreach($items['Items'] as $item) {?>
	<?php echo $item['EshopItem']['count']; ?> <?php echo $item['EshopItem']['title']; ?> <?php echo $number->currency($item['EshopItem']['sum_with_vat'], __d( 'eshop', 'EUR', true )); ?>
<?php } ?>


<strong><?php __d( 'eshop', 'Total'); ?>:</strong>: <strong><?php echo $number->currency($items['Sums']['sum_with_vat'], __d( 'eshop', 'EUR', true )); ?></strong>

--
<?php echo Configure::read('Site.title'); ?>
<?php echo Configure::read('Site.email'); ?>







