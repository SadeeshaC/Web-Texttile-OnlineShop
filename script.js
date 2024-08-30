function changeView() {
    var SignInbox = document.getElementById("signin-box");
    var SignUpbox = document.getElementById("signup-box");

    SignInbox.classList.toggle("d-none");
    SignUpbox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("m", mobile.value);
    form.append("u", username.value);
    form.append("p", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Successfuly";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
                document.getElementById("msg1").className = "alert alert-danger";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

function signIn() {
    var username = document.getElementById("un");
    var password = document.getElementById("pw");
    var rememberme = document.getElementById("rm");

    var form = new FormData();
    form.append("un", username.value);
    form.append("pw", password.value);
    form.append("rm", rememberme.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                window.location = "index.php";
                document.getElementById("msgDiv2").className = "d-none";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }
    request.open("POST", "signInProccess.php", true);
    request.send(form);
}

function adminSignIn() {
    var username = document.getElementById("un");
    var password = document.getElementById("pw");

    var form = new FormData();
    form.append("un", username.value);
    form.append("pw", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("msg").innerHTML = responce;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }
    request.open("POST", "adminSigninProcess.php", true);
    request.send(form);
}

function loadUser() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            document.getElementById("tb").innerHTML = responce;
        }
    }
    request.open("POST", "loadUserProccess.php", true);
    request.send()
}

function updateUserStatus() {
    var userid = document.getElementById("usid");

    var form = new FormData();
    form.append("uid", userid.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var responce = request.responseText;

            if (responce == "Inactive") {

                document.getElementById("msg").innerHTML = "User Inactive Successfuly";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                userid.value = "";

                loadUser();

            } else if (responce == "Active") {

                document.getElementById("msg").innerHTML = "User Active Successfuly";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                userid.value = "";

                loadUser();

            } else {

                document.getElementById("msg").innerHTML = responce;
                document.getElementById("msgDiv").className = "d-block";

            }

        }
    }
    request.open("POST", "updateUserStatusProccess.php", true);
    request.send(form);
}

function reload() {
    location.reload();
}

function brandRegister() {
    var brand = document.getElementById("brand");

    var form = new FormData();
    form.append("brand", brand.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "Success") {
                document.getElementById("msg").innerHTML = "Brand Registration Success";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg").innerHTML = responce;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }
    request.open("POST", "brandRegister.php", true);
    request.send(form);
}

function categoryRegistration() {
    var category = document.getElementById("category");

    var form = new FormData();
    form.append("category", category.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "success") {
                document.getElementById("msg2").innerHTML = "Category Registration Successfuly";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                category.value = "";
            } else {
                document.getElementById("msg2").innerHTML = responce;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }
    request.open("POST", "categoryRegistrationProccess.php", true);
    request.send(form);
}

function colorRegister() {
    var color = document.getElementById("color");

    var form = new FormData();
    form.append("color", color.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "success") {
                document.getElementById("msg3").innerHTML = "Color Registration Success";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";

                color.value = "";
            } else {
                document.getElementById("msgDiv3").className = "d-block";
                document.getElementById("msg3").innerHTML = responce;
            }
        }
    }
    request.open("POST", "colorRegistration.php", true);
    request.send(form);
}

function sizeRegester() {
    var size = document.getElementById("size");
    var form = new FormData();
    form.append("size", size.value);

    var request = new XMLHttpRequest()
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (this.responseText == "success") {
                document.getElementById("msg4").innerHTML = "Size Registration Successfuly";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";

                size.value = "";
            } else {
                document.getElementById("msgDiv4").className = "d-block";
                document.getElementById("msg4").innerHTML = this.responseText;
            }
        }
    }
    request.open("POST", "sizeRegisterProccess.php", true);
    request.send(form);
}

function registerProduct() {
    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var category = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", category.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "succsess") {
                alert("Register Successfuly");
                location.reload();
            } else {
                alert(responce);
            }
        }
    }
    request.open("POST", "registerProductProccess.php", true);
    request.send(form);
}

function updateStock() {
    var productId = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("price");

    var form = new FormData();
    form.append("pid", productId.value);
    form.append("qty", qty.value);
    form.append("price", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            alert(responce);
            location.reload();
        }
    }
    request.open("POST", "productUpdateProccess.php", true);
    request.send(form);
}

function printDiv() {
    var orginalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = orginalContent;
}

function loadProduct(x) {
    var page = x;

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            document.getElementById("pid").innerHTML = responce;
        }
    }
    request.open("POST", "loadProductProccess.php", true);
    request.send(f);
}

function searchProduct(s) {
    var page = s;
    var product = document.getElementById("product");

    var f = new FormData();
    f.append("p", page);
    f.append("pr", product.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var responce = r.responseText;
            document.getElementById("pid").innerHTML = responce;
        }
    }
    r.open("POST", "searchProductProccess.php", true);
    r.send(f);
}

function adSearch() {
    var advb = document.getElementById("advanceSearchBox");
    advb.classList.toggle('d-none');
}

function advanSearch(y) {
    var page = y;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var maxPrice = document.getElementById("mprice");
    var minPrice = document.getElementById("minprice");

    var f = new FormData();
    f.append("page", page);
    f.append("color", color.value);
    f.append("category", cat.value);
    f.append("brand", brand.value);
    f.append("size", size.value);
    f.append("maxPrice", maxPrice.value);
    f.append("minPrice", minPrice.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            document.getElementById("pid").innerHTML = responce;
        }
    }
    request.open("POST", "advanceSearchProccess.php", true);
    request.send(f);
}

