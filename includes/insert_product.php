<?php
require_once ('db.php');
require_once ('product.php');
function productInsert($data, $file)
        {
            $seller_id = $_SESSION["seller_id"];
            $product_title=$data['product_title'];
            $product_cat=$data['category'];
            $product_price=$data['product_price'];
            $product_count=$data['product_count'];
            $product_keywords=$data['product_keywords'];
            $product_desc=$data['prod_desc'];

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['product_img']['name'];
            $file_temp = $file['product_img']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if (empty($file_name)) {
                echo "<span class='error'>Please Select any Image !</span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $insert_product_query="INSERT INTO products (sellerID, p_cat, product_title,
                product_price, product_desc, product_keywords, product_count, img) VALUES('$seller_id', '$product_cat'
                , '$product_title', '$product_price','$product_desc','$product_keywords', '$product_count', $uploaded_image)";
                $stmt = $dbObj->connect()->prepare($insert_product_query);
                $data = $stmt->fetch();
                if($data == true){
                    echo "<script>alert('Product Inserted successfully')</script>";
                    echo "<script>window.open('insert_product.php')</script>";
                }
            }

            Seller:: updateRank();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            productInsert($_POST, $_FILES);
        }
