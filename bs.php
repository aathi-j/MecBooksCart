<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MecBooksCart|Buy/Sell</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    </head>
    <body>
<?php
        include 'navbar.php';
        $first_name = explode(' ',trim($_SESSION['fullname']))[0];
?>
        <h1 style="padding-left:2%;"><b> Hey <?php echo $first_name; ?>!</b></h1>
        <div class=container>
            <div class="jumbotron" >
                <h1>Want to buy books for college?</h1>
                <h3>Too expensive? Save some money by buying used books from other students just like you.<br></h3>
                <h3>What are you waiting for?</h3>
                <br>
                <a href="buy.php" class="btn btn-default btn-lg active">Buy Now</a>
            </div>
            <div class="jumbotron" >
                <h1>Have old text books stacked up in your shelves?</h1>
                <h3>There’s no point keeping those old textbooks around to gather dust. Sell them to students who need them and make some extra cash.<br></h3>
                <h3>What are you waiting for?</h3>
                <br>
                <a href="sell.php" class="btn btn-default btn-lg active">Sell Now</a>
            </div>   
        </div>
<?php
        include 'footer.php';
?>
    </body>
</html>