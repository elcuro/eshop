<div class="suppliers index">
        <h2><?php echo $title_for_layout; ?></h2>

        <div class="actions">
                <ul>
                        <li><?php echo $html->link(__d( 'eshop', 'New supplier', true), array('action'=>'add')); ?></li>
                </ul>
        </div>

        <table cellpadding="0" cellspacing="0">
        <?php
        $tableHeaders =  $html->tableHeaders(array(
            'id',
            __d( 'eshop', 'Name', true),
            __d( 'eshop', 'Actions', true),
        ));
        echo $tableHeaders;

        $rows = array();
        foreach ($suppliers as $supplier) {
                $actions = $html->link(__d( 'eshop', 'Edit', true), array(
                    'controller' => 'eshop_suppliers', 'action' => 'edit', $supplier['EshopSupplier']['id']));
                $actions .= ' ' . $html->link(__d( 'eshop', 'Delete', true), array(
                    'controller' => 'eshop_suppliers', 'action' => 'delete', $supplier['EshopSupplier']['id']), null, __d( 'eshop', 'Are you really sure? Will be deleted all items from this supplier!', true));

                $rows[] = array(
                    $supplier['EshopSupplier']['id'],
                    $supplier['EshopSupplier']['name'],
                    $actions,
                );
        }

        echo $html->tableCells($rows);
        echo $tableHeaders;
    ?>
    </table>
</div>
