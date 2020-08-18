<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MecBooksCart|Signup</title>
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
?>
        <div class="form-container">
            <form name="myForm" id="form" method="post" >  
                <h2 class="text-center">Create an account</h2>  
                <div class="form-group">
                    <b>Registration Number:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter Registration Number (eg. MDL17CS029)" name="username" required>   
                    </div>
                </div>
<?php
                include("connection.php");
                if(isset($_POST['signup'])!='')
                {
                    $username=$_POST["username"];
                    $sql = mysqli_query($con, "SELECT * from user WHERE username = '$username'");
                    if(mysqli_num_rows($sql) > 0)
                    {
?>
                        <div class="alert alert-danger">This number is already registered. Please Login ! </div>
<?php
                    }
                }    
?>
                <div class="form-group">    
                    <b>Full Name:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter your Name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <b>Password:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Enter a Password" id="password_1" name="password_1" required >
                    </div>
                </div>
                <div class="form-group">
                    <b>Repeat Password:</b><br>  
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>   
                        <input type="password" class="form-control" placeholder="Re-enter Password" id="password_2" name="password_2" required onkeyup='check();' > 
                    </div>
                    <span id='message'></span>
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
<?php
                    if(isset($_POST['signup'])!='')
                    {
                        if($_POST["password_1"] !== $_POST["password_2"]) 
                        {
?> 
                            <br><div class="alert alert-danger">Password Mismatch! Please re-enter your details.</div>                                       
<?php 
                        }
                    }
?>
                </div>
                <div class="form-group">
                    <b>Mobile Number:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input type="tel" class="form-control" placeholder="Enter your Phone Number" name="phone" required>
                    </div>    
                </div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" required>I agree to the license terms.</label></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="signup" type="submit">Sign Up</button>
                </div>
                <div class="already">You already have an account? <a href="login.php" > Login here.</a> </div>
            </form>  
        </div>
<?php
        if(isset($_POST['signup'])!='')
        {
            $username=test_input($_POST["username"]);
            $password_1=$_POST["password_1"];
            $password_2=$_POST["password_2"];
            $phone=test_input($_POST["phone"]);
            $name=test_input($_POST["name"]);
            if($password_1 === $password_2)
            {
                $insert_1=mysqli_query($con, "INSERT INTO user(username, password_1, phone, fullname ) VALUES('$username','$password_1','$phone', '$name')");
                if($insert_1)
                { 
?>
                    <script type="text/javascript">    
                        alert ("Your registration has been successful");
                        window.location.replace("login.php");
                    </script>
<?php
                }
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


