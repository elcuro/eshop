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
                                <?php echo $html->link(__d( 'eshop', 'Edit items', true), array(
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
            __d( 'eshop', 'Title', true),
            __d( 'eshop', 'Price (without VAT)', true),
            __d( 'eshop', 'Delivery (in days)', true),
            __d( 'eshop', 'Discount (%)', true),
            __d( 'eshop', 'Supplier', true),
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


