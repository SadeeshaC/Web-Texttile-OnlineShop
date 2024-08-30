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

    <body class="admin-Body" onload="loadUser();">

        <!-- Navigation -->
        <?php include ("adminnavigation.php"); ?>
        <!-- Navigation -->

        <div class="col-10">
            <h1 class="text-center mb-4">User Management</h1>

            <div class="d-none" id="msgDiv" onclick="reload();">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="d-flex justify-content-end mt-2">

                <diV class="me-4 col-2">
                    <input type="text" class="form-control" placeholder="Enter User ID" id="usid"/>
                </diV>

                <button class="btn btn-outline-light" onclick="updateUserStatus();">Change Status</button>

            </div>

            <div class="mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- Load user -->

                        <!-- Load user -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <?php include ("adminfooter.php"); ?>
        <!-- Footer -->

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