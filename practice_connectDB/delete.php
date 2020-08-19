<?php
    if(!isset($_GET["id"])){
        die("id not found");
    }
    $id = $_GET["id"];

    if(! is_numeric($id))
    {
        die("id is not number");
    }
    $sql = <<< del
        delete from employee where employeeId = $id;
    del;
    require("DBconfig.php");
    mysqli_query($link,$sql);
    header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>