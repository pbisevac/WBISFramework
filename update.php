<html>
<head></head>
<body>
<form action="updateProcess.php" method="post">
    <?php
    $mysql = new mysqli("localhost", "root", "", "crud_test") or die(mysqli_error($mysql));
    $user_id = $_GET["user_id"];

    $result = $mysql -> query("SELECT * FROM users WHERE id = $user_id") or die($mysql ->error);

    $user= $result -> fetch_assoc();
    $id = $user["id"];
    $first_name = $user["first_name"];
    $last_name = $user["last_name"];
    $email= $user["email"];

    echo "<input type='text' name='first_name' id='first_name' placeholder='First name' value='$first_name'>";
    echo "<input type='text' name='last_name' id='last_name' placeholder='First name' value='$last_name'>";
    echo "<input type='text' name='email' id='email' placeholder='First name' value='$email'>";
    echo "<input type='hidden' name='id' placeholder='First name' value='$id'>";
    ?>
    <button type="submit">
        Promeni korisnika
    </button>
</form>
</body>