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
    $product_code = $db_handle->checkValue($_POST['product_code']);
    $product_cat = $db_handle->checkValue($_POST['product_cat']);
    $product_varieties = $db_handle->checkValue($_POST['product_varieties']);
    $company_name = $db_handle->checkValue($_POST['company_name']);

    $insert_product = $db_handle->insertQuery("INSERT INTO `product`(`product_name`,`product_code`, `cat_id`, `variety`, `company_name`, `inserted_at`) VALUES ('$product_name','$product_code','$product_cat','$product_varieties','$company_name','$inserted_at')");
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


if(isset($_POST['add_primary_stock'])){
    $product_id = $db_handle->checkValue($_POST['product_id']);
    $stock_in_quantity = $db_handle->checkValue($_POST['stock_in_quantity']);
    $purchase_price = $db_handle->checkValue($_POST['purchase_price']);
    $selling_price = $db_handle->checkValue($_POST['selling_price']);
    $stock_in_date = $db_handle->checkValue($_POST['stock_in_date']);

    $add_primary_stock = $db_handle->insertQuery("INSERT INTO `primary_stock`(`product_id`, `quantity`, `buying_cost`, `selling_cost`, `date`, `inserted_at`) VALUES ('$product_id','$stock_in_quantity','$purchase_price','$selling_price','$stock_in_date','$inserted_at')");
    if($add_primary_stock){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Stock';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Stock';
</script>
        ";
    }
}


if(isset($_POST['transfer_primary_stock'])){
    $stock_id = $db_handle->checkValue($_POST['stock_id']);
    $transfer_quantity = $db_handle->checkValue($_POST['transfer_quantity']);

    $transfer_to_shop = $db_handle->insertQuery("INSERT INTO `shop_stock`(`stock_id`, `quantity`, `date`, `inserted_at`) VALUES ('$stock_id','$transfer_quantity','$today','$inserted_at')");
    if($transfer_to_shop){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Stock';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Stock';
</script>
        ";
    }
}


if(isset($_POST['add_customer'])){
    $customer_name = $db_handle->checkValue($_POST['customer_name']);
    $contact_no = $db_handle->checkValue($_POST['contact_no']);
    $insert_customer = $db_handle->insertQuery("INSERT INTO `customer_data`(`customer_name`, `contact_phone`, `inserted_at`) VALUES ('$customer_name','$contact_no','$inserted_at')");
    if($insert_customer){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Customer';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Customer';
</script>
        ";
    }
}