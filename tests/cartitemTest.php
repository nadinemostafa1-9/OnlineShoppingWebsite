<?php
use PHPUnit\Framework\TestCase;
class CartitemTest extends TestCase
{
    public function testReturnsQuantity() {
        require '/home/sa/Documents/SWproject/classes/cartitem.php';

        $cartitem1 = new CartItem();
        $cartitem1->setQuantity(4);

        $this->assertSame(4, $cartitem1->getQuantity());
        $this->assertInstanceOf(CartItem::class, $cartitem1);
    }
    
}
?>