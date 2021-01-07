<?php
require "db.php";
require "product.php";
if(isset($_POST['submit'])){ //name of the insert product button
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['category'];
    $product_price=$_POST['product_price'];
    $product_count=$_POST['product_count'];
    $product_keywords=$_POST['product_keywords'];
    $product_desc=$_POST['prod_desc'];
    $product_img1=$_FILES['product_img']['name'];

    $temp_name1=$_FILES['product_img1']['tmp_name'];

    move_uploaded_file($temp_name1, "###/$product_img1"); //instead of ### put the name of the file which contains the images
    $dbObj = new db();
    $insert_product_query="INSERT INTO products (p_cat, product_title, product_img1,
    product_price, product_desc, product_keywords, product_count) VALUES('$product_cat'
        , '$product_title', '$product_img1', '$product_price','$product_desc',
     '$product_keywords', '$product_count')";
    $stmt = $dbObj->connect()->prepare($insert_product_query);
    $data = $stmt->fetch();
    //Construct product object!!
    product($id,$product_title,$product_cat,$product_price,$product_count, $product_img1,$product_keywords,$product_desc);

    if($data == false)
        return false;
    else{
        echo "<script>alert('Product Inserted successfully')</script>";
        echo "<script>window.open('insert_product.php')</script>";
    }

}
