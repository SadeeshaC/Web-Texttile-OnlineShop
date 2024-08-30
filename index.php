<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body onload="loadProduct(0);">

    <!-- NavBar -->
    <?php include("navbar.php"); ?>
    <!-- NavBar -->

    <!-- Basic Search -->
    <div class="d-flex container justify-content-end" style="margin-top: 70px;">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Searching Product" id="product" onkeyup="searchProduct(0);">
        </div>
        <button class="btn btn-outline-info col-1 ms-3" onclick="adSearch();">Filters</button>
    </div>
    <!-- Basic Search -->

    <!-- Advanced Search -->
    <div class="d-none" id="advanceSearchBox">
        <div class="border border-light mt-4 col-10 offset-1 p-5 rounded-4">
            <div class="row col-12">
                <div class="row ms-auto col-6">
                    <label class="form-lable col-3">Color</label>
                    <select class="form-select bg-dark col-9" id="color">
                        <option value="0">Select</option>
                        <?PHP
                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row ms-auto col-6">
                    <label class="col-3 form-lable">Category</label>
                    <select class="form-select bg-dark col-9" id="cat">
                        <option value="0">Select</option>
                        <?PHP
                        $rs = Database::search("SELECT * FROM `category`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row col-12 mt-2">
                <div class="row ms-auto col-6">
                    <label class="form-lable col-3">Brand</label>
                    <select class="form-select bg-dark col-9" id="brand">
                        <option value="0">Select</option>
                        <?PHP
                        $rs = Database::search("SELECT * FROM `brand`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row ms-auto col-6">
                    <label class="col-3 form-lable">Size</label>
                    <select class="form-select bg-dark col-9" id="size">
                        <option value="0">Select</option>
                        <?PHP
                        $rs = Database::search("SELECT * FROM `size`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $data = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-4 row col-12">
                <div class="row col-4 ms-auto">
                    <input type="text" class="form-control" placeholder="Max Price" id="mprice">
                </div>
                <div class="row col-4 ms-auto">
                    <input type="text" class="form-control" placeholder="Min Price" id="minprice">
                </div>
                <div class="row col-4 ms-auto">
                    <button class="btn btn-outline-primary" onclick="advanSearch(0);">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Advanced Search -->

    <!-- Load Product -->
    <div class="row col-10 offset-1" id="pid">

    </div>
    <!-- Load Product -->

    <!-- Footer -->
    <?php include("footer.php"); ?>
    <!-- Footer -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>