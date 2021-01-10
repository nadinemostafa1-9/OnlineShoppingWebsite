<?php
use PHPUnit\Framework\TestCase;
class CartitemTest extends TestCase
{
    public function testReturnsQuantity() {
        require '/home/sa/Documents/SWproject/classes/cartitem.php';

        $cartitem1 = new CartItem();
        $cartitem1->setQuantity(4);

        $this->assertEquals(4, $cartitem1->getQuantity());
    }
    /*public function testReturnProduct() {
        require '/home/sa/Documents/SWproject/classes/product.php';
        $cartitem2 = new CartItem();
        $item = new Product();
        $cartitem2->setProduct($item);
        $this->assertEquals($item, $cartitem2->getProduct());
    }*/
    
}
?>