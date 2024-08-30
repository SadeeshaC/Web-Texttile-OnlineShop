<?php
include("connection.php");
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM cart 
        INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id`
        INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
        INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
        INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
        INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
        INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
        WHERE `user_id` = '" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
?>
    <div class="mb-5 mt-5">
        <h4>Shoping Cart</h4>
    </div>

    <?php
    for ($i = 0; $i < $num; $i++) {
        $data = $rs->fetch_assoc();

        $total = $data["cart_qty"] * $data["price"];
        $netTotal += $total;

    ?>
        <!-- Cart Items -->
        <div class="rounded-5 border border-3 col-12 p-4 mb-1 d-flex justify-content-between">

            <div class="d-flex align-items-center col-5">
                <img src="<?php echo($data["img_path"]); ?>" alt="product_image" width="150px">
                <div class="ms-5">
                    <h4><?php echo($data["name"]) ?></h4>
                    <p class="text-muted mb-0 mt-2"><?php echo($data["color_name"]) ?></p>
                    <p class="text-muted"><?php echo($data["size_name"]) ?></p>
                    <h5 class="text-warning">Price. Rs : <?php echo($data["price"]) ?>.00</h5>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty(<?php echo($data['cart_id']); ?>);">-</button>
                <input type="number" id="qty<?php echo($data["cart_id"]); ?>" class="form-control text-center form-control-sm" style="max-width: 80px;" disabled value="<?php echo($data["cart_qty"]) ?>">
                <button class="btn btn-light btn-sm" onclick="incrementCartQty(<?php echo($data['cart_id']); ?>);">+</button>
            </div>

            <div class="d-flex align-items-center gap-2">
                <h4>Total <span class="text-warning">Rs : <?php echo($total) ?>.00</span></h4>
            </div>

            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-danger btn-sm" onclick="cartRemove(<?php echo($data['cart_id']); ?>);">X</button>
            </div>
        </div>
        <!-- Cart Items -->
    <?php
    }
    ?>

    <div class="mt-4 col-12">
        <hr />
    </div>

    <!-- Check Out -->
    <div class="d-flex align-items-end flex-column">
        <h6>Number of Items <span class="text-info"><?php echo($num) ?></span></h6>
        <h5>Delivery Fee <span class="text-muted">Rs 500.00</span></h5>
        <h3>New Total <span class="text-warning">Rs <?php echo($netTotal + 500) ?>.00</span></h3>
        <button class="btn btn-success" onclick="checkOut();">CHECKOUT</button>
    </div>
    <!-- Check Out -->
<?php
} else {
?>
    <div class="col-12 text-center mb-5 mt-5">
        <h2>Your Cart is Empty!</h2>
        <a href="index.php" class="btn btn-primary">Start Shoping</a>
    </div>
<?php
}

?>