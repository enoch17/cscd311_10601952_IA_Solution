<?php
session_start();
$user="root";
$pass="";
$db = "studentdb";

$db= new mysqli('localhost',$user, $pass, $db) or die("Unable to connect");
if(isset($_POST['btnsub']))
    {
	   $fname =mysqli_real_escape_string($db,$_POST['fname']);
	   $lname =mysqli_real_escape_string($db,$_POST['lname']);
	   $StuID =mysqli_real_escape_string($db,$_POST['StuID']);
	   $PhoneNo =mysqli_real_escape_string($db,$_POST['PhoneNo']);
	   $dob =mysqli_real_escape_string($db,$_POST['dob']);
	   $College =mysqli_real_escape_string($db,$_POST['College']);
	   $Height =mysqli_real_escape_string($db,$_POST['Height']);
	   $Address =mysqli_real_escape_string($db,$_POST['Address']);
	   $Weight =mysqli_real_escape_string($db,$_POST['Weight']);
	   $email =mysqli_real_escape_string($db,$_POST['email']);
	   $Gender =mysqli_real_escape_string($db,$_POST['Gender']);
	   $Disability =mysqli_real_escape_string($db,$_POST['Disability']);
       $Gname =mysqli_real_escape_string($db,$_POST['Gname']);
       $Gcontact =mysqli_real_escape_string($db,$_POST['Gcontact']);
       $Residence =mysqli_real_escape_string($db,$_POST['Residence']);

       $sql="INSERT INTO students(fname,lname,StuID,PhoneNo,dob,College,Height,
        Address,Weight,email,Gender,Disability,Gname,Gcontact,Residence) VALUES('$fname','$lname','$StuID','$PhoneNo','$dob','$College','$Height',
        '$Address','$Weight','$email','$Gender','$Disability','$Gname','$Gcontact','$Residence')";
        mysqli_query($db,$sql);
        $_SESSION['message'] = "Student Successfully Added";
        header("location: Index.php");
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
                        <button class="buttonclass" onclick="location.href='DeleteStudents.php'">Delete Students</button>
                    </td>
                </tr>
            </table>
        </div>
    <div class="col">
        <form method="post" action="">
            <table cellspacing="5px" cellpadding="5px">
                <tr>
                    <td>
                        <label for="fname" style="color: #c6c8ca">FirstName:</label></td>
                    <td>
                        <input type="text" placeholder="Enter FirstName" name="fname" id="fname"></td>
                    <td>
                        <label for="lname" style="color: #c6c8ca">LastName:</label></td>
                    <td>
                        <input type="text" placeholder="Enter LastName" name="lname" id="lname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="StuID" style="color: #c6c8ca">Student ID:</label></td>
                    <td>
                        <input type="text" placeholder="Enter StudentID" name="StuID" id="StuID">
                    </td>
                    <td>
                        <label for="PhoneNo" style="color: #c6c8ca">PhoneNumber:</label></td>
                    <td>
                        <input type="text" placeholder="Enter Phone Number" name="PhoneNo" id="PhoneNo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob" style="color: #c6c8ca">Date Of Birth:</label></td>
                    <td>
                        <input type="date" placeholder="Enter Date Of Birth" name="dob" id="dob">
                    </td>
                    <td>
                        <label for="College" style="color: #c6c8ca">College:</label></td>
                    <td>
                        <input type="text" placeholder="Enter College" name="College" id="College">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Height" style="color: #c6c8ca">Height:</label></td>
                    <td>
                        <input type="number" placeholder="Enter Height" name="Height" id="Height">
                    </td>
                    <td>
                        <label for="Address" style="color: #c6c8ca">Address:</label></td>
                    <td>
                        <input type="text" placeholder="Enter Home Address" name="Weight" id="Address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Weight" style="color: #c6c8ca">Weight:</label></td>
                    <td>
                        <input type="number" placeholder="Enter Weight" name="Weight" id="Weight">
                    </td>
                    <td>
                        <label for="email" style="color: #c6c8ca">Email:</label></td>
                    <td>
                        <input type="email" placeholder="Enter Email" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: #c6c8ca">Gender:</label></td>
                    <td>
                        <input type="radio" name="Gender" value="female" >Female
                        <input type="radio" name="Gender" value="male" >Male
                    </td>
                    <td>
                        <label for="Disability" style="color: #c6c8ca">Disability:</label></td>
                    <td>
                        <select name="Disability" id="Disability">
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Gname" style="color: #c6c8ca">Guardian Full Name:</label></td>
                    <td>
                        <input type="text" placeholder="Enter Guardian Name" name="Gname" id="Gname">
                    </td>
                    <td>
                        <label for="Gcontact" style="color: #c6c8ca">Guardian Contact:</label></td>
                    <td>
                        <input type="text" placeholder="Enter Guardian Contact" name="Gcontact" id="Gcontact">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Residence" style="color: #c6c8ca">Hall of Residence:</label></td>
                    <td>
                        <input type="text" placeholder="Enter Hall of Residence" name="Residence" id="Residence">
                    </td>
                </tr>
            </table>
            <button class="buttonclass" name="btnsub" id="btnsub">Submit</button>
        </form>
    </div>
    </div>
</body>
</html>