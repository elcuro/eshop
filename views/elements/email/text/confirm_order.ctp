<?php echo sprintf(__('Order no.%d confirmation email', true), $order_id);?>
================================================

<?php __('Client'); ?>
--------------------------------------
<?php echo sprintf(__('Name: %s', true), $this->data['EshopOrder']['name']);?>
<?php echo sprintf(__('Street: %s', true), $this->data['EshopOrder']['adress_street']);?>
<?php echo sprintf(__('City: %s', true), $this->data['EshopOrder']['adress_city']);?>
<?php if (isset($this->data['EshopOrder']['adress_zip']))  echo sprintf(__('ZIP: %s'), $this->data['EshopOrder']['adress_zip']);?>
<?php if (isset($this->data['EshopOrder']['adress_country'])) echo sprintf(__('Country: %s'), $this->data['EshopOrder']['adress_zip']);?>

<?php echo sprintf(__('Email: %s', true), $this->data['EshopOrder']['contact_email']);?>
<?php if (isset($this->data['EshopOrder']['contact_phone'])) sprintf(__('Phone: %s', true), $this->data['EshopOrder']['contact_phone']);?>

<?php if ($this->data['EshopOrder']['companyid']) {?>
<?php __('Invoice data'); ?>
--------------------------------------
<?php echo sprintf(__('Company ID: %s', true), $this->data['EshopOrder']['companyid']); ?>
<?php echo sprintf(__('Company Vat ID: %s', true), $this->data['EshopOrder']['companyid_vat']); ?>
<?php } ?>

<?php __('Shipping and payement'); ?>
--------------------------------------
<?php sprintf(__('Shipping: %s', true), $this->data['EshopOrder']['shipping']);?>
<?php sprintf(__('Payement: %s', true), $this->data['EshopOrder']['payement']);?>

<?php __('Items for order'); ?>


--
<?php echo Configure::read('Site.title'); ?>
<?php echo Configure::read('Site.email'); ?>







