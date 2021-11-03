<html>
<head></head>
<body>
<table style='border: black solid 3px;'>
    <thead>
        <th>Id</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Opcije</th>
    </thead>
    <tbody>
    <?php
        $mysql = new mysqli("localhost", "root", "", "crud_test") or die(mysqli_error($mysql));

        $result = $mysql -> query("SELECT * FROM users") or die($mysql ->error);

        while ($row = $result -> fetch_assoc())
        {
            $id = $row["id"];
            echo "<tr>";
            echo "<td>";
            echo $row["id"];
            echo  "</td>";
            echo "<td>";
            echo $row["first_name"];
            echo  "</td>";
            echo "<td>";
            echo $row["last_name"];
            echo  "</td>";
            echo "<td>";
            echo $row["email"];
            echo  "</td>";
            echo "<td>";
            echo "<a href='update.php?user_id=$id'>Edit</a>";
            echo "<a href='deleteProcess.php?user_id=$id'>Delete</a>";
            echo  "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
</body>
</html>


