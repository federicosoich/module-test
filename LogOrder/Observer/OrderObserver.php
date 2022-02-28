<?php
namespace ChupaPrecios\LogOrder\Observer;
 
use Magento\Framework\Event\ObserverInterface;
 
class OrderObserver implements ObserverInterface
{   
    protected $customerFactory;
    
    protected $order;
   
    public function __construct    (             
        \Magento\Sales\Model\Order $order,
        \Magento\Customer\Model\CustomerFactory $customerFactory   
    ) 
    {        
        $this->order = $order;  
        $this->customerFactory = $customerFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {   
        $order = $observer->getEvent()->getOrder();
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/orders.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info("ORDER INFO:");
        $logger->info("ORDER #".$order->getIncrementId());
        $logger->info("CUSTOMER ".$order->getCustomerEmail());
        $logger->info("PRODUCTOS:");  
        foreach ($order->getAllItems() as $item)
            $logger->info($item->getQtyOrdered()." ".$item->getName()." $".$item->getPrice());
        
     }
}