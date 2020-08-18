<?php
    include("connection.php");
    session_start();
    if (isset($_POST["login"])) 
    {
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
        $x = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password_1='$password_1'");
        if (mysqli_num_rows($x)) 
        {
            $row = mysqli_fetch_array($x, MYSQLI_ASSOC);
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password_1;
            $_SESSION['fullname'] = $row['fullname'];
            header("location:bs.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MecBooksCart|Login</title>
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
            <form name="login" id="form" method="post">
                <h2 class="text-center">Login</h2>
                <div class="form-group">
                    <b>Registration Number:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter Registration Number" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <b>Password:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Enter a Password" id="password_1" name="password_1" required>
                    </div>
                </div>
<?php
                if (isset($_POST["login"])) 
                {
                    $username = $_POST['username'];
                    $password_1 = $_POST['password_1'];
                    $x = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password_1='$password_1'");
                    if (mysqli_num_rows($x) === 0) 
                    {
?>
                        <div class="alert alert-danger">Incorrect Username or Password! </div>
<?php
                    }
                }
?>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                </div>
                <div class="already">Not yet a member? <a href="signup.php">Sign Up</a> </div>
            </form>
      </div>
<?php
    include 'footer.php';
?>
    </body>
</html>