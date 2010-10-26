<?php $items = $this->requestAction(
        array('plugin' => 'eshop',
            'controller' => 'eshop_items',
            'action' => 'getItems'),
        array(
            'pass' => array($this->data['Node']['id']
        )));
?>

<div class="items index">

        <div class="actions">
                <ul>
                        <li>
                                <?php echo $html->link(__('Edit items', true), array(
                                    'plugin' => 'eshop',
                                    'controller' => 'eshop_items',
                                    'action'=>'index',
                                    $this->data['Node']['id'])); ?>
                        </li>
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
        ));
        echo $tableHeaders;

        $rows = array();
        foreach ($items as $item) {
                $rows[] = array(
                    $item['EshopItem']['id'],
                    $item['EshopItem']['title'],
                    $item['EshopItem']['price_without_vat'],
                    $item['EshopItem']['delivery_days'],
                    $item['EshopItem']['discount_percentage'],
                    $item['EshopSupplier']['name'],
                );
        }

        echo $html->tableCells($rows);
    ?>
    </table>
</div>