function profileUpload() {
    var pUp = document.getElementById("profileUp");

    var f = new FormData();
    f.append("profile_img", pUp.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "empty") {
                alert("Plese Select Profile Image");
            } else {
                document.getElementById("i").src = responce;
                Image.value = "";
            }
        }
    }
    request.open("POST", "profileUploadProccess.php", true);
    request.send(f);
}

function updateProfile() {
    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var em = document.getElementById("email");
    var mb = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var ad_1 = document.getElementById("adl_1");
    var ad_2 = document.getElementById("adl_2");

    var f = new FormData();
    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("em", em.value);
    f.append("mb", mb.value);
    f.append("pw", pw.value);
    f.append("no", no.value);
    f.append("ad_1", ad_1.value);
    f.append("ad_2", ad_2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            alert(responce);
            reload();
        }
    }
    request.open("POST", "updateProfileProcceess.php", true);
    request.send(f);
}

function signOut() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var responce = r.responseText;
            alert(responce);
            reload();
        }
    }
    r.open("POST", "signOutProccess.php", true);
    r.send();
}

function adtoCart(st_id) {
    var st_id = st_id;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var form = new FormData();
        form.append("stock_id", st_id);
        form.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                Swal.fire(responce);
                qty.value = "";
            }
        }
        request.open("POST", "adtocCartProccess.php", true);
        request.send(form);
    } else {
        alert("Please Enter Valid Quantity");
    }

}

function loadCart() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var responce = r.responseText;
            document.getElementById("cartBody").innerHTML = responce;
        }
    }
    r.open("POST", "loadCartProccess.php", true);
    r.send();
}

function incrementCartQty(cid) {
    var cart_id = cid;
    var qty = document.getElementById("qty" + cid);
    var newQty = parseInt(qty.value) + 1;

    var form = new FormData();
    form.append("c_id", cart_id);
    form.append("new_qty", newQty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var responce = r.responseText;
            if (responce == "success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(responce);
            }
        }
    }
    r.open("POST", "UpdateCartQtyProcces.php", true);
    r.send(form);
}

function decrementCartQty(cid) {
    var cart_id = cid;
    var qty = document.getElementById("qty" + cid);
    var newQty = parseInt(qty.value) - 1;

    var form = new FormData();
    form.append("c_id", cart_id);
    form.append("new_qty", newQty);

    if (newQty > 0) {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var responce = r.responseText;
                if (responce == "success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(responce);
                }
            }
        }
        r.open("POST", "UpdateCartQtyProcces.php", true);
        r.send(form);
    }

}

function cartRemove(x) {
    var cart_id = x;
    if (confirm("Are You Sure Delete Items")) {
        var f = new FormData();
        f.append("cart_id", cart_id);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var responce = r.responseText;
                alert(responce);
                reload();
            }
        }
        r.open("POST", "removeCartItemProccess.php", true);
        r.send(f);
    }
}

function checkOut() {
    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            var payment = JSON.parse(responce);
            doCheckout(payment, "checkotProccess.php");
        }
    };

    request.open("POST", "paymentProccess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                if (responce == "success") {
                    reload();
                    //invoice report ekk one methanata
                } else {
                    alert(responce);
                }
            }
        };
        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    //document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    //};
}

function buyNow(stockID) {
    var qty = document.getElementById("qty");
    if (qty.value > 0) {

        var form = new FormData();

        form.append("cart", false);
        form.append("stock_id", stockID);
        form.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                var payment = JSON.parse(responce);
                payment.stock_id = stockID;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }
        request.open("POST", "paymentProccess.php", true);
        request.send(form);

    } else {
        alert("Please enter valid quantity");
    }
}

function forgetPassword() {
    var email = document.getElementById("e");
    if (email.value != "") {
        var form = new FormData();
        form.append("email", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                if (responce == 'success') {
                    document.getElementById("msg2").innerHTML = "Email sent! Please check your email";
                    document.getElementById("msg2").className = "alert alert-success";
                    document.getElementById("msgDiv2").className = "d-block";
                    email.value = "";
                } else {
                    document.getElementById("msg2").innerHTML = responce;
                    document.getElementById("msg2").className = "alert alert-danger";
                    document.getElementById("msgDiv2").className = "d-block";
                }
            }
        }
        request.open("POST", "forgetPasswordProccess.php", true);
        request.send(form);
    } else {
        alert("Please enter your valid Email");
    }
}

function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    var form = new FormData();
    form.append("vcode", vcode.value);
    form.append("np", np.value);
    form.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            if (responce == "success") {
                window.location = "signin.php";
            } else {
                document.getElementById("msg2").innerHTML = responce;
                document.getElementById("msg2").className = "alert alert-danger";
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }
    request.open("POST", "resetPasswordProcess.php", true);
    request.send(form);
}

function loadChart() {

    const ctx = document.getElementById('myChart');
    const ctx2 = document.getElementById('myChart2');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            var data = JSON.parse(responce);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.lables,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: data.lables,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }
    }

    request.open("POST", "loadChartProccess.php", true);
    request.send();
}