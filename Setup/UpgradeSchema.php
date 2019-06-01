<?php
/**
 * Cms Modals
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Kwik
 * @package     Kwik_CmsModals
 */

namespace Kwik\CmsModals\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @author Juan Manuel Cinto <juanmanuelcinto@hotmail.com>
 * Upgrade Schema to Install Is Modal Active in cms_page Table
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrade Schema
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ){
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1') < 0) {

             $tableName = $setup->getTable('cms_page');

             if ($setup->getConnection()->isTableExists($tableName) == true) {
                 // Declare data
                 $columns = [
                     'is_modal_active' => [
                         'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                         'nullable' => false,
                         'comment' => 'Is Modal Active',
                         'default' => 0
                     ],
                 ];

                 $connection = $setup->getConnection();
                 foreach ($columns as $name => $definition) {
                     $connection->addColumn($tableName, $name, $definition);
                 }

             }
        }

        $setup->endSetup();
    }
}
