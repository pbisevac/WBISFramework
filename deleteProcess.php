<?php

$mysql = new mysqli("localhost", "root", "", "crud_test") or die(mysqli_error($mysql));

$id = $_GET["user_id"];

$mysql->query("DELETE from users WHERE id = $id") or die(mysqli_error($mysql));

echo "User deleted";
echo "<br>";
echo "<a href='index.php'>Back</a>";
