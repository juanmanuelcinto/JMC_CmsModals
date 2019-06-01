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

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @author Juan Manuel Cinto <juanmanuelcinto@hotmail.com>
 * Install Modal Content Field in cms_page Table
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Add Custom Modal Field
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $setup->getConnection()->addColumn(
            $setup->getTable('cms_page'),
            'modal_content',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => '2M',
                'nullable' => true,
                'comment' => 'Page Modal Content'
            ]
        );
        $installer->endSetup();
    }
}
