<?php
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MecBooksCart|My Search List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    </head>
    <body>
<?php
        include 'navbar.php';     
?>
        <h1>
            <a href="buy.php" class="btn btn-primary btn-lg" style="margin:1%;"><span class="glyphicon glyphicon-chevron-left"></span> Go Back </a>These are the books you searched for:
        </h1>
        <div class="jumbotron container" id="list">
<?php
            $column_name = $_POST["column_name"];
            if(isset($_POST['dept']))
            { 
                $value = $_POST["dept"];
            }  
            else if(isset($_POST['semester']))
            {   
                $value = $_POST["semester"];
            }  
            else
            {  
                $value = test_input($_POST["as_per_choice"]);
            }         
            $check=mysqli_query($con, "SELECT title, author, dept, semester, subjectcode, phone, fullname FROM  swap.book, swap.user WHERE book.username=user.username AND ".$column_name." LIKE '%".$value."%' ");
            if($check && $check->num_rows > 0)
            {
                while($li=mysqli_fetch_array($check))
                {
?>
                    <div class="column" >
                        <h2><b><?php echo 'Book Title: '?></b><?php echo $li["title"]?></h2>
                        <h4><b><?php echo 'Author Name: '?></b><?php echo $li["author"]?></h4>
                        <h4><b><?php echo 'Subject Code: '?></b><?php echo $li["subjectcode"]?></h4>
                        <h4><b><?php echo 'Semester: '?></b><?php echo $li["semester"]?></h4>
                        <h4><b><?php echo 'Department: '?></b><?php echo $li["dept"]?></h4>
                        <h4><b><?php echo 'Name of Seller: '?></b><?php echo $li["fullname"]?></h4>
                        <h4><b><?php echo 'Phone: '?></b><?php echo $li["phone"]?>
                            <input type="hidden" id="copyNumber" value="<?php echo $li["phone"];?>" >
                            <button onclick="copyFunction()" class="glyphicon glyphicon-duplicate" style="background:black; color: white;"></button>
                        </h4>
                        <script>
                            function copyFunction()
                            {
                                var copyNumber=document.getElementById("copyNumber");
                                copyNumber.type='text';
                                copyNumber.select();
                                copyNumber.setSelectionRange(0,99999);//for mobile devices
                                document.execCommand("copy");
                                copyNumber.type='hidden';
                                alert("Copied the text:"+copyNumber.value);
                            }
                        </script>
                    </div>
<?php 
                }
            }
            else
            {
?>
                <script>
                    alert("No such books. Try another option.");
                    window.location.replace("buy.php");
                </script>
<?php
            }     
            function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }
?>
        </div>
<?php
        include 'footer.php';
?>
    </body>
</html>