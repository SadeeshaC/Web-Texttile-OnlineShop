<?php
session_start();
$user = $_SESSION["u"];
include("connection.php");

if (isset($_SESSION["u"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Order Histry</title>
    </head>

    <body>

        <!-- Nav Bar -->
        <?php include("navbar.php"); ?>
        <!-- Nav Bar -->

        <div class="container mt-5">

            <div class="row">
                <?php
                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` ='" . $user["id"] . "' ");
                $num = $rs->num_rows;

                if ($num > 0) {
                ?>
                    <div class="mt-3">
                        <h3>Order History</h3>
                    </div>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <div class="border border-3 rounded-3 p-3 mb-4">
                            <h5>Order ID <span class="text-info">#<?php echo ($d["order_id"]); ?></span></h5>
                            <p><?php echo ($d["order_date"]); ?></p>
                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rs2 = Database::search("SELECT * FROM `order_items` INNER JOIN `stock` ON `order_items`.`stock_stock_id`=`stock`.`stock_id`
                                        INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `order_items`.`order_history_odh_id` = '" . $d['odh_id'] . "'; ");

                                        $num2 = $rs2->num_rows;

                                        for ($x = 0; $x < $num2; $x++) {
                                            $d2 = $rs2->fetch_assoc();

                                        ?>
                                            <tr>
                                                <td><?php echo ($d2["name"]); ?></td>
                                                <td><?php echo ($d2["odi_qty"]); ?></td>
                                                <td><?php echo ($d2["price"] * $d2["odi_qty"]); ?></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex flex-column align-items-end pe-5">
                                <h6>Delivary Fee: <span class="text-warning">500</span></h6>
                                <h4>Next Total: <span class="text-warning"><?php echo ($d["amount"]); ?></span></h4>
                            </div>

                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <div class="col-12 text-center mb-5 mt-5">
                        <h2>Your have not Please any Order !</h2>
                        <a href="index.php" class="btn btn-primary">Start Shoping</a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>

        <?php include("footer.php"); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: signin.php");
}
?>