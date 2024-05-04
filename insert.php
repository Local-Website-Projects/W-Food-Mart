<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");

if(!isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Login';
    </script>
    ";
}


if(isset($_POST['add_category'])){
    $category_name = $_POST['category_name'];
    $add_category = $db_handle->insertQuery("INSERT INTO `category`(`category_name`, `inserted_at`) VALUES ('$category_name','$inserted_at')");
    if($add_category){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Category';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Category';
</script>
        ";
    }
}


if(isset($_POST['add_product'])){
    $product_name = $db_handle->checkValue($_POST['product_name']);
    $product_cat = $db_handle->checkValue($_POST['product_cat']);
    $product_varieties = $db_handle->checkValue($_POST['product_varieties']);
    $company_name = $db_handle->checkValue($_POST['company_name']);

    $insert_product = $db_handle->insertQuery("INSERT INTO `product`(`product_name`, `cat_id`, `variety`, `company_name`, `inserted_at`) VALUES ('$product_name','$product_cat','$product_varieties','$company_name','$inserted_at')");
    if($insert_product){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Product';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Product';
</script>
        ";
    }
}
