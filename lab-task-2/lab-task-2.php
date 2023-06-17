<!DOCTYPE HTML>
<html>

<body>
    <?php
    $name = $email = $dob = $gender = $degree = $blood = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $dob = $_POST["date"];
        if (isset($_POST["gender"])) {
            $gender = $_POST["gender"];
        }
        // if (isset($_POST["degree"])) {
        //     $degree = $_POST["degree"];
        //     foreach ($degree as $deg) {
        //         echo $deg;
        //     }
        // }
        $blood = $_POST["blood"];
    }
    ?>

    <h3>Your Information:</h3>
    <?php echo $name ?><br>
    <?php echo $email ?><br>
    <?php echo $dob ?><br>
    <?php echo $gender ?><br>
    <!-- <?php echo $degree ?><br> -->
    <?php echo $blood ?><br>

    <h2 style="text-align: center;">Designing HTML form using PHP with validation of user inputs</h2>
    <div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
                <legend>NAME</legend>
                <input type="text" name="name" id="name">
            </fieldset>
            <fieldset>
                <legend>EMAIL</legend>
                <input type="email" name="email" id="email">
            </fieldset>
            <fieldset>
                <legend>DATE OF BIRTH</legend>
                <input type="date" name="date" id="date">
            </fieldset>
            <fieldset>
                <legend>GENDER</legend>
                <input type="radio" name="gender" id="male" value="male"> Male
                <br>
                <input type="radio" name="gender" id="female" value="female"> Female
                <br>
                <input type="radio" name="gender" id="other" value="other"> Other
            </fieldset>
            <fieldset>
                <legend>DEGREE</legend>
                <input type="checkbox" name="degree" id="ssc"> SSC
                <br>
                <input type="checkbox" name="degree" id="hsc"> HSC
                <br>
                <input type="checkbox" name="degree" id="bsc"> BSc
                <br>
                <input type="checkbox" name="degree" id="msc"> MSc
            </fieldset>
            <fieldset>
                <legend>BLOOD GROUP</legend>
                <select name="blood" id="blood">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </fieldset>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>