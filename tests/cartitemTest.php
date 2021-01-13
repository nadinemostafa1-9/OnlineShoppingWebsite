<?php
use PHPUnit\Framework\TestCase;
class CartitemTest extends TestCase
{
    public function testInstance() {
        require '/home/sa/Documents/SWproject/classes/cartitem.php'; //path of the class to be tested
        $cartitem1 = new CartItem();

        $this->assertInstanceOf(CartItem::class, $cartitem1);
    }
    public function testReturnQuantity() {

        $cartitem3 = new CartItem();
        $cartitem3->setQuantity(4);

        $this->assertEquals(4, $cartitem2->getQuantity());
    }
}
?>