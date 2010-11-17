<div class="eshop-items form">

        <?php echo $form->create(null, array(
            'url' => array('plugin' => 'eshop', 'controller' => 'eshop_basket', 'action' => 'add'),
            'inputDefaults' => array('label' => false, 'div' => false)
        ));?>

        <table>
                <?php
                $i = 1;
                foreach ($items as $item) {?>
                <tr>
                        <td>
                                <?php
                                $attributes = array('legend' => false, 'value' => $item['EshopItem']['id']);
                                if ($i == 1) {
                                        $attributes['checked'] = 'checked';
                                }
                                echo $form->radio(
                                        'EshopItem.id',
                                        array($item['EshopItem']['id'] => $item['EshopItem']['title']),
                                        $attributes
                                );
                                ?>
                        </td>
                        <td>
                                <strong class="eshop-item-price"><?php echo $number->currency($item['EshopItem']['price_without_vat'] * (1+($item['EshopItem']['vat']/100)), 'EUR');?></strong> s DPH<br />
                                <em class="eshop-price-vithout-vat"><?php echo $number->currency($item['EshopItem']['price_without_vat'], 'EUR');?> bez DPH</em>
                        </td>
                </tr>
                <?php
                        ++$i;
                } ?>
        </table>

        <?php echo $form->end(__('Add to basket', true));?>
</div>