<?php
if (isset($_SESSION["userid"])) {
    header("Location: index.php");
}

if (isset($_POST["btnLogIn"])) {
    $username = $_POST["username"];
    $passwork = $_POST["password"];

    $userCore->checkLogIn($username, $passwork);
}

$error = "";
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfields") {
        $error = "Empty fields";
    } elseif ($_GET["error"] == "usernotfound") {
        $error = "User not found";
    } elseif ($_GET["error"] == "passnotcorrect") {
        $error = "Password not correct";
    }
}
?>
<div class="container color-white-bg mt-3 mb-3">
    <center>
        <h3>Log In</h3>
    </center>
    <form method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <h5 class="text-center" style="color: red;"><?php echo $error; ?></h5>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3" name="btnLogIn">Log In</button>
    </form>
</div>