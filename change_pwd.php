<?php
    include("connection.php");
    session_start();
    if (!isset($_SESSION['username'])) 
    {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MecBooksCart|Change Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<?php
        include 'navbar.php';
?>
        <div class="form-container">
            <form name="changePasswordForm" id="form" method="post">
                <h2 class="text-center">Change Password</h2>
                <div class="form-group">
                    <b>Current Password :</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:white;"></i></span>
                        <input type="password" class="form-control" placeholder="Enter current password" name="currentpassword" required>
                    </div>
                </div>
                <div class="form-group">
                    <b>New Password :</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:#f4476b;"></i></span>
                        <input type="password" class="form-control" placeholder="Enter new password" name="newpassword" id="password_1" required>
                    </div>
                </div>
                <div class="form-group">
                    <b>Confirm New Password :</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:#f4476b;"></i></span>
                        <input type="password" class="form-control" placeholder="Enter new password again" name="confirmpassword" id="password_2" onkeyup=check() required>
                    </div>
                </div><span id='message'></span>
                <script>
                    var check = function() 
                    {
                        if (document.getElementById('password_1').value == document.getElementById('password_2').value) 
                        {
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('message').innerHTML = 'Matching :)';
                        } 
                        else 
                        {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = 'Not Matching :(';
                        }
                    }
                </script>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="change" type="submit">Change</button>
                </div>
            </form>
        </div>
<?php
        if (isset($_POST['change']))
        {
            $username = $_SESSION['username'];
            $currentpassword = $_POST['currentpassword'];
            $newpassword = $_POST['newpassword'];
            $result = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
            $row = mysqli_fetch_array($result);
            if ($currentpassword == $row['password_1'])
            {
                mysqli_query($con, "UPDATE user SET password_1='$newpassword' WHERE username='$username' ");
?>
                <script>
                    alert('Password changed');
                    window.location.replace('settings.php');
                </script>
<?php
            } 
            else 
            {
?>
                <script>
                    alert('Current Password is incorrect.');
                </script>
<?php
            }
        }
        include 'footer.php';
?>
    </body>
</html>