<?php
session_start();
include("connection.php");

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin | Stock</title>
    </head>

    <body>

        <!-- Navigation -->
        <?php include("adminnavigation.php"); ?>
        <!-- Navigation -->

        <div class="container-fluid" style="margin-top:80px;">
            <div class="row">
                <div class="col-5 offset-1">
                    <h2 class="text-center">Product Registration</h2>

                    <div class="mb-3">
                        <label for="" class="form-lable">Product Name</label>
                        <input type="text" class="form-control" id="pname">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="form-lable">Brand</label>

                            <select class="form-select" id="brand">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                                <?php
                                }

                                ?>
                            </select>

                        </div>

                        <div class="mb-3 col-6">
                            <label for="" class="form-lable">Category</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;
                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="form-lable">Color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;
                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="" class="form-lable">Size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;
                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-lable">Description</label>
                        <textarea class="form-control" id="desc"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-lable">Product Image</label>
                        <input type="file" class="form-control" id="file">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary" onclick="registerProduct();">Register Product</button>
                    </div>
                </div>

                <div class="col-5">
                    <h2 class="text-center">Stock Update</h2>

                    <div class="mb-3">
                        <label for="" class="form-lable">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-lable">Qty</label>
                        <input type="text" class="form-control" id="qty">
                    </div>

                    <div class="mb-3">
                        <label class="form-lable">Unit Price</label>
                        <input type="text" class="form-control" id="price">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary" onclick="updateStock();">Update Stock</button>
                    </div>

                </div>

            </div>
        </div>

        <!-- Footer -->
        <?php include("adminfooter.php"); ?>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "adminSignin.php";
    </script>
<?php
}
?>