<div class="orders index">
        <h2><?php echo $title_for_layout; ?></h2>

        <table cellpadding="0" cellspacing="0">
        <?php
        $tableHeaders =  $html->tableHeaders(array(
            'id',
            __d( 'eshop', 'Added', true),
            __d( 'eshop', 'Client Name', true),
            __d( 'eshop', 'Items', true),
            __d( 'eshop', 'Total sum', true),
            __d( 'eshop', 'Status', true),            
            __d( 'eshop', 'Actions', true)
        ));
        echo $tableHeaders;

        $rows = array();
        foreach ($orders as $order) {
                $actions = $html->link(__d( 'eshop', 'View', true), array(
                    'plugin' => 'eshop', 'controller' => 'eshop_orders', 'action' => 'edit', $order['EshopOrder']['id']));

                $items = array();
                foreach ($order['CalculatedItems']['Items'] as $item) {
                        $items[] = $item['EshopItem']['title'].' ('.$item['EshopItem']['count'].' '.__d( 'eshop', 'pcs.', true).')';
                }

                $rows[] = array(
                    $order['EshopOrder']['id'],
                    $order['EshopOrder']['created'],
                    '<strong>'.$order['EshopOrder']['name'].'</strong>',
                    implode('<br />', $items),
                    $number->currency($order['CalculatedItems']['Sums']['sum_with_vat'], __d( 'eshop', 'EUR', true ) ),
                    $order['EshopOrder']['status'],
                    $actions,
                );
        }

        echo $html->tableCells($rows);
        echo $tableHeaders;
    ?>
    </table>
</div>
