<?php

$server = 'localhost';
$userName = 'root';
$password = '';
$dataBase = 'project2';

$connection = mysqli_connect($server, $userName, $password, $dataBase);

if ($connection) {
    
    ?>
    <script>

        alert("Connection successful");

    </script>

    <?php

} else {

    ?>

<script>

    alert("Connection not successful");

</script>

<?php

}

?>