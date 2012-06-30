<?php echo sprintf(__d( 'eshop', 'Order no.%d confirmation email', true), $order_id);?>
<hr />

<strong><?php __d( 'eshop', 'Client'); ?></strong><br />
<?php echo sprintf(__d( 'eshop', 'Name: %s', true), $this->data['EshopOrder']['name']);?><br />
<?php echo sprintf(__d( 'eshop', 'Street: %s', true), $this->data['EshopOrder']['adress_street']);?><br />
<?php echo sprintf(__d( 'eshop', 'City: %s', true), $this->data['EshopOrder']['adress_city']);?><br />
<?php if (!empty($this->data['EshopOrder']['adress_zip']))  echo sprintf(__d( 'eshop', 'ZIP: %s'), $this->data['EshopOrder']['adress_zip']);?><br />
<?php if (!empty($this->data['EshopOrder']['adress_country']))  echo sprintf(__d( 'eshop', 'Country: %s'), $this->data['EshopOrder']['adress_zip']);?><br />
<br />
<?php echo sprintf(__d( 'eshop', 'Email: %s', true), $this->data['EshopOrder']['contact_email']);?><br />
<?php if (!empty($this->data['EshopOrder']['contact_phone'])) echo sprintf(__d( 'eshop', 'Phone: %s', true), $this->data['EshopOrder']['contact_phone']);?><br />
<br />
<?php if ($this->data['EshopOrder']['companyid']) {?>
<strong><?php __d( 'eshop', 'Invoice data'); ?></strong><br />
<?php echo sprintf(__d( 'eshop', 'Company ID: %s', true), $this->data['EshopOrder']['companyid']); ?><br />
<?php echo sprintf(__d( 'eshop', 'Company Vat ID: %s', true), $this->data['EshopOrder']['companyid_vat']); ?><br />
<?php } ?>
<br />
<strong><?php __d( 'eshop', 'Shipping and payement'); ?></strong><br />
<?php echo sprintf(__d( 'eshop', 'Shipping: %s', true), $this->data['EshopOrder']['shipping']);?><br />
<?php echo sprintf(__d( 'eshop', 'Payement: %s', true), $this->data['EshopOrder']['payement']);?><br />
<br />
<strong><?php __d( 'eshop', 'Items for order'); ?></strong><br />
<table>
        <tr>
                <th><?php __d( 'eshop', 'Order num,'); ?></th>
                <th><?php __d( 'eshop', 'Item name'); ?></th>
                <th><?php __d( 'eshop', 'Qt.'); ?></th>
                <th><?php __d( 'eshop', 'Sum without Vat'); ?></th>
                <th><?php __d( 'eshop', 'Sum with Vat'); ?></th>
        </tr>
        <?php foreach($items['Items'] as $item) {?>
        <tr>
                <td><?php echo $item['EshopItem']['id']; ?></td>
                <td><?php echo $item['EshopItem']['title']; ?></td>
                <td><?php echo $item['EshopItem']['count']; ?></td>
                <td><?php echo $number->currency($item['EshopItem']['sum_without_vat'], __d( 'eshop', 'EUR', true )); ?></td>
                <td><?php echo $number->currency($item['EshopItem']['sum_with_vat'], __d( 'eshop', 'EUR', true )); ?></td>
        </tr>
        <?php } ?>
        <tr>
                <td colspan="3">&nbsp;</td>
                <td><strong><?php __d( 'eshop', 'Total'); ?>:</strong></td>
                <td><strong><?php echo $number->currency($items['Sums']['sum_with_vat'], __d( 'eshop', 'EUR', true )); ?></strong></td>
        </tr>
</table>
<br/>
<br/>
<br/>
<?php echo Configure::read('Site.title'); ?><br/>
<?php echo Configure::read('Site.email'); ?><br/>
