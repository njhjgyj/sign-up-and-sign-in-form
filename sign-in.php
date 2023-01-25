<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <style>
        input{
            font-size: larger;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-style: oblique;
        }
    </style>
</head>

<body>

    <?php

    include 'connection2.php';

    if (isset($_POST['signin'])) {

        $email2 = $_POST['email2'];
        $pass2 = $_POST['pass2'];
        $emaiCheck = "select * from table1ofproject2 where email='$email2'";
        $emailCheckResult = mysqli_query($connection, $emaiCheck);
        $emailCount = mysqli_num_rows($emailCheckResult);
        if ($emailCount) {

            $getPass = mysqli_fetch_assoc($emailCheckResult);      # yhan pe humne jo emailCheckResult waali variable he ussmen se jo output aya humne ussko aik array men mangwaliya yhan pe mysqli_fetch_array() ki jagah mysqli_fetch_assoc() bhi aa sakta he
            $dataBasePass = $getPass["password"];       # yhan pe humne password mangwaliya database se woh ese kiyoon ke getPass variable men ab database men jo email thi woh aa gayi and woh woh humne array ke andar store kardi and humne phir yhan pe index ki madad se password ko mangwaliya

            $_SESSION["firstName"] = $getPass["firstName"];
            $_SESSION["lastName"] = $getPass["lastName"];

            $passDecode = password_verify($pass2, $dataBasePass);

            if ($passDecode) {
                echo "login successful";
                header("location: home.php");
            } else {
                echo "password is incorrect";
            }

        } else {
            echo "Invalid email";
        } 

    };

    ?>

    <div id="mainDiv">

        <div id="div1">

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                <span id="mainSpan">

                    <span id="span1">

                        <label for="emailinp2">Email </label>&nbsp;
                        <input type="email" name="email2" id="emailinp2" placeholder="Email" required>
                        <p id="emailError"></p>

                    </span><br>

                    <span id="span2">

                        <label for="passinp2">Password </label>&nbsp;
                        <input type="password" name="pass2" id="passinp2" placeholder="Password" required>

                    </span><br><br>

                    <input type="submit" name="signin" id="submitBtn2" value="Sign-in">

                </span><br><br><br>

                <span>
                    <a href="index3.php">forget</a>&nbsp; <b>Password? </b><br>
                    <b>OR</b><br>
                    <b>creae an account &nbsp;<a href="index.php">sign-up</a></b>
                </span>

            </form>

        </div>

    </div>

</body>

</html>