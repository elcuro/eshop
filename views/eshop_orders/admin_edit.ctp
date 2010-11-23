<style rel="stylesheet">
/* this styles are only for demonstration, will be removed in next updates !!! */
.orders dl
{
        width: 600px;
        margin-bottom: 15px;
}
.orders dt
{
        width: 250px;
        float: left;
        font-weight: bold;
}
.orders dd
{
        margin-left: 200px;
        width: 350px;
}
h3
{
        clear: left;
}
</style>

<div class="orders form">
        <h2><?php __('Edit order'); ?></h2>

        <div class="actions">
                <ul>
                        <li><?php echo $html->link(__('Show all orders', true), array('action'=>'index')); ?></li>
                </ul>
        </div>

        <?php echo $form->create('EshopOrder'); ?>
        <fieldset>
                <?php
                echo $form->input('id');
                ?>
                <?php echo $form->input('status', array('label' => 'Change status of this order')); ?>
                <h3><?php __('Client'); ?></h3>
                <dl>
                        <dt><?php __('Name'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['name']; ?></dd>
                        <dt><?php __('Street'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['adress_street']; ?></dd>
                        <dt><?php __('City'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['adress_city']; ?></dd>
                        <dt><?php __('ZIP'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['adress_zip']) ? $this->data['EshopOrder']['adress_zip'] : __('N/A', true); ?></dd>
                        <dt><?php __('Country'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['adress_country']) ? $this->data['EshopOrder']['adress_country'] : __('N/A', true); ?></dd>
                </dl>
                <h3><?php __('Company data'); ?></h3>
                <dl>
                        <dt><?php __('Company id. number'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['companyid']) ? $this->data['EshopOrder']['companyid'] : __('N/A', true); ?></dd>
                        <dt><?php __('Company id. number for Vat'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['companyid_vat']) ? $this->data['EshopOrder']['companyid_vat'] : __('N/A', true); ?></dd>
                </dl>
                <h3><?php __('Contact data'); ?></h3>
                <dl>
                        <dt><?php __('Email'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['contact_email']; ?></dd>
                        <dt><?php __('Phone'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['contact_phone']) ? $this->data['EshopOrder']['contact_phone'] : __('N/A', true); ?></dd>
                        <dt><?php __('Fax'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['contact_fax']) ? $this->data['EshopOrder']['contact_fax'] : __('N/A', true); ?></dd>
                </dl>
                <h3><?php __('Delivery adress'); ?></h3>
                <dl>
                        <dt><?php __('Name'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_name']) ? $this->data['EshopOrder']['delivery_name'] : $this->data['EshopOrder']['name']; ?></dd>
                        <dt><?php __('Street'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_street']) ? $this->data['EshopOrder']['delivery_adress_street'] : $this->data['EshopOrder']['adress_street']; ?></dd>
                        <dt><?php __('City'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_city']) ? $this->data['EshopOrder']['delivery_adress_city'] : $this->data['EshopOrder']['adress_city']; ?></dd>
                        <dt><?php __('ZIP'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_zip']) ? $this->data['EshopOrder']['delivery_adress_zip'] : $this->data['EshopOrder']['adress_zip']; ?>&nbsp;</dd>
                        <dt><?php __('Country'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_country']) ? $this->data['EshopOrder']['delivery_adress_country'] : $this->data['EshopOrder']['adress_country']; ?></dd>
                </dl>
                <h3><?php __('Shipping and payement'); ?></h3>
                <dl>
                        <dt><?php __('Shipping'); ?>:</dt>
                        <dd><?php __($this->data['EshopOrder']['shipping']); ?></dd>
                        <dt><?php __('Payement'); ?>:</dt>
                        <dd><?php __($this->data['EshopOrder']['payement']); ?></dd>
                </dl>
                <h3><?php __('Note'); ?></h3>
                <dl>
                        <dt>&nbsp;</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['order_note']) ? $this->data['EshopOrder']['order_note'] : __('Without note', true); ?></dd>
                </dl>
                <h3><?php __('Items'); ?></h3>
                <table cellpadding="0" cellspacing="0">
                        <?php
                        $tableHeaders = $html->tableHeaders(array(
                                    'id',
                                    __('Title', true),
                                    __('Qt.', true),
                                    __('Sum without Vat', true),
                                    __('Sum with Vat', true),
                                ));

                        echo $tableHeaders;

                        $rows = array();
                        foreach ($items['Items'] as $item) {
                                $rows[] = array(
                                    $item['EshopItem']['id'],
                                    $item['EshopItem']['title'],
                                    $item['EshopItem']['count'],
                                    $number->currency($item['EshopItem']['sum_without_vat'], 'EUR'),
                                    '<strong>' . $number->currency($item['EshopItem']['sum_with_vat'], 'EUR') . '</strong>'
                                );
                        }

                        echo $html->tableCells($rows);
                        ?>
                </table>
                <dl>
                        <dt><?php __('Total sum without Vat'); ?>:</dt>
                        <dd><?php echo $number->currency($items['Sums']['sum_without_vat'], 'EUR'); ?></dd>
                        <dt><?php __('Total sum with Vat'); ?>:</dt>
                        <dd><strong><?php echo $number->currency($items['Sums']['sum_with_vat'], 'EUR'); ?></strong></dd>
                </dl>
                <?php echo $form->input('note', array('label' => 'Your notes for this order')); ?>                
        </fieldset>
        <?php echo $form->end('Submit'); ?>
</div>