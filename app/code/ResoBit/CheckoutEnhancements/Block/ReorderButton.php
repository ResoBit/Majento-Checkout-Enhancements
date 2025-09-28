<?php
namespace ResoBit\CheckoutEnhancements\Block;

use Magento\Framework\View\Element\Template;
use Magento\Sales\Model\Order;

class ReorderButton extends Template
{
    protected $order;

    public function __construct(
        Template\Context $context,
        Order $order,
        array $data = []
    ) {
        $this->order = $order;
        parent::__construct($context, $data);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getReorderUrl()
    {
        if ($this->getOrder()) {
            return $this->getUrl('resobit_checkout/order/reorder', ['order_id' => $this->getOrder()->getId()]);
        }
        return '#';
    }
}
