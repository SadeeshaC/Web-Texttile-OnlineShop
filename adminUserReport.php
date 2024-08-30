<?php
session_start();
include("connection.php");

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`ut_id` ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin | User | Report</title>
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
                        <th>User Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>User Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $data = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo ($data["id"]); ?></td>
                            <td><?php echo ($data["fname"]); ?></td>
                            <td><?php echo ($data["lname"]); ?></td>
                            <td><?php echo ($data["email"]); ?></td>
                            <td><?php echo ($data["mobile"]); ?></td>
                            <td><?php echo ($data["type"]); ?></td>
                            <td><?php if ($data["status"] == 1) {
                                    echo ("Active");
                                } else {
                                    echo ("Inactive");
                                } ?></td>
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