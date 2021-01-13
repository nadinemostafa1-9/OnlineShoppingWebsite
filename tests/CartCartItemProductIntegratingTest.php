<?php
use PHPUnit\Framework\TestCase;
class CartTest extends TestCase
{
    public function testAddProduct(){
        require '/home/sa/Documents/SWproject/classes/cart.php'; //paths of the classes to be tested
        require '/home/sa/Documents/SWproject/classes/product.php';
        require '/home/sa/Documents/SWproject/classes/cartitem.php';

        $prod = new Product(0, 'Jacket', 'Men-Clothes', 500, 0, '../jacket.jpg',
         'jacket, men, stylish, winter', 'Male Jacket, Wool, Black, Made in Turkey');
        $cart5 = new Cart(['item1', 'item2', 'item3', 'item4']);
        $cartitem = new CartItem($prod, 3);
        
        $this->assertSame($cartitem, $cart5->addProduct($prod, 3));
    }
}
?>