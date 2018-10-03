<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="Index.css" rel="stylesheet">
    <title>Home Page</title>
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
            <table align="center">
                <tr>
                    <td>
                        <button class="buttonclass" onclick="Location.href='Index.php'">View Students</button>
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
                        <button class="buttonclass"onclick="location.href='AddUser.php'">Add User</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col">
            <div>
                <form method ="post" action="Index.php">
                    <input type="text" placeholder="Search by ID" name="set" id="set">
                    <button name = "search" id="search">Search</button>
                    <button name=" All" id="All">View All</button>
                </form>
            </div>
            <br>
            <div>
                <?php
                session_start();
                $user="root";
                $pass="";
                $db = "studentdb";

                $db= new mysqli('localhost',$user, $pass, $db) or die("Unable to connect");

                if(isset($_POST["All"]))
                {
                    $query = "SELECT * FROM students";
                    $result = mysqli_query($db,$query);

                    echo "<table>";
                    echo "<th><tr><td>First Name</td><td>Last Name</td><td>Student ID</td><td>Email</td><td>Gender</td><td>Hall of Residences </td><td>College</td></tr></th>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr><td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td><td>" . $row['StuID']. "</td><td>" . $row['email'] ."</td><td>" . $row['Gender']. "</td><td>" . $row['Residence']."</td><td>" . $row['College'] . "</td></tr>"; 
                    }

                    echo "</table>";
                }
                elseif(isset($_POST["search"]))
                {
                    $set =mysqli_real_escape_string($db,$_POST['set']);
                    $query = "SELECT * FROM students WHERE StuID='$set'";
                    $result = mysqli_query($db,$query);

                    echo "<table>";
                    echo "<th><tr><td>First Name</td><td>Last Name</td><td>Student ID</td><td>Email</td><td>Gender</td><td>Hall of Residences </td><td>College</td></tr></th>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr><td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td><td>" . $row['StuID']. "</td><td>" . $row['email'] ."</td><td>" . $row['Gender']. "</td><td>" . $row['Residence']."</td><td>" . $row['College'] . "</td></tr>"; 
                    }
                    echo "</table>";
                    // echo "<button name='Del' id='Del'>Delete</button>";
                }
                // if (isset($_POST["del"]))
                // {
                //     $set =mysqli_real_escape_string($db,$_POST['set']);
                //     $query = "DELETE FROM students WHERE StuID='$set'";
                //     $result = mysqli_query($db,$query);
            
                //     if(! $result ) 
                //     {
                //         die('Could not delete data: ' . mysql_error());
                //     }
            
                //     echo "Deleted data successfully\n"; 
                //     header("location: Index.php");                   
                // }
                ?>
            </div>
        </div>
    </div>
</body>
</html>