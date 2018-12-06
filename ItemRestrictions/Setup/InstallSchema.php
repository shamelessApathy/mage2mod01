<?php
/**
* Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/

namespace Liberty\ItemRestrictions\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
          * Create table 'greeting_message'
          */
          $table = $setup->getConnection()
              ->newTable($setup->getTable('Liberty_ItemRestrictions'))
              ->addColumn(
                  'inclusion_id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                  null,
                  ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                  'Inclusion ID'
              )
              ->addColumn(
                  'customer_type',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                    'Customer Type'
              )
              ->addColumn(
                  'customer_code',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'Customer Code'
              )
              ->addColumn(
                  'item_type',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'Item Type'
              )
               ->addColumn(
                  'item_code',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'Item Code'
              )
               ->addColumn(
                  'inclusion',
                  \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'Inclusion'
              )
               ->addColumn(
                  'drop_ship',
                  \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'Drop Ship'
              )
               ->addColumn(
                  'start_date',
                  \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'Start Date'
              )
               ->addColumn(
                  'end_date',
                  \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                  null,
                  ['unsigned' => true, 'nullable' => false],
                  'End Date'
              )->setComment("Item Restrictions table");
          $setup->getConnection()->createTable($table);
      }
}