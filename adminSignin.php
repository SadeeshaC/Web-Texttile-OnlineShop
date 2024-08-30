<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="admin-body d-flex justify-content-center align-items-center">

    <div class="adminsignin-box">
        <h1 class="text-center">Admin Login</h1>
        <div class="mt-2">
            <label for="form-label">Username</label>
            <input type="text" class="form-control bg-transparent border-secondary" placeholder="Ex: Kamal" id="un"/>
        </div>
        <div class="mt-2 mb-2">
            <label for="form-label">Password</label>
            <input type="password" class="form-control bg-transparent border-secondary" placeholder="Ex: ******" id="pw"/>
        </div>
        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>
        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="adminSignIn();">Sign In</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>