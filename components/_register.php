<?php
if (isset($_SESSION["userid"])) {
    header("Location: index.php");
}

if (isset($_POST["btnRegister"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    $userCore->checkRegister($username, $password, $confirm);
}

$error = "";
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfields") {
        $error = "Empty fields";
    } elseif ($_GET["error"] == "passnotmatch") {
        $error = "Password and Confirm password not match";
    } elseif ($_GET["error"] == "usernameexist") {
        $error = "Username already exist";
    } elseif ($_GET["error"] == "insertfail") {
        $error = "Fail to register. Please try again!";
    }
} elseif (isset($_GET["success"])) {
    $error = "Đăng ký thành công";
    header("Refresh:5;url=index.php");
}

?>

<div class="container color-white-bg mt-3 mb-3">
    <center>
        <h3>Register</h3>
    </center>
    <form method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" name="confirm">
        </div>

        <div class="form-group">
            <h6 style="color: red;"><?php echo $error; ?></h6>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3" name="btnRegister">Register</button>
    </form>
</div>