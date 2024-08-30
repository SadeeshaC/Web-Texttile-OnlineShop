<?php
include("connection.php");
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "' ");
    $data = $rs->fetch_assoc();
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

    <body>
        <!-- Nav Bar -->
        <?php include("navbar.php") ?>
        <!-- Nav Bar -->

        <div class="admin-Body">
            <div class="row container col-12">

                <div class="col-4 mt-3 d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="<?php
                                    if (!empty($data["profile_path"])) {
                                        echo $data["profile_path"];
                                    } else {
                                        echo ("Resources\images\profile.png");
                                    } 
                                    ?>" alt="image" width="150px" class="mt-3" id="i"/>
                    </div>
                    <div class="mt=3">
                        <label for="form-label">Profile Image</label>
                        <input type="file" class="form-control" class="mt-3" id="profileUp"/>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="profileUpload();">Upload</button>
                    </div>
                </div>

                <div class="col-8">
                    <h2>Profile Details</h2>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo($data["fname"]); ?>" id="fname"/>
                        </div>
                        <div class="col-6">
                            <label for="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo($data["lname"]); ?>" id="lname"/>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo($data["email"]); ?>" id="email"/>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo($data["mobile"]); ?>" id="mobile"/>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">Username</label>
                            <input type="text" class="form-control" value="<?php echo($data["username"]); ?>" disabled />
                        </div>
                        <div class="col-6">
                            <label for="form-label">Password</label>
                            <input type="password" class="form-control" value="<?php echo($data["password"]); ?>" id="pw"/>
                        </div>
                    </div>

                    <h3 class="mt-3">Shipping Address</h3>
                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="form-label">No</label>
                            <input type="text" class="form-control" value="<?php echo($data["no"]); ?>" id="no"/>
                        </div>
                        <div class="col-9">
                            <label for="form-label">Line 1</label>
                            <input type="text" class="form-control" value="<?php echo($data["line_1"]); ?>" id="adl_1"/>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Line 2</label>
                        <input type="text" class="form-control" value="<?php echo($data["line_2"]); ?>" id="adl_2"/>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-outline-warning" onclick="updateProfile();">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("location: signin.php");
}

?>