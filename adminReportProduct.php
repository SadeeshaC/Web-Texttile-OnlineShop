<?php
session_start();
include("connection.php");
if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM `product` 
    INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
    INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` 
    INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
    INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` ORDER BY `product`.`id` ASC");
    $num = $rs->num_rows;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Document</title>
    </head>

    <body>

        <div class="container mt-4">
            <a href="adminReport.php"><img src="Resources/images/undo.png" height="30"></a>
        </div>

        <div class="container mt-4" id="printArea">
            <h2 class="text-center">Product Report</h2>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Brand Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($x = 0; $x < $num; $x++) {
                        $data = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo ($data["id"]); ?></td>
                            <td><?php echo ($data["name"]); ?></td>
                            <td><?php echo ($data["brand_name"]); ?></td>
                            <td><?php echo ($data["cat_name"]); ?></td>
                            <td><?php echo ($data["color_name"]); ?></td>
                            <td><?php echo ($data["size_name"]); ?></td>
                            <td><?php echo ($data["discription"]); ?></td>
                            <td><img src="<?php echo ($data["img_path"]); ?>" alt="image" height="75"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5 mb-5">
            <button class="btn btn-outline-secondary col-2" onclick="printDiv();">Print</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.Location = "adminSignin.php";
    </script>
<?php
}
?>