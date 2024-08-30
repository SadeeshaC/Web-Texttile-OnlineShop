<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="signin-body">

    <!-- Sign In Box -->
    <div class="signin-box" id="signin-box">
        <h1 class="text-center">Sign In</h1>

        <?php
        $un = ""; //Username variable
        $pw = ""; //password variable

        if (isset($_COOKIE["username"])) {
            $un = $_COOKIE["username"];
        }
        if (isset($_COOKIE["password"])) {
            $pw = $_COOKIE["password"];
        }
        ?>

        <div class="mt-2">
            <label for="form-label">Username</label>
            <input type="text" class="form-control" id="un" value="<?php echo $un ?>" />
        </div>
        <div class="mt-2">
            <label for="form-label">Password</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $pw ?>" />
        </div>
        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-check-input" id="rm">
            <label for="form-control">Remember Me</label>
        </div>
        <div class="d-none" id="msgDiv2">
            <div class="alert alert-danger" id="msg2"></div>
        </div>
        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="signIn();">Sign In</button>
        </div>
        <div class="mt-2">
            <a href="forgetPassword.php"><button class="btn btn-outline-info col-12">Forget Password?</button></a>
        </div>
        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">New to Online Store? Please Sign Up</button>
        </div>
    </div>
    <!-- Sign In Box -->

    <!-- Sign Up Box -->
    <div class="signup-box d-none" id="signup-box">
        <h1 class="text-center">Sign Up</h1>
        <div class="row mt-2">
            <div class="col-6">
                <label for="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" />
            </div>
            <div class="col-6">
                <label for="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" />
            </div>
        </div>
        <div>
            <label for="form-label">Email</label>
            <input type="email" class="form-control mt-2" id="email" />
        </div>
        <div>
            <label for="form-label">Mobile</label>
            <input type="text" class="form-control mt-2" id="mobile" />
        </div>
        <div>
            <label for="form-label">Username</label>
            <input type="text" class="form-control mt-2" id="username" />
        </div>
        <div>
            <label for="form-label">Password</label>
            <input type="password" class="form-control mt-2 mb-2" id="password" />
        </div>
        <div class="d-none" id="msgDiv1">
            <div class="alert alert-danger" id="msg1"></div>
        </div>
        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="signUp();">Sign Up</button>
        </div>
        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">Already Have an Account? Please
                Sign In</button>
        </div>

    </div>
    <!-- Sign Up Box -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>