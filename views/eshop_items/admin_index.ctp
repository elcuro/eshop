<div class="items index">
        <h2>
                <?php __('Eshop items for'); ?>&nbsp;
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
                        <li><?php echo $html->link(__('Add item', true), array('action'=>'add', $node['Node']['id'])); ?></li>
                </ul>
        </div>

        <table cellpadding="0" cellspacing="0">
        <?php
        $tableHeaders =  $html->tableHeaders(array(
            'id',
            __('Title', true),
            __('Price (without VAT)', true),
            __('Delivery (in days)', true),
            __('Discount (%)', true),
            __('Supplier', true),
            __('Actions', true),
        ));
        echo $tableHeaders;

        $rows = array();
        foreach ($items as $item) {
                $actions = $html->link(__('Edit', true), array(
                    'controller' => 'eshop_items', 'action' => 'edit', $item['EshopItem']['id']));
                $actions .= ' ' . $html->link(__('Delete', true), array(
                    'controller' => 'eshop_items', 'action' => 'delete', $item['EshopItem']['id']), null, __('Are you really sure?', true));

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
