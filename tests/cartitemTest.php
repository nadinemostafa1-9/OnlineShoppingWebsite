<?php
use PHPUnit\Framework\TestCase;
class CartitemTest extends TestCase
{
    public function testInstance() {
        require '/home/sa/Documents/SWproject/classes/cartitem.php'; //path of the class to be tested
        $cartitem1 = new CartItem();

        $this->assertInstanceOf(CartItem::class, $cartitem1);
    }
     public function testReturnProduct() {

         require '/home/sa/Documents/SWproject/classes/product.php';

         $prod1 = new Product(0, 'Jacket', 'Men-Clothes', 500, 0, '../jacket.jpg',
         'jacket, men, stylish, winter', 'Male Jacket, Wool, Black, Made in Turkey');
         $cartitem2 = new CartItem();
         $cartitem2->setProduct($prod1);

         $this->assertTrue($prod1==$cartitem2->getProduct());
     }
    public function testReturnQuantity() {

        $cartitem3 = new CartItem();
        $cartitem3->setQuantity(4);

        $this->assertEquals(4, $cartitem2->getQuantity());
    }
}
?>