<div class="items index">
        <h2>
                <?php __d( 'eshop', 'Eshop items for'); ?>&nbsp;
                <?php
                echo $html->link($node['Node']['title'], array(
                    'plugin' => false,
                    'controller' => 'nodes',
                    'action' => 'edit',
                    $node['Node']['id'])
                );?>
        </h2>

        <div class="actions">
                <ul>
                        <li><?php echo $html->link(__d( 'eshop', 'Add item', true), array('action'=>'add', $node['Node']['id'])); ?></li>
                </ul>
        </div>

        <table cellpadding="0" cellspacing="0">
        <?php
        $tableHeaders =  $html->tableHeaders(array(
            'id',
            __d( 'eshop', 'Title', true),
            __d( 'eshop', 'Price (without VAT)', true),
            __d( 'eshop', 'Delivery (in days)', true),
            __d( 'eshop', 'Discount (%)', true),
            __d( 'eshop', 'Supplier', true),
            __d( 'eshop', 'Actions', true),
        ));
        echo $tableHeaders;

        $rows = array();
        foreach ($items as $item) {
                $actions = $html->link(__d( 'eshop', 'Edit', true), array(
                    'controller' => 'eshop_items', 'action' => 'edit', $item['EshopItem']['id']));
                $actions .= ' ' . $html->link(__d( 'eshop', 'Delete', true), array(
                    'controller' => 'eshop_items', 'action' => 'delete', $item['EshopItem']['id']), null, __d( 'eshop', 'Are you really sure?', true));

                $rows[] = array(
                    $item['EshopItem']['id'],
                    $item['EshopItem']['title'],
                    $item['EshopItem']['price_without_vat'],
                    $item['EshopItem']['delivery_days'],
                    $item['EshopItem']['discount_percentage'],
                    $item['EshopSupplier']['name'],
                    $actions,
                );
        }

        echo $html->tableCells($rows);
        echo $tableHeaders;
    ?>
    </table>
</div>
