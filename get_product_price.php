<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();

if(!isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Login';
    </script>
    ";
}
$stock_id = $_POST['stockId'];
$check = $db_handle->runQuery("SELECT selling_cost FROM `primary_stock` where p_stock_id = '$stock_id'");
if($check){
    echo $check[0]['selling_cost'];
}