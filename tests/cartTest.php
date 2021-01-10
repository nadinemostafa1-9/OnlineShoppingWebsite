<?php
use PHPUnit\Framework\TestCase;
class CartTest extends TestCase
{
    public function testReturnsItems() {
        require '/home/sa/Documents/SWproject/classes/cart.php';

        $cart1 = new Cart(['item1', 'item2', 'item3', 'item4']);
        //$cart1->setItems(['item1', 'item2', 'item3', 'item4']);

        $this->assertEquals(['item1', 'item2', 'item3', 'item4'], $cart1->getItems());
    }
    
}
?>