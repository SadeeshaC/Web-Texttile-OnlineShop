<?php
session_start();
if ($_SESSION["a"]) {
    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin | Produc | Add</title>
    </head>

    <body class="admin-Body">
        <!-- Navigation -->
        <?php include ("adminnavigation.php"); ?>
        <!-- Navigation -->

        <div class="col-10">
            <h2 class="text-center">Product Registration</h2>


            <div class="row">
                <!-- Brand -->
                <div class="col-4 offset-1 mt-4">
                    <div class="mb-4">
                        <label for="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="brand"/>
                    </div>
                    <div class="d-none" id="msgDiv" onclick="reload();">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>
                    <div>
                        <button class="btn btn-outline-light col-12" onclick="brandRegister();">Brand Register</button>
                    </div>
                </div>
                <!-- Brand -->

                <!-- Category -->
                <div class="col-4 offset-2 mt-4">
                    <div class="mb-4">
                        <label for="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category"/>
                    </div>
                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>
                    <div>
                        <button class="btn btn-outline-light col-12" onclick="categoryRegistration();">Category Register</button>
                    </div>
                </div>
                <!-- Category -->
            </div>

            <div class="row mt-5">
                <!-- Color -->
                <div class="col-4 offset-1 mt-4">
                    <div class="mb-4">
                        <label for="form-label">Color</label>
                        <input type="text" class="form-control" id="color"/>
                    </div>
                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>
                    <div>
                        <button class="btn btn-outline-light col-12" onclick="colorRegister();">Color Register</button>
                    </div>
                </div>
                <!-- Color -->

                <!-- Category -->
                <div class="col-4 offset-2 mt-4">
                    <div class="mb-4">
                        <label for="form-label">Size</label>
                        <input type="text" class="form-control" id="size"/>
                    </div>
                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>
                    <div>
                        <button class="btn btn-outline-light col-12" onclick="sizeRegester();">Size Register</button>
                    </div>
                </div>
                <!-- Category -->
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
        window.location = "adminSignin.php"
    </script>
    <?php
}

?>