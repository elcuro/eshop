

<div class="orders form">
        <h2><?php __d( 'eshop', 'Edit order'); ?></h2>

        <div class="actions">
                <ul>
                        <li><?php echo $html->link(__d( 'eshop', 'Show all orders', true), array('action'=>'index')); ?></li>
                </ul>
        </div>

        <?php echo $form->create('EshopOrder'); ?>
        <fieldset>
                <?php
                echo $form->input('id');
                ?>
                <?php echo $form->input('status', array('label' => __d( 'eshop', 'Change status of this order', true ))); ?>
                <h3><?php __d( 'eshop', 'Client'); ?></h3>
                <dl>
                        <dt><?php __d( 'eshop', 'Name'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['name']; ?></dd>
                        <dt><?php __d( 'eshop', 'Street'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['adress_street']; ?></dd>
                        <dt><?php __d( 'eshop', 'City'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['adress_city']; ?></dd>
                        <dt><?php __d( 'eshop', 'ZIP'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['adress_zip']) ? $this->data['EshopOrder']['adress_zip'] : __d( 'eshop', 'N/A', true); ?></dd>
                        <dt><?php __d( 'eshop', 'Country'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['adress_country']) ? $this->data['EshopOrder']['adress_country'] : __d( 'eshop', 'N/A', true); ?></dd>
                </dl>
                <h3><?php __d( 'eshop', 'Company data'); ?></h3>
                <dl>
                        <dt><?php __d( 'eshop', 'Company id. number'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['companyid']) ? $this->data['EshopOrder']['companyid'] : __d( 'eshop', 'N/A', true); ?></dd>
                        <dt><?php __d( 'eshop', 'Company id. number for Vat'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['companyid_vat']) ? $this->data['EshopOrder']['companyid_vat'] : __d( 'eshop', 'N/A', true); ?></dd>
                </dl>
                <h3><?php __d( 'eshop', 'Contact data'); ?></h3>
                <dl>
                        <dt><?php __d( 'eshop', 'Email'); ?>:</dt>
                        <dd><?php echo $this->data['EshopOrder']['contact_email']; ?></dd>
                        <dt><?php __d( 'eshop', 'Phone'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['contact_phone']) ? $this->data['EshopOrder']['contact_phone'] : __d( 'eshop', 'N/A', true); ?></dd>
                        <dt><?php __d( 'eshop', 'Fax'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['contact_fax']) ? $this->data['EshopOrder']['contact_fax'] : __d( 'eshop', 'N/A', true); ?></dd>
                </dl>
                <h3><?php __d( 'eshop', 'Delivery adress'); ?></h3>
                <dl>
                        <dt><?php __d( 'eshop', 'Name'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_name']) ? $this->data['EshopOrder']['delivery_name'] : $this->data['EshopOrder']['name']; ?></dd>
                        <dt><?php __d( 'eshop', 'Street'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_street']) ? $this->data['EshopOrder']['delivery_adress_street'] : $this->data['EshopOrder']['adress_street']; ?></dd>
                        <dt><?php __d( 'eshop', 'City'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_city']) ? $this->data['EshopOrder']['delivery_adress_city'] : $this->data['EshopOrder']['adress_city']; ?></dd>
                        <dt><?php __d( 'eshop', 'ZIP'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_zip']) ? $this->data['EshopOrder']['delivery_adress_zip'] : $this->data['EshopOrder']['adress_zip']; ?>&nbsp;</dd>
                        <dt><?php __d( 'eshop', 'Country'); ?>:</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['delivery_adress_country']) ? $this->data['EshopOrder']['delivery_adress_country'] : $this->data['EshopOrder']['adress_country']; ?></dd>
                </dl>
                <h3><?php __d( 'eshop', 'Shipping and payement'); ?></h3>
                <dl>
                        <dt><?php __d( 'eshop', 'Shipping'); ?>:</dt>
                        <dd><?php __d( 'eshop', $this->data['EshopOrder']['shipping']); ?></dd>
                        <dt><?php __d( 'eshop', 'Payement'); ?>:</dt>
                        <dd><?php __d( 'eshop', $this->data['EshopOrder']['payement']); ?></dd>
                </dl>
                <h3><?php __d( 'eshop', 'Note'); ?></h3>
                <dl>
                        <dt>&nbsp;</dt>
                        <dd><?php echo!empty($this->data['EshopOrder']['order_note']) ? $this->data['EshopOrder']['order_note'] : __d( 'eshop', 'Without note', true); ?></dd>
                </dl>
                <h3><?php __d( 'eshop', 'Items'); ?></h3>
                <table cellpadding="0" cellspacing="0">
                        <?php
                        $tableHeaders = $html->tableHeaders(array(
                                    'id',
                                    __d( 'eshop', 'Title', true),
                                    __d( 'eshop', 'Qt.', true),
                                    __d( 'eshop', 'Sum without Vat', true),
                                    __d( 'eshop', 'Sum with Vat', true),
                                ));

                        echo $tableHeaders;

                        $rows = array();
                        foreach ($items['Items'] as $item) {
                                $rows[] = array(
                                    $item['EshopItem']['id'],
                                    $item['EshopItem']['title'],
                                    $item['EshopItem']['count'],
                                    $number->currency($item['EshopItem']['sum_without_vat'], __d( 'eshop', 'EUR', true )),
                                    '<strong>' . $number->currency($item['EshopItem']['sum_with_vat'], __d( 'eshop', 'EUR', true )) . '</strong>'
                                );
                        }

                        echo $html->tableCells($rows);
                        ?>
                </table>
                <dl>
                        <dt><?php __d( 'eshop', 'Total sum without Vat'); ?>:</dt>
                        <dd><?php echo $number->currency($items['Sums']['sum_without_vat'], __d( 'eshop', 'EUR', true )); ?></dd>
                        <dt><?php __d( 'eshop', 'Total sum with Vat'); ?>:</dt>
                        <dd><strong><?php echo $number->currency($items['Sums']['sum_with_vat'], __d( 'eshop', 'EUR', true )); ?></strong></dd>
                </dl>
                <?php echo $form->input('note', array('label' => __d( 'eshop', 'Your notes for this order', true ))); ?>
        </fieldset>
        <?php echo $form->end( __d( 'eshop', 'Submit', true )); ?>
</div>