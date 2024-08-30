<?php
include("connection.php");

$pageno = 0;

$page = $_POST["p"];
$product = $_POST["pr"];

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;

$one_page_result = 8;
$num_of_page = ceil($num / $one_page_result);

$page_result = ($pageno - 1) * $one_page_result;

$q2 =  $q . " LIMIT $one_page_result OFFSET $page_result";
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
    for ($i = 0; $i < $num2; $i++){
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
                                                            ?> onclick="advanSearch(<?php echo ($pageno - 1); ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>

                <?php
                    for ($y = 1; $y <= $num_of_page; $y++) {
                        if ($y == $pageno) {
                            ?>
                                <li class="page-item active">
                                    <a class="page-link" onclick="advanSearch(<?php echo $y ?>);"><?php echo $y ?></a>
                                </li>
                            <?php
                        } else {
                            ?>
                            <li class="page-item">
                                <a class="page-link" onclick="advanSearch(<?php echo $y ?>);"><?php echo $y ?></a>
                            </li>
                        <?php
                        }
                    }
                ?>

                <li class="page-item"><a class="page-link" <?php if ($pageno >= $num_of_page) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="advanSearch(<?php echo ($pageno + 1); ?>);" <?php
                                                                                                                } ?>>Next</a></li>

            </ul>
        </nav>

    </div>
<?php
}
?>