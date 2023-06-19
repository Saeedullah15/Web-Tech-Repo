<!DOCTYPE HTML>
<html>

<style>
    .error {
        color: red;
    }
</style>

<body>
    <?php
    $name = $email = $dob = $gender = $blood = '';
    $degree = [];
    $nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // name validation
        if (empty($_POST["name"])) {
            $nameErr = "Name is required*";
        } else if (str_word_count($_POST["name"]) < 2) {
            $nameErr = "Min 2 words*";
        } else if (!preg_match('/[a-zA-Z]/', $_POST["name"][0])) {
            $nameErr = "Must start with a letter*";
        } else {
            $name = $_POST["name"];
        }

        // email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email is required*";
        } else if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["email"])) {
            $emailErr = "Invalid email address*";
        } else {
            $email = $_POST["email"];
        }

        // date validation
        if (empty($_POST["date"])) {
            $dobErr = "Date of birth is required*";
        } else {
            $dob = $_POST["date"];
        }

        // gender validation
        if (empty($_POST["gender"])) {
            $genderErr = "One must be selected*";
        } else {
            if (isset($_POST["gender"])) {
                $gender = $_POST["gender"];
            }
        }

        // degree validation
        if (empty($_POST["degree"])) {
            $degreeErr = "Check your degree*";
        } else {
            if (isset($_POST["degree"])) {
                if (count($_POST["degree"]) < 2) {
                    $degreeErr = "2 of them must be selected*";
                } else {
                    $degree = $_POST["degree"];
                }
            }
        }

        // blood validation
        if (empty($_POST["blood"])) {
            $bloodErr = "Must be selected*";
        } else {
            $blood = $_POST["blood"];
        }
    }
    ?>

    <h3>Your Information:</h3>
    <?php echo $name ?><br>
    <?php echo $email ?><br>
    <?php echo $dob ?><br>
    <?php echo $gender ?><br>
    <?php foreach ($degree as $deg) {
        echo $deg . " ";
    } ?><br>
    <?php echo $blood ?><br>

    <h2 style="text-align: center;">Designing HTML form using PHP with validation of user inputs</h2>
    <div>
        <form method="POST">
            <fieldset>
                <legend>NAME</legend>
                <input type="text" name="name" id="name">
                <span class="error">
                    <?php echo $nameErr ?>
                </span>
            </fieldset>
            <fieldset>
                <legend>EMAIL</legend>
                <input type="email" name="email" id="email">
                <span class="error">
                    <?php echo $emailErr ?>
                </span>
            </fieldset>
            <fieldset>
                <legend>DATE OF BIRTH</legend>
                <input type="date" name="date" id="date">
                <span class="error">
                    <?php echo $dobErr ?>
                </span>
            </fieldset>
            <fieldset>
                <legend>GENDER</legend>
                <input type="radio" name="gender" id="male" value="Male"> Male
                <br>
                <input type="radio" name="gender" id="female" value="Female"> Female
                <br>
                <input type="radio" name="gender" id="other" value="Other"> Other
                <br>
                <span class="error">
                    <?php echo $genderErr ?>
                </span>
            </fieldset>
            <fieldset>
                <legend>DEGREE</legend>
                <input type="checkbox" name="degree[]" value="SSC" id="ssc"> SSC
                <br>
                <input type="checkbox" name="degree[]" value="HSC" id="hsc"> HSC
                <br>
                <input type="checkbox" name="degree[]" value="BSc" id="bsc"> BSc
                <br>
                <input type="checkbox" name="degree[]" value="MSc" id="msc"> MSc
                <br>
                <span class="error">
                    <?php echo $degreeErr ?>
                </span>
            </fieldset>
            <fieldset>
                <legend>BLOOD GROUP</legend>
                <select name="blood" id="blood">
                    <option value=""></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <span class="error">
                    <?php echo $bloodErr ?>
                </span>
            </fieldset>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>