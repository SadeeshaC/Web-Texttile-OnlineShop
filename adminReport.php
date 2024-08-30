<?php
session_start();
if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin | Reports</title>
    </head>

    <body class="admin-Body">

        <!-- Navigation -->
        <?php include("adminnavigation.php"); ?>
        <!-- Navigation -->

        <div class="col-10">
            <h2 class="text-center">Reports</h2>
            <div class="row mt-4">
                <div class="col-4">
                    <a href="adminstockReport.php"><button class="btn btn-outline-info col-12">Stock Report</button></a>
                </div>
                <div class="col-4">
                    <a href="adminReportProduct.php"><button class="btn btn-outline-info col-12">Product Report</button></a>
                </div>
                <div class="col-4">
                    <a href="adminUserReport.php"><button class="btn btn-outline-info col-12">User Report</button></a>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <?php include("adminfooter.php"); ?>
        <!-- Navigation -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "adminSigninProccess.php";
    </script>
<?php
}
?>