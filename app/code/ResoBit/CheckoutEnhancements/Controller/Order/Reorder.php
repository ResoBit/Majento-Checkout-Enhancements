<?php
namespace ResoBit\CheckoutEnhancements\Controller\Order;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Checkout\Model\Cart;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Reorder extends Action
{
    protected $cart;
    protected $orderRepository;
    protected $resultRedirectFactory;

    public function __construct(
        Context $context,
        Cart $cart,
        OrderRepositoryInterface $orderRepository,
        RedirectFactory $resultRedirectFactory
    ) {
        $this->cart = $cart;
        $this->orderRepository = $orderRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $orderId = (int) $this->getRequest()->getParam('order_id');
        $resultRedirect = $this->resultRedirectFactory->create();

        if (!$orderId) {
            $this->messageManager->addErrorMessage(__('Order ID is missing.'));
            return $resultRedirect->setPath('sales/order/history');
        }

        try {
            $order = $this->orderRepository->get($orderId);
            foreach ($order->getAllVisibleItems() as $item) {
                $product = $item->getProduct();
                $params = [
                    'product' => $product->getId(),
                    'qty' => $item->getQtyOrdered()
                ];
                $this->cart->addProduct($product, $params);
            }
            $this->cart->save();
            $this->messageManager->addSuccessMessage(__('Products from order #%1 have been added to your cart.', $order->getIncrementId()));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Cannot reorder products: %1', $e->getMessage()));
        }

        return $resultRedirect->setPath('checkout/cart');
    }
}
