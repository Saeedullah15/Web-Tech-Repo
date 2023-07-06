<!DOCTYPE HTML>
<html>
<style>
    .error {
        color: red;
    }
</style>

<body>
    <?php
    $name = $password = $nameErr = $passErr = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required*";
        } else if (!preg_match('/^[a-zA-Z0-9.-_]+$/', $_POST["name"])) {
            $nameErr = "Can contain alpha numeric characters, period, dash or underscore only*";
        } else if (strlen($_POST["name"]) < 2) {
            $nameErr = "At least 2 characters*";
        } else {
            $name = $_POST["name"];
        }

        // password
        if (empty($_POST["password"])) {
            $passErr = "Password is required*";
        } else if (strlen($_POST["password"]) < 8) {
            $passErr = "Not less than 8 characters*";
        } else if (!preg_match('/[@#$%]/', $_POST["password"])) {
            $passErr = "Must contain at least one of the special characters (@, #, $, %)*";
        } else {
            $password = $_POST["password"];
        }

    }
    ?>

    <div>
        <fieldset>
            <legend>LOGIN</legend>
            <form method="post" action="">
                Username: <input type="text" name="name" id="name">
                <span class="error">
                    <?php echo $nameErr ?>
                </span>
                <br><br>
                Password: <input type="password" name="password" id="password">
                <span class="error">
                    <?php echo $passErr ?>
                </span>
                <hr>
                <input type="checkbox" name="" id=""> Remember Me
                <br><br>
                <input type="submit" value="Submit">
                <a href="">Forget Password?</a>
            </form>
        </fieldset>
    </div>
</body>

</html>