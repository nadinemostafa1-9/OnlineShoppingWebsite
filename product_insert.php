<!DOCTYPE html>
<?php
//include("/classes/db.php");
require "db.php";
?>
<html>
<head>
<title>Insert Product</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
<div class="row"><!--breadcrumb Row Start-->
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li class="active">
            <l class="fa fa-dashboard"></l>
            Dashboard/Insert Product
            </li>
        </div>
    </div>
</div><!--breadcrumb Row End-->
<div class="row">
    <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><!--panel-heading Start-->
                    <h3 class="panel-title">
                        <i class="fa a-money fa-w"></i>
                        Insert Product
                    </h3>
                </div><!--panel-heading End-->
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action ="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Name</label>
                            <input type="text" name="product_title" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category</label>
                            <select name="product_cat" class="form-control">
                                <option>Select a product category</option>
                                <?php
                                $get_p_cats = "SELECT * FROM `product_categories`";
                                $run_p_cats = mysqli_query($con, $get_p_cats);
                                while($row = mysqli_fetch_array($run_p_cats)){
                                    $id=$row['p_cat_id'];
                                    $cat_title=$row['p_cat_title'];
                                    echo "<option value='$id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categories</label>
                            <select name="cat" class="form-control">
                            <option>Select Categories</option>
                            <?php
                                $get_cats = "SELECT * FROM `categories`"; //make this table
                                $run_cats = mysqli_query($con, $get_cats);
                                while($row = mysqli_fetch_array($run_cats)){
                                    $id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    echo "<option value='$id'>$cat_title</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 1</label>
                            <input type="file" name="product_img1" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 2</label>
                            <input type="file" name="product_img2" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 3</label>
                            <input type="file" name="product_img3" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <input type="text" name="product_price" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Count</label>
                            <input type="text" name="product_count" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keyword</label>
                            <input type="text" name="product_keywords" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>
                            <textarea name="prod_desc" class="form-control" rows="6" cols="19"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Insert Product" 
                            class="btn btn-primary form-control">
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <div class="col-lg-13">

    </div>
</div>
</body>
</html>
<?php
require "product.php";
if(isset($_POST['submit'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $cat=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_count=$_POST['product_count'];
    $product_keywords=$_POST['product_keywords'];
    $product_desc=$_POST['prod_desc'];

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1, "###/$product_img1"); //instead of ### put the name of
    move_uploaded_file($temp_name2, "###/$product_img2"); // the file which contains the images
    move_uploaded_file($temp_name3, "###/$product_img3");

    $insert_product="insert into products (p_cat_id, cat_id, date, product_title, product_img1,
    product_img2, product_img3, product_price, product_desc, product_keywords) values('$product_cat',
    '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price',
    '$product_desc', '$product_keywords')";

    product($id,$product_title,$product_cat,$product_price,$product_count, $product_img1,$product_keywords,$product_desc);

    //the next code assumes con is the connection function
    $run_product=mysqli_query($con, $insert_product);
    if($run_product){
        echo "<script>alert('Product Inserted successfully')</script>";
        echo "<script>window.open('insert_product.php')</script>";
    }

}

?>