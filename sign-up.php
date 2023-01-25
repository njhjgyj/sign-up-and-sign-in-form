<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        #mainDiv {
            height: 100vh;
            background-color: blue;
        }

        #div1 {
            background-color: aqua;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            height: 120vh;
        }

        #formid1 {
            display: inline-block;
            /* background-color: blueviolet; */
            width: 50vh;
            height: 65vh;
            padding: 20vh;
            border: 5px solid gray;
            box-shadow: 1px 10px 10px black;
        }

        .childsSpanOfMainSpan {
            /* background-color: aqua; */
        }

        label {
            font-size: larger;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }

        input {
            height: 4vh;
            font-size: larger;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-style: oblique;
            border-radius: 5px;
        }

        input:hover {
            background-color: lightblue;
            transition: 0.2s;
        }

        #submitBtn1 {
            cursor: pointer;
        }

        p {
            color: red;
            font-weight: 600;
            font-style: italic;
        }

        h1 {
            position: absolute;
            top: 100px;
        }

        #showpass1 {
            cursor: pointer;
            background-color: blue;
            width: 108px;
        }

        #hidepass1 {
            display: none;
            cursor: pointer;
            background-color: blue;
            width: 102px;
        }

        #showpass2 {
            cursor: pointer;
            background-color: blue;
            width: 108px;
        }

        #hidepass2 {
            display: none;
            cursor: pointer;
            background-color: blue;
            width: 102px;
        }
    </style>
</head>

<body>

    <?php
    include "connection2.php";

    if (isset($_POST['signup'])) {
        $fName = mysqli_real_escape_string($connection, $_POST['fname']);           # mysqli_real_escape_string() aik function he jiisska english men Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection ye meaning he
        $lName = mysqli_real_escape_string($connection, $_POST['lname']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $pass = mysqli_real_escape_string($connection, $_POST['password1']);
        $conPass = mysqli_real_escape_string($connection, $_POST['conpassword']);
        $passSecure = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
        $conPassSecure = password_hash($conPass, PASSWORD_BCRYPT, ['cost' => 12]);

        $emailCheck = "select * from table1ofproject2 where email='$email'";      # yhan pe check select karega puure table men se jhan pe email jo he woh email ke barabar hoo woh check kare ga
        $emailCheckResult = mysqli_query($connection, $emailCheck);      # yhan pe mene link qarwaya he
        $emailCount = mysqli_num_rows($emailCheckResult);        # mysqli_num_rows() aik function he jooke row batata he 

        $fNameCheck = "select * from table1ofproject2 where firstName='$fName'";
        $fNameCheckResult = mysqli_query($connection, $fNameCheck);
        $fNameCount = mysqli_num_rows($fNameCheckResult);

        $lNameCheck = "select * from table1ofproject2 where lastName='$lName'";
        $lNameCheckResult = mysqli_query($connection, $lNameCheck);
        $lNameCount = mysqli_num_rows($lNameCheckResult);

        if ($emailCount > 0) {         # yhan pe mene $emailCount wali variable check karwai he ke agar 1 row se ziyada agar email hoongi to matlab email already mojood he and yahi kaam mene fName and lName ke saath bhi kara he

    ?>

            <script>
                alert("Email is already exist");
            </script>

        <?php

        } else if ($fNameCount > 0) {

        ?>

            <script>
                alert("first name is already exist");
            </script>

        <?php

        } else if ($lNameCount > 0) {

        ?>

            <script>
                alert("last name is already exist");
            </script>

            <?php

        } else {

            if ($pass === $conPass) {
                $insertUserData = "insert into table1ofproject2 (firstName, lastName, email, password, confirmPassword) values ('$fName', '$lName', '$email', '$passSecure', '$conPassSecure')";
                $result1 = mysqli_query($connection, $insertUserData);

                if ($result1) {

            ?>
                    <script>
                        alert("Sign-up Successful");
                    </script>

                <?php
                } else {

                ?>

                    <script>
                        alert("Sign-up not Successful something went wrong");
                    </script>

                <?php

                }

                ?>

            <?php

            } else {

            ?>
                <script>
                    alert("Your Password and confirm password is not match");
                </script>

    <?php



            };
        };
    };


    ?>

    <div id="mainDiv">

        <div id="div1">

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="formid1">

                <h1>Sign-up</h1>

                <span id="mainSpan">

                    <span id="span1" class="childsSpanOfMainSpan">

                        <label for="fnameid1">First name </label><br>
                        <input type="text" name="fname" id="fnameid1" placeholder="First Name" required>
                        <p id="fnameerror"></p>

                    </span><br><br>

                    <span id="span2" class="childsSpanOfMainSpan">

                        <label for="lnameid1">Last name </label><br>
                        <input type="text" name="lname" id="lnameid1" placeholder="Last Name" required>
                        <p id="lnameerror"></p>

                    </span><br><br>

                    <span id="span3" class="childsSpanOfMainSpan">

                        <label for="emailid1">Email </label><br>
                        <input type="email" name="email" id="emailid1" placeholder="Email" required>

                    </span><br><br>

                    <span id="span4" class="childsSpanOfMainSpan">

                        <label for="passid1">Password </label><br>
                        <input type="password" name="password1" id="passid1" placeholder="Password" required>
                        <b id="showpass1" onclick="foo2()">Show password</b>
                        <b id="hidepass1" onclick="foo3()">Hide password</b>
                        <p id="passerror"></p>

                    </span><br><br>

                    <span id="span5" class="childsSpanOfMainSpan">

                        <label for="conpassid1">Confirm password </label><br>
                        <input type="password" name="conpassword" id="conpassid1" placeholder="Confirm Password" required>
                        <b id="showpass2" onclick="foo4()">Show password</b>
                        <b id="hidepass2" onclick="foo5()">Hide password</b>
                        <p id="conpasserror"></p>

                    </span><br><br>

                    <input type="submit" name="signup" id="submitBtn1" value="Register" onclick="return foo1()">

                </span><br><br>

                <span>
                    <b>Already have an account? <a href="index2.php" target="_blank">sign-in</a> </b>
                </span>
            </form>

        </div>

    </div>

</body>

<script src="app.js"></script>

</html>