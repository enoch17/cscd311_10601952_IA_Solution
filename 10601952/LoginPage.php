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

        $pswd = md5($password);
        $sql= "SELECT * FROM users WHERE email = '$email' AND pswd='$pswd'";
        $result = mysqli_query($db,$sql);

        if(mysqli_num_rows($result) ==1)
        {
            $_SESSION['message'] = "You are now logged in";
            header("location: Index.php");
        }
        else
        {
            $_SESSION['message'] = "Your Passowrd/Email is incorrect";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="LoginPage.css">
</head>
<body class="MainBg">
    <div class="box">
        <form method="post" action="Index.php">
        <table border="0"cellpadding="5px" cellspacing="5px">
            <thead>
            <tr>
                <th align="centre" style="color: #c6c8ca">Login Page</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label for="email" style="color: #c6c8ca">Email:</label>
                    <input type="email" placeholder="Enter Email" name="email" id="email" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pswd" style="color: #c6c8ca">Password:</label>
                    <input type="password" placeholder="Enter Password" name="pswd" id="pswd">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name ="btnsub" id="btnsub" >Login</button>
                </td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>