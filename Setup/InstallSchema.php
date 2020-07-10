<?php
/**
 * Copyright ©   All rights reserved.
 * See COPYING.txt for license details.
 */

namespace JMC\CmsModals\Setup;

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
