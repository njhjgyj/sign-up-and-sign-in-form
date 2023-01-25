<?php

session_start();

if (!isset($_SESSION["firstName"])) {
    echo "You are logged out";
    header("location: index2.php");
}

if (!isset($_SESSION["lastName"])) {
    echo "You are logged out";
    header("location: index2.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="logout.php">logout</a>

<h1>Welcome</h1>
<?php

echo $_SESSION["firstName"];
echo " ";
echo $_SESSION["lastName"];

?>

</body>
</html>