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

namespace Kwik\CmsModals\Block;

/**
 * @author Juan Manuel Cinto <juanmanuelcinto@hotmail.com>
 * Block to Render the Modal Content
 */
class ModalContent extends \Magento\Framework\View\Element\Template
{

    /**
     * Page factory
     *
     * @var \Magento\Cms\Model\Page
     */
    protected $_page;

    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $_filterProvider;

    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Cms\Model\Page $page
     * @param \Magento\Cms\Model\Template\FilterProvider $filterProvider
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Cms\Model\Page $page,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Cms\Model\PageFactory $pageFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_page = $page;
        $this->_filterProvider = $filterProvider;
        $this->_pageFactory = $pageFactory;
        $this->_storeManager = $storeManager;
    }

    /**
     * Retrieve Page instance
     *
     * @return \Magento\Cms\Model\Page
     */
    public function getPage()
    {
          $pageId = $this->_page->getId();
          $page = $this->_pageFactory->create();
          $page->setStoreId($this->_storeManager->getStore()->getId())->load($pageId);
          return $page;
    }

    /**
     * Return Cms Page Modal Content
     * @return string
     *
     */
    public function getCmsPageModalContent()
    {
        $html = $this->_filterProvider->getPageFilter()->filter($this->getPage()->getModalContent());
        return $html;
    }

    /**
     * Is Cms Modal Is Active In Page
     * @return integer
     */
    public function getCmsPageModalIsActive()
    {
        return $this->getPage()->getIsModalActive();
    }


}
