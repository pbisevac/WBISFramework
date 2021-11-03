<?php
$mysql = new mysqli("localhost", "root", "", "crud_test") or die(mysqli_error($mysql));

if ($_POST["email"] != "")
{
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $email= $_POST["email"];

    $mysql -> query("INSERT INTO users (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')") or die($mysql ->error);
    echo "Uspesno dodato!";
}else{
    echo "Neuspesno dodato!";
}

