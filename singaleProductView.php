<?php

include("connection.php");

$st_id = $_GET["s"]; //Stock ID

if (isset($st_id)) {
    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`  
    INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
    INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
    INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
    INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
    WHERE `stock`.`stock_id`='" . $st_id . "'";

    $rs = Database::search($q);
    $data = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Online Store</title>
    </head>

    <body>

        <!-- Nav Bar -->
        <?php include("navbar.php"); ?>
        <!-- Nav Bar -->

        <div class="admin-Body">
            <div class="col-8 row shadow-lg p-5 bg-body-tertiary rounded-5 m-auto">
                <div class="col-6">
                    <img src="<?php echo ($data["img_path"]); ?>" alt="image" width="300">
                </div>
                <div class="col-6">
                    <h3 style="color:yellow"><?php echo ($data["name"]); ?></h3>
                    <h5><?php echo ($data["brand_name"]); ?></h5>
                    <h6><?php echo ($data["cat_name"]); ?></h6>
                    <h6><?php echo ($data["color_name"]); ?></h6>
                    <h6><?php echo ($data["size_name"]); ?></h6>
                    <p><?php echo ($data["discription"]); ?></p>
                    <div class="row">
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="Qty" id="qty">
                        </div>
                        <div class="col-6 mt-auto">
                            <h6 class="text-warning">Avaliable Quantity : <?php echo ($data["qty"]); ?></h6>
                        </div>
                        <h5>Price : Rs <?php echo ($data["price"]); ?></h5>
                        <div class="d-flex justify-content-start mt-3">
                            <button class="btn btn-outline-primary col-4 " onclick="adtoCart(<?php echo ($data['stock_id']); ?>);">Add to Cart</button>
                            <button class="btn btn-outline-warning col-4 ms-2" onclick="buyNow(<?php echo ($data['stock_id']); ?>);">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include("footer.php"); ?>
        <!-- Footer -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>
<?php
} else {
    header("location: index.php");
}
?>