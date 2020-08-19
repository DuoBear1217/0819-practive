<?php
    session_start();
    require("DBconfig.php");
    if(isset($_POST["btncancel"]))
    {
        header("location: index.php");
    }
    if(isset($_POST["submit"]))
    {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $cityId = $_POST["select"];
        // echo $firstName;
        // echo $lastName;
        // echo $cityId;
        $add = <<< end
        insert into employee(firstName,lastName,cityid)
        values ('$firstName','$lastName',$cityId);
        end;
        // echo $add;
        require("DBconfig.php");
        mysqli_query($link,$add);
        header("location: index.php");
        // exit();
    }
    //搜尋城市有哪些
    $sql2=<<<ser
    select * from city;
    ser;
    $result2=mysqli_query($link,$sql2);
    // var_dump($result2);
    // $row2=mysqli_fetch_assoc($result2);
    // var_dump($row2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>New</h1>
    <form method="post"> 
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">FirstName</label>
            <div class="col-8">
                <input id="text" name="firstName" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">LastName</label>
            <div class="col-8">
                <input id="text1" name="lastName" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-4 col-form-label">City</label>
            <div class="col-8">
                <select id="select" name="select" class="custom-select">
                <?php while($row2=mysqli_fetch_assoc($result2)){?>
                        <option value="<?=$row2["cityId"];?>"  <?php if($row2["cityid"]==$row["cityid"]){echo "selected";}?> ><?=$row2["cityName"]?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button id="sub" value="OK" name="submit" type="submit" class="btn btn-primary">Submit</button>
                <button id="cancel" value="cancel" name="btncancel" type="submit" class="btn btn-primary">cancel</button>
            </div>
        </div>
    </form>
    </div>

</body>

</html>