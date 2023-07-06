<!DOCTYPE HTML>
<html>
<style>
    .error {
        color: red;
    }
</style>

<?php
$current = "current@123";
$new = $retype = $currentErr = $newErr = $retypeErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["current"])) {
        $currentErr = "Can not be empty*";
    } else {
        $_POST["current"] = $current;
    }

    if ($_POST["new"] == $_POST["current"]) {
        $newErr = "New password and current password can not be same!*";
    } else {
        $new = $_POST["new"];
    }

    if ($_POST["new"] != $_POST["re-type"]) {
        $retypeErr = "New password must match with Re-type password*";
    } else {
        $retype = $_POST["re-type"];
        $retypeErr = "Password matched!*";
    }
}

?>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Change Password</legend>
            Current Password: <input type="password" name="current" id="current">
            <span class="error">
                <?php echo $currentErr ?>
            </span>
            <br><br>
            New Password: <input type="password" name="new" id="new">
            <span class="error">
                <?php echo $newErr ?>
            </span>
            <br><br>
            Re-type Password: <input type="password" name="re-type" id="re-type">
            <span class="error">
                <?php echo $retypeErr ?>
            </span>
            <br><br>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
</body>

</html>