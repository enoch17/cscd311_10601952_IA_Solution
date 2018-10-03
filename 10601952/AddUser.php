<?php
session_start();
$user="root";
$pass="";
$db = "studentdb";

$db= new mysqli('localhost',$user, $pass, $db) or die("Unable to connect");
if(isset($_POST['btnsub']))
    {
       $email =mysqli_real_escape_string($db,$_POST['email']);
       $pswd =mysqli_real_escape_string($db,$_POST['pswd']);
       $password =md5($password);

       $sql="INSERT INTO users(email,pswd) VALUES('$email','$pswd')";
        mysqli_query($db,$sql);
        $_SESSION['message'] = "Student Successfully Added";
        header("location: AddUser.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Students</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="AddStudents.css" rel="stylesheet">
</head>
<body>
    <div class="class1 row">
        <div class="UpperLabel col-6">University of Curio</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
            <button class="buttonclass" type="submit" onclick="location.href='LoginPage.php'">Log Out</button>
        </div>
    </div>
    <div class="row ">
        <div class="col-2 class2" >
            <table align="center" cellspacing="20px">
                <tr>
                    <td>
                        <button class="buttonclass" onclick="location.href='Index.php'">View Students</button>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="buttonclass" onclick="location.href='AddStudents.php'">Add Students</button>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="buttonclass" onclick="location.href='AddUser.php'">Add User</button>
                    </td>
                </tr>
            </table>
        </div>
    <div class="col">
        <form method="post" action="">
            <table cellspacing="5px" cellpadding="5px">
                <tr>
                    <td>
                        <label for="email" style="color: #c6c8ca">Email:</label></td>
                    <td>
                        <input type="text" placeholder="Enter Email" name="email" id="email"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pswd" style="color: #c6c8ca">Password:</label></td>
                    <td>
                        <input type="password" placeholder="Enter Password" name="pswd" id="pswd">
                </tr>
                <tr>
                    <td>
                        <label for="cpswd" style="color: #c6c8ca">Password:</label></td>
                    <td>
                        <input type="password" placeholder="Confirm Password" name="cpswd" id="cpswd">
                </tr>
            <button class="buttonclass" name="btnsub" id="btnsub">Create
            </button>
        </form>
    </div>
    </div>
</body>
</html>