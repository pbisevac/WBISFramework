<?php
$mysql = new mysqli("localhost", "root", "", "crud_test") or die(mysqli_error($mysql));

if ($_POST["email"] != "")
{
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $email= $_POST["email"];
    $id= $_POST["id"];

    $mysql -> query("UPDATE users set first_name = '$first_name', last_name = '$last_name', email = '$email' where id = $id") or die($mysql ->error);
    echo "Uspesno promenjeno!";
}else{
    echo "Neuspesno promenjeno!";
}
