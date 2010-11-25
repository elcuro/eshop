<?php echo sprintf(__('Order no.%d confirmation email', true), $order_id);?>
<hr />

<strong><?php __('Client'); ?></strong><br />
<?php echo sprintf(__('Name: %s', true), $this->data['EshopOrder']['name']);?><br />
<?php echo sprintf(__('Street: %s', true), $this->data['EshopOrder']['adress_street']);?><br />
<?php echo sprintf(__('City: %s', true), $this->data['EshopOrder']['adress_city']);?><br />
<?php if (!empty($this->data['EshopOrder']['adress_zip']))  echo sprintf(__('ZIP: %s'), $this->data['EshopOrder']['adress_zip']);?><br />
<?php if (!empty($this->data['EshopOrder']['adress_country']))  echo sprintf(__('Country: %s'), $this->data['EshopOrder']['adress_zip']);?><br />
<br />
<?php echo sprintf(__('Email: %s', true), $this->data['EshopOrder']['contact_email']);?><br />
<?php if (!empty($this->data['EshopOrder']['contact_phone'])) echo sprintf(__('Phone: %s', true), $this->data['EshopOrder']['contact_phone']);?><br />
<br />
<?php if ($this->data['EshopOrder']['companyid']) {?>
<strong><?php __('Invoice data'); ?></strong><br />
<?php echo sprintf(__('Company ID: %s', true), $this->data['EshopOrder']['companyid']); ?><br />
<?php echo sprintf(__('Company Vat ID: %s', true), $this->data['EshopOrder']['companyid_vat']); ?><br />
<?php } ?>
<br />
<strong><?php __('Shipping and payement'); ?></strong><br />
<?php echo sprintf(__('Shipping: %s', true), $this->data['EshopOrder']['shipping']);?><br />
<?php echo sprintf(__('Payement: %s', true), $this->data['EshopOrder']['payement']);?><br />
<br />
<strong><?php __('Items for order'); ?></strong><br />
<table>
        <tr>
                <th><?php __('Order num,'); ?></th>
                <th><?php __('Item name'); ?></th>
                <th><?php __('Qt.'); ?></th>
                <th><?php __('Sum without Vat'); ?></th>
                <th><?php __('Sum with Vat'); ?></th>
        </tr>
        <?php foreach($items['Items'] as $item) {?>
        <tr>
                <td><?php echo $item['EshopItem']['id']; ?></td>
                <td><?php echo $item['EshopItem']['title']; ?></td>
                <td><?php echo $item['EshopItem']['count']; ?></td>
                <td><?php echo $number->currency($item['EshopItem']['sum_without_vat'], 'EUR'); ?></td>
                <td><?php echo $number->currency($item['EshopItem']['sum_with_vat'], 'EUR'); ?></td>
        </tr>
        <?php } ?>
        <tr>
                <td colspan="3">&nbsp;</td>
                <td><strong><?php __('Total'); ?>:</strong></td>
                <td><strong><?php echo $number->currency($items['Sums']['sum_with_vat'], 'EUR'); ?></strong></td>
        </tr>
</table>
<br/>
<br/>
<br/>
<?php echo Configure::read('Site.title'); ?><br/>
<?php echo Configure::read('Site.email'); ?><br/>
