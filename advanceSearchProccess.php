<?php
include("connection.php");

$pageno = 0;

$page = $_POST["page"];

$color = $_POST["color"];
$cat = $_POST["category"];
$brand = $_POST["brand"];
$size = $_POST["size"];
$maxPrice = $_POST["maxPrice"];
$minPrice = $_POST["minPrice"];

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`  
      INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
      INNER JOIN `size` ON `product`.`size_id`= `size`.`size_id`
      INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
      INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`";

//search by color
if ($status == 0 && $color != 0) {
    $q .= " WHERE `color`.`color_id` = '" . $color . "'";
    $status = 1;
} else if ($status != 0 && $color != 0) {
    $q .= " AND `color`.`color_id` = '" . $color . "'";
}

//search by category
if ($status == 0 && $cat != 0) {
    $q .= " WHERE `category`.`cat_id` = '" . $cat . "'";
    $status = 1;
} else if ($status != 0 && $cat != 0) {
    $q .= " AND `category`.`cat_id` = '" . $cat . "'";
}

//search by brand
if ($status == 0 && $brand != 0) {
    $q .= " WHERE `brand`.`brand_id` = '" . $brand . "'";
    $status = 1;
} else if ($status != 0 && $brand != 0) {
    $q .= " AND `brand`.`brand_id` = '" . $brand . "'";
}

//search by brand
if ($status == 0 && $size != 0) {
    $q .= " WHERE `size`.`size_id` = '" . $size . "'";
    $status = 1;
} else if ($status != 0 && $size != 0) {
    $q .= " AND `size`.`size_id` = '" . $size . "'";
}

//search by min price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

//search by max price
if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

//search by price range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$result_per_page = 8;
$num_of_page = ceil($num / $result_per_page);
$page_result = ($pageno - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No Result</h5>
        <p>We're Sorry, we cannot find any matches for your search term..</p>
    </div>
    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $product = $rs2->fetch_assoc();
    ?>
        <!-- Product -->
        <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
            <div class="card" style="width:300px">
                <img src="<?php echo ($product["img_path"]); ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ($product["name"]); ?></h5>
                    <p class="card-text"><?php echo ($product["discription"]); ?></p>
                    <p class="card-text">Rs: <?php echo ($product["price"]); ?></p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary col-6">Add to Cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product -->
    <?php
    }
    ?>
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">

        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="searchProduct(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_page; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    }
                }
                ?>

                <li class="page-item"><a class="page-link" <?php if ($pageno >= $num_of_page) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="searchProduct(<?php echo ($pageno + 1); ?>);" <?php
                                                                                                                    } ?>>Next</a></li>

            </ul>
        </nav>

    </div>
<?php
}

?>