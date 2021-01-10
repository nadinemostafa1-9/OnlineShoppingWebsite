<?php
use PHPUnit\Framework\TestCase;
class CartTest extends TestCase
{
    public function testReturnsItems() {
        require '/home/sa/Documents/SWproject/classes/cart.php';

        $cart1 = new Cart(['item1', 'item2', 'item3', 'item4']);

        $this->assertEquals(['item1', 'item2', 'item3', 'item4'], $cart1->getItems());
    }
    public function testRemove() {

        $cart2 = new Cart(['item1', 'item2', 'item3', 'item4']);
        $cart2->removeAllProducts();
        $this->assertEquals([], $cart2->getItems());
    }
    //Start integration Testing
    
}
?>