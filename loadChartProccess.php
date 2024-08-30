<?php

include("connection.php");

$rs = Database::search("SELECT `product`.`id` , `product`.`name`, SUM(`order_items`.`odi_qty`) AS `total_sold` FROM `order_items`
INNER JOIN `stock` ON `order_items`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN `product` ON
`stock`.`product_id`=`product`.`id` GROUP BY `product`.`id`,`product`.`name` ORDER BY `total_sold` DESC LIMIT 5");

$num = $rs->num_rows;

$lables = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

    $lables[] = $d["name"];
    $data[] = $d["total_sold"];
}

$json = array();
$json["lables"] = $lables;
$json["data"] = $data;

echo json_encode($json);

?>