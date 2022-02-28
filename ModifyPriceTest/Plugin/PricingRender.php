<?php
namespace ChupaPrecios\ModifyPriceTest\Plugin;

class PricingRender

{

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)

    {
       // echo"HERE";
$result += 150; //add your product price logic
return $result;
}

}