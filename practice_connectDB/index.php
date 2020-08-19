<?php
session_start();
if (isset($_GET["newInfo"])) {
    echo "1234";
    header("Location:new_edit.php");
    exit();
}

require_once("DBconfig.php");
$askDB = <<< end
    select employeeid , firstName , lastName , cityName from employee as e JOIN city as c ON e.cityId = c.cityID
    end;
$result = mysqli_query($link, $askDB);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    
    <div class="container">
    <h1>EMPLOYEE  
        <span class="float-right">
             <a href="new.php" type="submit" id="newItem" name="newInfo" class="btn btn-primary">New</a>
        </span>
    </h1>
    <hr>
        <table class="table table-striped">
            
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["firstName"] ?></td>
                        <td><?php echo $row["lastName"] ?></td>
                        <td><?php echo $row["cityName"] ?></td>
                        <td>
                            <span class="float-right">
                                <a href="edit.php?id=<?php echo $row["employeeid"] ?>" id="edit" name="btnedit" class="btn btn-success">Edit</a>

                                <a method="" href="delete.php?id=<?php echo $row["employeeid"] ?>" id="delete" class="btn btn-danger">Delete</a>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- <script>
        $("#newItem").on("click",function(){
            
        })
    </script> -->
</body>

</html>