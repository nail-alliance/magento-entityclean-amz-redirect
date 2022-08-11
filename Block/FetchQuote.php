<?php

namespace Nailalliance\AmazonRedirect\Block;

class FetchQuote extends \Magento\Framework\View\Element\Template
{
    protected $productRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        array $data = []
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getQuoteData()
    {
        $this->_checkoutSession->getQuote();
        if (!$this->hasData('quote')) {
            $this->setData('quote', $this->_checkoutSession->getQuote());
        }
        return $this->_getData('quote');
    }

    public function getProductById(int $productId)
    {
        return $this->productRepository->getById($productId);
    }
}