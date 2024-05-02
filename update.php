<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$updated_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");


if(isset($_POST['admin_approve'])){
    $admin_id = $db_handle->checkValue($_POST['admin_id']);
    $post = $db_handle->checkValue($_POST['post']);
    $role = $db_handle->checkValue($_POST['role']);

    $update_admin = $db_handle->insertQuery("UPDATE `admin` SET `post`='$post',`user_type`='$role',`approve_status`='1',`updated_at`='$updated_at' WHERE `admin_id` = '$admin_id'");
    if($update_admin){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Employee';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Employee';
</script>
        ";
    }
}