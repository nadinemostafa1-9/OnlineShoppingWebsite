<?php
use PHPUnit\Framework\TestCase;
class CartTest extends TestCase
{
    public function testReturnsItems() {
        require '/home/sa/Documents/SWproject/classes/cart.php'; //path of the class to be tested

        $cart1 = new Cart(['item1', 'item2', 'item3', 'item4']);

        $this->assertEquals(['item1', 'item2', 'item3', 'item4'], $cart1->getItems());
    }
    public function testRemove() {

        $cart2 = new Cart(['item1', 'item2', 'item3', 'item4']);
        $cart2->removeAllProducts();

        $this->assertEquals([], $cart2->getItems());
    }
    public function testInstance() {

        $cart3 = new Cart(['item1', 'item2', 'item3', 'item4']);
        
        $this->assertInstanceOf(Cart::class, $cart3);
    }
    public function testTypeofitems(){

        $cart4 = new Cart(['item1', 'item2', 'item3', 'item4']);

        $this->assertInternalType('array', $cart4->getitems());
    }
    
}
?>