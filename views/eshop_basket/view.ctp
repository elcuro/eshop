<div class="eshop-basket">
        <div id="eshop-notice"></div>
        <h2><?php __('Basket'); ?></h2>

        <?php if(count($items) > 0) {?>

                <table>
                        <tr>
                                <th><?php __('Item'); ?></th>
                                <th><?php __('Qt.'); ?></th>
                                <th><?php __('Sum without vat'); ?></th>
                                <th><?php __('Sum with vat'); ?></th>
                                <th><?php __('Remove from basket'); ?></th>
                        </tr>
                        <?php
                        $sum_without_vat = 0;
                        $sum_with_vat = 0;
                        foreach($items as $item) {
                                $item_price_without_vat = $item['EshopItem']['price_without_vat'] * $item['count'];
                                $item_price_with_vat = $item['EshopItem']['price_with_vat'] * $item['count'];
                                $sum_without_vat = $sum_without_vat + $item_price_without_vat;
                                $sum_with_vat = $sum_with_vat + $item_price_with_vat;
                                ?>
                                <tr id="echop-basket-item-<?php echo $item['EshopItem']['id']; ?>" class="eshop-basket-item">
                                        <td class="eshop-basket-item-title">
                                                <?php echo $item['EshopItem']['title']; ?>
                                        </td>
                                        <td class="eshop-basket-item-count">
                                                <input id="item-count-<?php echo $item['EshopItem']['id']; ?>" class="item-count" type="text" size="1" alt="<?php echo $item['EshopItem']['id']; ?>" value="<?php echo $item['count'];?>"  />
                                        </td>
                                        <td class="eshop-basket-item-sum-without-vat" id="item-price-without-vat-<?php echo $item['EshopItem']['id']; ?>">
                                                <?php echo $number->currency($item_price_without_vat, 'EUR'); ?>
                                        </td>
                                        <td class="eshop-basket-item-sum-with-vat"" id="item-sum-without-vat-<?php echo $item['EshopItem']['id']; ?>">
                                                <?php echo $number->currency($item_price_with_vat, 'EUR') ?>
                                        </td>
                                        <td>
                                                <?php echo $html->link(
                                                        __('Remove item', true),
                                                        array('plugin' => 'eshop', 'controller' => 'eshop_basket', 'action' => 'delete', $item['EshopItem']['id'])) ?>
                                        </td>
                                </tr>
                                <?php
                                } ?>
                        <tr class="eshop-basket-sum">
                                <td colspan="2">&nbsp;</td>
                                <td id="sum-without-vat"><?php echo $number->currency($sum_without_vat, 'EUR'); ?></td>
                                <td id="sum-with-vat"><strong><?php echo $number->currency($sum_with_vat, 'EUR'); ?></strong></td>
                        </tr>
                </table>

        <div class="eshop-btns">
                <div class="eshop-btn back">
                        <strong><?php echo $html->link(__('Back to eshop', true), $referer);?></strong>
                </div>
                <div class="eshop-btn forward">
                        <strong><?php echo $html->link(__('Order!', true), array('plugin' => 'eshop', 'controller' => 'eshop_orders', 'action' => 'add'));?></strong>
                </div>
        </div>
        <?php } else {
                __('Basket is empty');?>
                <div class="eshop-btn back">
                        <strong><?php echo $html->link(__('Back to eshop', true), $referer);?></strong>
                </div>
        <?php } ?>
</div>

<script>
        $(document).ready(function() {
                var parent_selector = '#' + $('div.eshop-basket').parent().attr('id');
                $('.item-count').bind('keyup', function() {
                        $('#eshop-notice').html('<strong><?php __('Calculating...');?></strong>');
                        var item_id = $(this).attr('alt');
                        var item_count = $(this).attr('value');
                        $(parent_selector).load(
                                '<?php echo $html->url(array('plugin' => 'eshop', 'controller' => 'eshop_basket', 'action' => 'recalc'));?>/' + item_id + '/' + item_count
                        )
                })
        });
</script>




