<?php
    include('connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MecBooksCart|Contact Us</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<?php
        include 'navbar.php';
?>
        <div class="container" id="contact">
            <h1>Feel Free to Reach Us at:</h1><br>
            <h3><i class="glyphicon glyphicon-envelope"></i> arundhathi.mec@gmail.com</h3>
            <h3><i class="glyphicon glyphicon-envelope"></i> gopika.mec@gmail.com</h3>
        </div>
<?php
        include 'footer.php';
?>
    </body>
</html>