<?php
require_once "db.php";
require_once "product.php";
if(isset($_POST['submit'])){
    $seller_id = $_SESSION["seller_id"];
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['category'];
    $product_price=$_POST['product_price'];
    $product_count=$_POST['product_count'];
    $product_keywords=$_POST['product_keywords'];
    $product_desc=$_POST['prod_desc'];
    $product_img=$_FILES['product_img']['name'];

    $temp_name=$_FILES['product_img']['tmp_name'];

    $dbObj = new db();
    if (count($_FILES) > 0) {
        if (is_uploaded_file($temp_name)){
            $imgData = addslashes(file_get_contents($temp_name));
            $imageProperties = getimageSize($temp_name);

            $img_sql = "INSERT INTO products (image) VALUES('{$imgData}')";
               $stmt = $dbObj->connect()->prepare($insert_product_query);
               $data = $stmt->fetch();
        }
    }
    $insert_product_query="INSERT INTO products (sellerID, p_cat, product_title,
    product_price, product_desc, product_keywords, product_count) VALUES('$seller_id', '$product_cat'
    , '$product_title', '$product_price','$product_desc','$product_keywords', '$product_count')";
    $stmt = $dbObj->connect()->prepare($insert_product_query);
    $data = $stmt->fetch();

    if($data == true)
        echo "<script>alert('Product Inserted successfully')</script>";
        echo "<script>window.open('insert_product.php')</script>";

}
