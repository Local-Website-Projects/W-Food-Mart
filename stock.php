<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");

if (!isset($_SESSION['admin'])) {
    echo "
    <script>
    window.location.href = 'Login';
    </script>
    ";
}

$u = '';

if (isset($_GET['update'])) {
    $check_cat = $db_handle->runQuery("select * from category where category_id = '{$_GET['update']}'");
    if ($check_cat[0]['status'] == '1') {
        $u = 0;
    } else {
        $u = 1;
    }
    $update_cat_status = $db_handle->insertQuery("update category set status = '$u' where category_id = '{$_GET['update']}'");
    if ($update_cat_status) {
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Food Mart - Stock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('include/css.php'); ?>
</head>

<body class="">
<!-- Left Sidenav -->
<?php include('include/leftSideBar.php'); ?>
<!-- end left-sidenav-->


<div class="page-wrapper">
    <!-- Top Bar Start -->
    <?php include('include/topBar.php'); ?>
    <!-- Top Bar End -->

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title">Stock</h4>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!--end row-->
            <!-- end page title end breadcrumb -->
            <?php
            if (isset($_GET['edit'])) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stock<span class="badge bg-soft-success font-12">update</span>
                                </h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <form action="Update" method="post">
                                    <?php
                                    $stock_data = $db_handle->runQuery("select * from primary_stock where p_stock_id = 1");
                                    ?>
                                    <input type="hidden" value="<?php echo $_GET['edit']; ?>" name="p_stock_id">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput"
                                               value="<?php echo $stock_data[0]['quantity']; ?>" name="quantity"
                                               required>
                                        <label for="floatingInput">Stock In Quantity</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                               value="<?php echo $stock_data[0]['buying_cost']; ?>" name="buying_cost"
                                               required>
                                        <label for="floatingInput">Stock In Price</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                               value="<?php echo $stock_data[0]['selling_cost']; ?>" name="selling_cost"
                                               required>
                                        <label for="floatingInput">Selling Cost</label>
                                    </div>
                                    <button type="submit" name="edit_primary_stock" class="btn btn-primary">Edit Category
                                    </button>
                                </form>

                            </div><!--end card-body-->
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Primary Stock</h4>
                            </div>
                            <div class="card-body">
                                <form action="Insert" method="post">
                                    <div class="form-floating mb-3">
                                        <label class="mb-3">Product Code</label>
                                        <select class="select2 form-control mb-3 custom-select" name="product_id" required
                                                style="width: 100%; height:36px;">
                                            <option disabled selected>Select Product Code</option>
                                            <?php
                                            $fetch_code = $db_handle->runQuery("select * from product order by product_name ASC");
                                            for ($i = 0; $i < count($fetch_code); $i++) {
                                                ?>
                                                <option value="<?php echo $fetch_code[$i]['product_id'];?>"><?php echo $fetch_code[$i]['product_code'];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="stock_in_quantity" required>
                                        <label for="floatingInput">Stock In Quantity</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="purchase_price" required>
                                        <label for="floatingInput">Purchase Price</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="selling_price" required>
                                        <label for="floatingInput">Selling Price</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingInput" name="stock_in_date" required>
                                        <label for="floatingInput">Stock In Date</label>
                                    </div>
                                    <button type="submit" name="add_primary_stock" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Primary Stock Data</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Quantity</th>
                                    <th>Stock In Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $fetch_stock = $db_handle->runQuery("SELECT * FROM `primary_stock`, `product` WHERE primary_stock.product_id = product.product_id");

                                for ($i = 0; $i < count($fetch_stock); $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $fetch_stock[$i]['product_name']; ?></td>
                                        <td><?php echo $fetch_stock[$i]['product_code']; ?></td>
                                        <td><?php echo $fetch_stock[$i]['quantity']; ?></td>
                                        <td><?php $dateString = $fetch_stock[$i]['date'];
                                            $timestamp = strtotime($dateString);
                                            $formattedDate = date('d M, Y', $timestamp);
                                            echo $formattedDate;; ?></td>
                                        <td class="text-right">
                                            <a href="Stock?edit=<?php echo $fetch_stock[$i]['p_stock_id']; ?>"
                                               class="btn btn-sm btn-soft-success btn-circle me-2"><i
                                                        class="dripicons-pencil"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>


        </div><!-- container -->

        <?php include('include/footer.php'); ?>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->


<!-- jQuery  -->
<?php include('include/js.php'); ?>

</body>

</html>