<?php
use PHPUnit\Framework\TestCase;
class ProductTest extends TestCase
{
    public function testReturnsName() {
        require '/home/sa/Documents/SWproject/classes/product.php';

        $prod1 = new Product();
        $prod1->setName('Jacket');

        $this->assertEquals('Jacket', $prod1->getName());
    }
    public function testReturnsPrice() {

        $prod2 = new Product();
        $prod2->setPrice(500);

        $this->assertEquals(500, $prod2->getPrice());
    }
    public function testReturnsKeywords() {

        $prod3 = new Product();
        $prod3->setKeywords('jacket, men, stylish, winter');

        $this->assertEquals('jacket, men, stylish, winter', $prod3->getKeywords());
    }
    public function testReturnsDescription() {

        $prod4 = new Product();
        $prod4->setDescription('Male Jacket, Wool, Black, Made in Turkey');

        $this->assertEquals('Male Jacket, Wool, Black, Made in Turkey', $prod4->getDescription());
    }
    public function testReturnsCategory() {

        $prod5 = new Product();
        $prod5->setCategory('Men-Clothes');

        $this->assertEquals('Men-Clothes', $prod5->getCategory());
    }
    public function testReturnsCount() {

        $prod6 = new Product();
        $prod6->setCount(1500);

        $this->assertEquals(1500, $prod6->getCount());
    }
    public function testReturnsoutOfStock() {

        $prod7 = new Product();
        $prod7->setOutOfstock();

        $this->assertEquals(true, $prod7->isProductOutOfStock());
    }
}
?>