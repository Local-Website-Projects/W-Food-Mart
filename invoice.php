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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Food Mart - Invoice</title>
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
                                <h4 class="page-title">Cart</h4>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive shopping-cart">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">Product</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">Total</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <form>
                                        <tr>
                                            <td>
                                                <select id="productSelect" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                                    <option>Select</option>
                                                    <?php
                                                    $fetch_product = $db_handle->runQuery("SELECT shop_stock.quantity, product.product_code, primary_stock.selling_cost, product.product_id, primary_stock.p_stock_id FROM `shop_stock`,primary_stock, product where shop_stock.stock_id = primary_stock.p_stock_id and primary_stock.product_id = product.product_id and shop_stock.quantity > 0");
                                                    for($i=0; $i<count($fetch_product); $i++){
                                                        ?>
                                                        <option value="<?php echo $fetch_product[$i]['p_stock_id']; ?>"><?php echo $fetch_product[$i]['product_code'];?> - <?php echo $fetch_product[$i]['quantity'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control form-control-sm w-25" type="number" value="0" id="productPrice" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control form-control-sm w-25" type="number" value="0" id="quantity" onchange="calculate();">
                                            </td>
                                            <td id="product_total">BDT 0</td>
                                            <td>
                                                <a href="#" class="text-dark"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                                                <a href="#" class="text-dark"><i class="mdi mdi-eye-circle-outline font-18"></i></a>
                                            </td>
                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 align-self-center">
                                    <div class="text-center cart-promo">
                                        <img src="assets/images/logo-sm.png" alt="" height="50" class="mb-2">
                                        <h4 class="">Have a promo code ?</h4>
                                        <p class="font-13">If you have a promocode, You can take discount !</p>
                                        <div class="input-group w-75 mx-auto">
                                            <input type="text" class="form-control  form-control-sm"
                                                   placeholder="Use Promocode" aria-describedby="button-addon2">
                                            <button class="btn btn-primary btn-sm" type="button" id="button-addon2">
                                                Apply
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="#" class="apps-ecommerce-products.html"><i
                                                            class="fas fa-long-arrow-alt-left me-1"></i> Continue
                                                    Shopping</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a class href='apps-ecommerce-checkout.html'>Checkout <i
                                                            class="fas fa-long-arrow-alt-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="total-payment p-3">
                                        <h6 class="header-title font-14">Total Payment</h6>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="payment-title">Subtotal</td>
                                                <td>$496.00</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Discount (%)</td>
                                                <td><input class="form-control form-control-sm w-25" type="number" value="0""</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Total</td>
                                                <td class="text-dark"><strong>$491.00</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-->
                    </div><!--end card-body-->
                </div><!--end col-->
            </div><!--end row-->

        </div><!-- container -->


        <?php include ('include/footer.php');?>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->


<!-- jQuery  -->
<?php include('include/js.php'); ?>

<script>
    $(document).ready(function() {
        $('#productSelect').change(function() {
            var stockId = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'get_product_price.php',
                data: {stockId: stockId},
                success: function(response) {
                    $('#productPrice').val(response);
                    calculate(); // Recalculate total in case quantity was already set
                }
            });
        });
    });

    function calculate() {
        let quantity = document.getElementById('quantity').value;
        let productTotal = document.getElementById('product_total');
        let unitPrice = document.getElementById('productPrice').value;

        if (!isNaN(quantity) && quantity > 0 && !isNaN(unitPrice) && unitPrice > 0) {
            let total = quantity * unitPrice;
            productTotal.textContent = 'BDT ' + total.toFixed(2);
        } else {
            productTotal.textContent = 'BDT 0';
        }
    }
</script>
</script>

</body>

</html>