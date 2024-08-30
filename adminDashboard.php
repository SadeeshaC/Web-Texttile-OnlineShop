<?php
session_start();
if (isset($_SESSION["a"])) {
    //load page
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Online Store | Admin Dashboard</title>
    </head>

    <body class="admin-Body" onload="loadChart();">

        <!-- Navigation -->
        <?php include("adminnavigation.php"); ?>
        <!-- Navigation -->

        <!-- Chart -->
        <div style="width: 400px;">
            <h2 class="text-center">Most Sold Product</h2>
            <canvas id="myChart"></canvas>
        </div>

        <div style="width: 400px;">
            <h2 class="text-center">Most Sold Product</h2>
            <canvas id="myChart2"></canvas>
        </div>

        <!-- Chart -->

        <!-- Footer -->
        <?php include("adminfooter.php"); ?>
        <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
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