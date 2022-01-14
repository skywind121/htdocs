<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>HelloWorld</title>
    </head>

    <body>

        <a href="http://localhost/main.php" style="text-decoration:none;">
            <img src="/img/ticket.png" width="5%" height="10%" >
            <font color="red" size="6">海大資工購票網</font>
        </a>

        <?php
        include "db_conn.php";

        $name   = $_POST["name"];
        $age    = $_POST["age"];
        $gender = $_POST["gender"];
        $no     = $_POST["no"];

        $query = ("insert into student values(?,?,?,?)");
        $stmt = $db -> prepare($query);
        $stmt -> bind_param("sisi", $name,$age,$gender,$no);
        $stmt -> execute();

        echo "
        <table border = '1'>
        <tr>
        <th>姓名</th>
        <th>年齡</th>
        <th>性別</th>
        <th>號碼</th>
        </tr>";
        $query2 = "SELECT * FROM student";
        if($stmt = $db -> query($query2)){
            while($result = mysqli_fetch_object($stmt)){
                echo "<tr>";
                echo "<td>".$result->name."</td>";
                echo "<td>".$result->age."</td>";
                echo "<td>".$result->gender."</td>";
                echo "<td>".$result->no."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        ?>

        <a href="http://localhost/main.php">返回</a>
    </body>
</html>
