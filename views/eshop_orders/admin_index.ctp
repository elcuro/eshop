<div class="orders index">
        <h2><?php echo $title_for_layout; ?></h2>

        <table cellpadding="0" cellspacing="0">
        <?php
        $tableHeaders =  $html->tableHeaders(array(
            'id',
            __('Added', true),
            __('Client Name', true),
            __('Items', true),
            __('Total sum', true),
            __('Status', true),            
            __('Actions', true)
        ));
        echo $tableHeaders;

        $rows = array();
        foreach ($orders as $order) {
                $actions = $html->link(__('View', true), array(
                    'plugin' => 'eshop', 'controller' => 'eshop_orders', 'action' => 'edit', $order['EshopOrder']['id']));

                $items = array();
                foreach ($order['CalculatedItems']['Items'] as $item) {
                        $items[] = $item['EshopItem']['title'].' ('.$item['EshopItem']['count'].' '.__('pcs.', true).')';
                }

                $rows[] = array(
                    $order['EshopOrder']['id'],
                    $order['EshopOrder']['created'],
                    '<strong>'.$order['EshopOrder']['name'].'</strong>',
                    implode('<br />', $items),
                    $number->currency($order['CalculatedItems']['Sums']['sum_with_vat'], 'EUR'),
                    $order['EshopOrder']['status'],
                    $actions,
                );
        }

        echo $html->tableCells($rows);
        echo $tableHeaders;
    ?>
    </table>
</div>
