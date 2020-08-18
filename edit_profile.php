<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MecBooksCart|Edit Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>  
<?php
        include 'navbar.php';
        $username=$_SESSION['username'];
        $fetch=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
        if($fetch && $fetch->num_rows>0)
        {
            while($row=mysqli_fetch_array($fetch))
            {
?>
                <div class="form-container">
                    <form id="form" method="post" >   
                        <div class="form-group">
                            <h2>Username : <?php echo $row["username"];?> </h2>
                            <input type="hidden" name="username" value="<?php echo $row["username"];?>">
                        </div>
                        <div class="form-group">
                            <b>Full Name:</b><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" value="<?php echo $row["fullname"];?>"  name="fullname" required >
                            </div>
                        </div>
                        <div class="form-group">    
                            <b>Phone:</b><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="text" class="form-control" value="<?php echo $row["phone"];?>"  name="phone" required>
                            </div>
                        </div> 
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="user_modify" type="submit" >Modify Details</button>    
                        </div> 
                    </form>
                </div>
<?php
            }
        }
        if(isset($_POST['user_modify']))
        {
            $fullname=test_input($_POST['fullname']);
            $phone=test_input($_POST['phone']);
            $update=mysqli_query($con, "UPDATE user SET fullname='$fullname', phone='$phone' WHERE username='$username' ");
            if($update)
            {
?>
                <script>
                    alert("Details modified successfully.");
                    window.location.replace("edit_profile.php");
                </script>
<?php
            }
        }
        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }  
        include 'footer.php';
?>
    </body>
</html>